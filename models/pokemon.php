<?php
/**
 * Model 'session' contains pokemon-related functions
 * User: Eindopdracht Webprogramming
 * Date: 23-05-2019
 */

function load_pokemon(){
	return json_decode(file_get_contents("pokemon.json"),true);
}

function reset_pokemon_variables($pokemon_array){
	// reset variable info such as HP and PP
	$pokemon_array['Current HP'] = $pokemon_array['HP'];
	foreach($pokemon_array['Moveset'] as $index => $values){
		$values['Current PP'] = $values['PP'];
		$pokemon_array['Moveset'][$index] = $values;
	}
	return $pokemon_array;
}

function get_pokemon_info($name){
	$all = load_pokemon();
	return $all[ucwords($name)];
}