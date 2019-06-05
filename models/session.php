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
 * @return object : (any type) of the wanted data or null
 */
function session_get($key) {
	if (isset($_SESSION[$key])) {
		return $_SESSION[$key];
	} else {
		return null;
	}
}

function get_game_info() {
	return [
		"username"  => session_get('username'),
		"pokemon"   => session_get("pokemon"),
		"playernum" => session_get("playernum"),
	];
}

// matching players

function get_gamestate() {
	return json_decode(file_get_contents("data/gamestate.json"), true);
}

function write_gamestate($newdata) {
	file_put_contents("data/gamestate.json", json_encode($newdata));
}

function update_gamestate($changed) {
	$old_data = get_gamestate();
//	$new_data = array_merge($old_data, $changed);
	$new_data = array_replace_recursive($old_data, $changed);
	write_gamestate($new_data);
	return $new_data;
}

function read_player_data($player) {
	$gamestate = get_gamestate();
	if (isset($gamestate[$player])) {
		return $gamestate[$player];
	} else {
		return [];
	}
}

function write_player_data($player, $data) {
	$old_data = get_gamestate();
	$old_data[$player] = $data;
	file_put_contents("data/gamestate.json", json_encode($data));
}

function reset_round() {
	// execute this function at end of game
	write_player_data('player1', []);
	write_player_data('player2', []);
}

// check if a player is ready
function is_ready($player) {
	return isset(read_player_data($player)['username']);
}

function add_player($username, $pokemons) {
	$_SESSION['username']    = $username;
	$_SESSION['pokemon']     = $pokemons;
	$player_info['username'] = $username;
	$player_info['pokemon']  = [];

	// yes I know the plural of pokemon is pokemon but that makes these variables very difficult to name
	foreach($pokemons as $pokemon) {
		$player_info['pokemon'][$pokemon] = reset_pokemon_variables(get_pokemon_info($pokemon));
	}


	if (!is_ready('player1')) {
		write_player_data('player1', $player_info);

		return true;
	} else {
		// player 1 occupied, try player 2
		if (!is_ready('player2')) {
			write_player_data('player2', $player_info);

			return true;
		} else {
			// all spaces occupied (for now)
			return false;
		}
	}
}

// later: make playble for more than 2 players at the same time