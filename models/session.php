<?php
/**
 * Model 'session' contains session-related functions
 * User: Eindopdracht Webprogramming
 * Date: 23-05-2019
 */

session_start();

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

	$playerdata = getGamestate()[$playernum];

	return [
		"username"   => getSessionVar('username'),
		"playernum"  => $playernum,
		"playerdata" => $playerdata,
	];
}

// read the full current gamestate
function getGamestate() {
	return json_decode(file_get_contents("data/gamestate.json"), true);
}

// overwrite the full gamestate
function writeGamestate($newdata) {
	file_put_contents("data/gamestate.json", json_encode($newdata));

	return $newdata;
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
	// $_SESSION['pokemon']  = $pokemons;

	$_SESSION['username']    = $username;
	$_SESSION['round']       = 0;
	$player_info['username'] = $username;
	$player_info['pokemon']  = [];

	// yes I know the plural of pokemon is pokemon but that makes these variables very difficult to name
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

// todo later: make playble for more than 2 players at the same time