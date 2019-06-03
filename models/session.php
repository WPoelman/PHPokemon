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

/**
 * save username and pokemon info to SESSION
 *
 * @param $username : username of the player
 * @param $pokemons : pokemon (3) the player chose
 * */
function save_game_info($username, $pokemons) {
	$_SESSION['username'] = $username;
	$_SESSION['pokemon']  = [];
	// yes I know the plural of pokemon is pokemon but that makes these variables very difficult to name
	foreach($pokemons as $pokemon){
		$_SESSION['pokemon'][$pokemon] = reset_pokemon_variables(get_pokemon_info($pokemon));
	}
}

function get_game_info() {
	return ["username" => session_get('username'), "pokemon" => session_get("pokemon")];
}