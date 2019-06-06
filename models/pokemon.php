<?php
/**
 * Model 'session' contains pokemon-related functions
 * User: Eindopdracht Webprogramming
 * Date: 23-05-2019
 */

function loadPokemon() {
	return json_decode(file_get_contents("data/pokemon.json"), true);
}

function resetPokemonVariables($pokemon_array) {
	// reset variable info such as HP and PP
	$pokemon_array['Current HP'] = $pokemon_array['HP'];
	foreach($pokemon_array['Moveset'] as $index => $values) {
		$values['Current PP']             = $values['PP'];
		$pokemon_array['Moveset'][$index] = $values;
	}

	return $pokemon_array;
}

function getPokemonInfo($name) {
	$all = loadPokemon();

	return $all[ucwords($name)];
}


function damage() {
	// returnt de damage die een aanval doet
	$move_power    = "pak hiervoor de Power van de gekozen move";
	$own_attack    = "pak hiervoor de Attack stat van de eigen huidige Pokemon";
	$rival_defense = "pak hiervoor de Defense stat van de rival Pokemon";

	$damage = ((5 * $move_power * ($own_attack / $rival_defense)) / 50) + 2;

	return round(multipliedDamage($damage));
}

function multipliedDamage($damage) {
	// kijkt of iets effective is of niet en berekent de damage inclusief multiplier
	$move_element          = "pak element van de gekozen move, bijv fire";
	$rival_pokemon_element = "pak element van de rival Pokemon, bijv water";

	if ($move_element == 'Fire') {
		if ($rival_pokemon_element == 'Grass') {
			// super effective
			return 2 * $damage;
		} elseif ($rival_pokemon_element == 'Water' or $rival_pokemon_element == 'Rock') {
			// not very effective
			return 0.5 * $damage;
		}
	} elseif ($move_element == 'Water') {
		if ($rival_pokemon_element == 'Fire' or $rival_pokemon_element == 'Rock') {
			// super effective
			return 2 * $damage;
		} elseif ($rival_pokemon_element == 'Grass' or $rival_pokemon_element == 'Electric') {
			// not very effective
			return 0.5 * $damage;
		}
	} elseif ($move_element == 'Grass') {
		if ($rival_pokemon_element == 'Water' or $rival_pokemon_element == 'Rock') {
			// super effective
			return 2 * $damage;
		} elseif ($rival_pokemon_element == 'Fire') {
			// not very effective
			return 0.5 * $damage;
		}
	} elseif ($move_element == 'Rock') {
		if ($rival_pokemon_element == 'Fire' or $rival_pokemon_element == 'Electric') {
			// super effective
			return 2 * $damage;
		} elseif ($rival_pokemon_element == 'Water' or $rival_pokemon_element == 'Grass') {
			// not very effective
			return 0.5 * $damage;
		}
	} elseif ($move_element == 'Electric') {
		if ($rival_pokemon_element == 'Water') {
			// super effective
			return 2 * $damage;
		} elseif ($rival_pokemon_element == 'Rock') {
			// not very effective
			return 0.5 * $damage;
		}
	}

	// Als het niet super effective of not very effective is, dan returnen zonder multiplier:
	return $damage;
}

// handle the attack a user performs
function attack($gamestate, $player, $round, $attack_name) {

	$active_pokemon = getPokemonInfo($gamestate[$player]['active_pokemon']);

	$active_pokemon_attack = array_filter(
		$active_pokemon['Moveset'],
		function($attack) use ($attack_name) {
			return $attack["Name"] == $attack_name;
		}
	);

	if (sizeof($active_pokemon_attack) == 0) {
		return error('invalid attack for this pokemon');
	}

	$roundinfo = [
		"attack" => $active_pokemon_attack,
	];

	// TODO: pp aanpassen


	return updateGamestate([
		"round-$round" => [$player => $roundinfo],
	]);

}

// handle when a user switches pokemon
function switchTo($gamestate, $player, $round, $pokemon) {
	// 'switching stuff hier'
	if (isset($gamestate[$player]['pokemon'][$pokemon])) {
		// the pokemon is in the chosen pokemon(s), so it's all good

		if ($gamestate[$player]['active_pokemon'] == $pokemon) {
			return error('this is the pokemon you already selected');
		}

		$gamestate[$player]['active_pokemon'] = $pokemon;
	} else {
		return error('You do not have this pokemon');
	}

	$roundinfo = [
		"switch" => $pokemon,
	];

	$gamestate["round-$round"][$player] = $roundinfo;

	return writeGamestate($gamestate);
}