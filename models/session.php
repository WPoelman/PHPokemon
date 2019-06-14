<?php
/**
 * Model 'session' contains session-related functions
 * User: Eindopdracht Webprogramming
 * Date: 23-05-2019
 */

if (!isset($_SESSION)) {
	session_start();
}


/**
 * find (with default so the program doesn't error) key in SESSION
 *
 * @param $key : data entry you are looking for
 *
 * @return string or other object : (any type) of the wanted data or null
 */
function getSessionVar($key) {
	if (isset($_SESSION[$key])) {
		return $_SESSION[$key];
	} else {
		return null;
	}
}

// get all info about the current client
function getGameInfo($otherplayer = false) {
	$playernum = getSessionVar("playernum");

	if ($otherplayer) {
		// if you want the info of the other player, switch playernum
		$playernum = 'player1' ? 'player2' : 'player1';
	}

	$gamestate = getGamestate();
	if (isset($gamestate[$playernum])) {
		$playerdata = $gamestate[$playernum];
	} else {
		$playerdata = null;
	}

	return [
		"username"   => getSessionVar('username'),
		"playernum"  => $playernum,
		"playerdata" => $playerdata,
	];
}

// read the full current gamestate
function getGamestate() {
	//	return json_decode(file_get_contents("data/gamestate.json"), true);

	if (isset($_SESSION['gameid'])) {
		$id = $_SESSION['gameid'];

		return json_decode(file_get_contents("data/games/$id.json"), true);
	} else {
		return []; // error('please register first');
	}

}

// overwrite the full gamestate
function writeGamestate($newdata) {
	//file_put_contents("data/gamestate.json", json_encode($newdata));
	if (isset($_SESSION['gameid'])) {
		$id = $_SESSION['gameid'];

		file_put_contents("data/games/$id.json", json_encode($newdata));

		return $newdata;
	} else {
		return []; // error('please register first');
	}

}

// partly overwrite gamestate with difference
function updateGamestate($changed) {
	$old_data = getGamestate();

	// array replace recursive instead of array merge, because this is better in correctly mergin nested arrays
	$new_data = array_replace_recursive($old_data, $changed);
	writeGamestate($new_data);

	return $new_data;
}

// get the info about a specific $player from the gamestate
function readPlayerData($player) {
	$gamestate = getGamestate();
	if (isset($gamestate[$player])) {
		return $gamestate[$player];
	} else {
		return [];
	}
}

// overwrite the data for a specific player in the gamestate
function writePlayerData($player, $data) {
	$old_data          = getGamestate();
	$old_data[$player] = $data;
	writeGamestate($old_data);
}

// empty all variables in the game state
function resetRound() {
	// execute this function at end of game
	writeGamestate([
		"player1" => [],
		"player2" => [],
		"round"   => 0,
	]);
}

// check if a player is ready
function isReady($player) {
	// check if the player exists and has a username in the gamestate
	return isset(readPlayerData($player)['username']);
}

// save the information of a new player to session and gamestate, including data about their pokemon
function addPlayer($username, $pokemons) {
	joinGame(getOpenGame(), $username);

	// $_SESSION['pokemon']  = $pokemons;

	$_SESSION['username']    = $username;
	$_SESSION['round']       = 0;
	$player_info['username'] = $username;
	$player_info['pokemon']  = [];

	// the plural of pokemon is not actually pokemons, but this way the naming is easier
	foreach($pokemons as $pokemon) {
		$player_info['pokemon'][$pokemon] = resetPokemonVariables(getPokemonInfo($pokemon));
	}
	$player_info['active_pokemon'] = $pokemons[0];


	if (!isReady('player1')) {
		$player_info['playernum'] = 'player1';
		writePlayerData('player1', $player_info);
		$_SESSION['playernum'] = 'player1';

		return true;
	} elseif (!isReady('player2')) {
		$player_info['playernum'] = 'player2';
		writePlayerData('player2', $player_info);
		$_SESSION['playernum'] = 'player2';

		// second player was added -> start game
		updateGamestate(["round" => 1]);

		return true;
	} else {
		// all spaces occupied (for now)
		return false;
	}
}

// send winner info to client and reset
function sendWinner($gamestate){
	send([
		'function' => 'winner',
		'data'     => $gamestate,
		'me'       => getSessionVar("playernum"),
		'winner'   => $gamestate['winner'],
	]);
	reset_player();
}


// MULTIPLE PLAYERS:

// get all games
function getGames() {
	return json_decode(file_get_contents("data/games.json"), true);
}

// write to the games collection file
function writeGames($new) {
	file_put_contents("data/games.json", json_encode($new));

	return $new;
}

// like writeGames but merge only a difference with what's already in the file
function updateGames($change) {
	$new = array_merge(getGames(), $change);
	writeGames($new);
}


// write to a game file (gamestate)
function writeGame($id, $data) {
	if (!file_exists('data/games')) {
		mkdir('data/games', 0744);
	}
	file_put_contents("data/games/$id.json", json_encode($data));
}

// create a new open game
function newGame() {
	$newid   = uniqid();
	$newgame = [
		'open' => $newid,
		$newid => ['state' => 'open', 'players' => []],
	];
	updateGames($newgame);
	writeGame($newid, ['round' => 0]);

	return $newid;
}

// get the current open (joinable) game
function getOpenGame() {
	$games = getGames();
	if (isset($games['open']) and $games[$games['open']]['state'] == 'open') {
		return $games['open'];
	} else {
		return newGame();
	}
}

// remove a folder (used to purge the games folder)
function deleteDirectory($dir) {
	if (!file_exists($dir)) {
		return true;
	}

	if (!is_dir($dir)) {
		return unlink($dir);
	}

	foreach(scandir($dir) as $item) {
		if ($item == '.' || $item == '..') {
			continue;
		}

		if (!deleteDirectory($dir . DIRECTORY_SEPARATOR . $item)) {
			return false;
		}

	}

	return rmdir($dir);
}

// empty the games file and folder
function clearGames() {
	writeGames([]);
	deleteDirectory('data/games');
}

// let a user join a game
function joinGame($game, $me) {
	$games = getGames();
	if (isset($_SESSION['gameid']) and
	    isset($games[$_SESSION['gameid']]) and
	    $games[$_SESSION['gameid']]['state'] != 'closed') {
		return error('You are still in an active game');
	}

	$games[$game]['players'][] = $me;
	if (sizeof($games[$game]['players']) == 2) {
		$games[$game]['state'] = 'playing';
	}
	$_SESSION['gameid'] = $game;

	return writeGames($games);
}