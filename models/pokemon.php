<?php
/**
 * Model 'session' contains pokemon-related functions
 * User: Eindopdracht Webprogramming
 * Date: 23-05-2019
 */

// get all pokemon info from json file
function loadPokemon() {
	return json_decode(file_get_contents("data/pokemon.json"), true);
}

// reset variable info such as HP and PP
function resetPokemonVariables($pokemon_array) {
	$pokemon_array['Current HP'] = $pokemon_array['HP'];
	foreach($pokemon_array['Moveset'] as $index => $values) {
		$values['Current PP']             = $values['PP'];
		$pokemon_array['Moveset'][$index] = $values;
	}

	return $pokemon_array;
}

// get info for a specific pokemon
function getPokemonInfo($name) {
	$all = loadPokemon();

	return $all[ucwords($name)];
}


// returns the damage of an attack
function damage($move_power, $own_attack, $rival_defense) {

	$damage = ((5 * $move_power * ($own_attack / $rival_defense)) / 50) + 2;

	return $damage;
}

// check if an attack is effective or not and calculates the damage multiplier
function multipliedDamage($move_element, $rival_pokemon_element, $accuracy) {

	if (rand(0, 100) > $accuracy) {
		// miss
		return 0;
	}

	if ($move_element == 'Fire') {
		if ($rival_pokemon_element == 'Grass') {
			// super effective
			return 2;
		} elseif ($rival_pokemon_element == 'Water' or $rival_pokemon_element == 'Rock') {
			// not very effective
			return 0.5;
		}
	} elseif ($move_element == 'Water') {
		if ($rival_pokemon_element == 'Fire' or $rival_pokemon_element == 'Rock') {
			// super effective
			return 2;
		} elseif ($rival_pokemon_element == 'Grass' or $rival_pokemon_element == 'Electric') {
			// not very effective
			return 0.5;
		}
	} elseif ($move_element == 'Grass') {
		if ($rival_pokemon_element == 'Water' or $rival_pokemon_element == 'Rock') {
			// super effective
			return 2;
		} elseif ($rival_pokemon_element == 'Fire') {
			// not very effective
			return 0.5;
		}
	} elseif ($move_element == 'Rock') {
		if ($rival_pokemon_element == 'Fire' or $rival_pokemon_element == 'Electric') {
			// super effective
			return 2;
		} elseif ($rival_pokemon_element == 'Water' or $rival_pokemon_element == 'Grass') {
			// not very effective
			return 0.5;
		}
	} elseif ($move_element == 'Electric') {
		if ($rival_pokemon_element == 'Water') {
			// super effective
			return 2;
		} elseif ($rival_pokemon_element == 'Rock') {
			// not very effective
			return 0.5;
		}
	}

	// if it is not 'super effective' or 'not very effective' or a miss, just return the default damage
	return 1;
}

// handle the attack a user performs
function attack($playerinfo, $round, $attack_name) {
	$player = $playerinfo['playernum'];

	$active_pokemon = $playerinfo['pokemon'][($playerinfo['active_pokemon'])];

	if ($active_pokemon['Current HP'] < 1) {
		return error('This pokemon has no HP left.');
	}

	$active_pokemon_attack = array_filter(
		$active_pokemon['Moveset'],
		function($attack) use ($attack_name) {
			return $attack["Name"] == $attack_name;
		}
	);

	if (sizeof($active_pokemon_attack) == 0) {
		$activename = $active_pokemon['Name'];

		return error("invalid attack $attack_name for this pokemon $activename");
	}

	// its always one attack, so this makes sure it's not a list
	$attack_index          = array_keys($active_pokemon_attack)[0];
	$active_pokemon_attack = $active_pokemon_attack[$attack_index];

	if ($active_pokemon_attack['Current PP'] < 1) {
		return error('This move is out of PP.');
	}

	$active_pokemon_attack['Current PP']--;

	// save to player info
	$playerinfo['pokemon'][$playerinfo['active_pokemon']]['Moveset'][$attack_index] = $active_pokemon_attack;


	$roundinfo = [
		"attack" => $active_pokemon_attack,
		"time" => time(),
	];


	writePlayerData($player, $playerinfo);


	return updateGamestate([
		"round-$round" => [$player => $roundinfo],
	]);

}

// handle when a user switches pokemon
function switchTo($gamestate, $player, $round, $pokemon) {
	if (isset($gamestate[$player]['pokemon'][$pokemon])) {
		// the pokemon is in the chosen pokemon(s), so it's all good
		if ($gamestate[$player]['pokemon'][$pokemon]['Current HP'] < 1) {
			return error('This pokemon has no HP left.');
		}

		if ($gamestate[$player]['active_pokemon'] == $pokemon) {
			return error('This is the pokemon you already selected.');
		}

		$gamestate[$player]['active_pokemon'] = $pokemon;
	} else {
		return error('You do not have this pokemon.');
	}

	$roundinfo = [
		"switch" => $pokemon,
		"time" => time(),
	];

	$gamestate["round-$round"][$player] = $roundinfo;

	return writeGamestate($gamestate);
}

function getNextLivingPokemon($gamestate, $player) {
	$options = array_filter($gamestate[$player]['pokemon'], function($pokemon) {
		return $pokemon['Current HP'] > 0;
	});
	if (!$options) {
		// todo: all pokemon for this player are dead -> someone should win
		throw new OutOfRangeException('Out of pokemon');
	} else {
		// give back the first pokemon
		return reset($options)['Name'];
	}
}

// calculate the results of a rond ,like damage (multiplied) and order
function calculateRoundResults($gamestate, $round_no) {
	$p1poke = $gamestate['player1']['pokemon'][$gamestate['player1']['active_pokemon']];
	$p2poke = $gamestate['player2']['pokemon'][$gamestate['player2']['active_pokemon']];


	$round       = $gamestate["round-$round_no"];
	$first       = null;
	$damage1     = 0;
	$damage2     = 0;
	$multiplier1 = 1;
	$multiplier2 = 1;

	if (isset($round['player2']['attack'])) {
		// this is the damage player2 gives player1
		$p2attack    = $round['player2']['attack'];
		$damage1     = damage($p2attack['Power'], $p2poke['Attack'], $p1poke['Defense']);
		$multiplier1 = multipliedDamage($p2attack['Type'], $p1poke['Element'], $p2attack['Accuracy']);
		$damage1     = round($damage1 * $multiplier1);
	} else {
		$first = 'player2';
	}

	if (isset($round['player1']['attack'])) {
		// this is the damage player1 gives player2
		$p1attack    = $round['player1']['attack'];
		$damage2     = damage($p1attack['Power'], $p1poke['Attack'], $p2poke['Defense']);
		$multiplier2 = multipliedDamage($p1attack['Type'], $p2poke['Element'], $p1attack['Accuracy']);
		$damage2     = round($damage2 * $multiplier2);
	} else {
		$first = 'player1';
	}

	// calculate who goes first
	if (!$first) {
		$p1speed = $p1poke['Speed'];
		$p2speed = $p2poke['Speed'];
		if ($p1speed == $p2speed) {
			$first = array_rand(['player1' => 1, 'player2' => 2]);
		} elseif ($p1speed > $p2speed) {
			$first = 'player1';
		} else {
			$first = 'player2';
		}
	}

	// change health in right order
	if ($first == 'player1') {
		if (isset($round['player1']['attack'])) {
			// do player2 damage here
			$p2poke['Current HP'] -= $damage2;
		}

		// next up         if they attacked         if they are alive
		if (isset($round['player2']['attack']) and $p2poke['Current HP'] > 0) {
			// do player1 damage here
			$p1poke['Current HP'] -= $damage1;
		}


	} elseif ($first == 'player2') {
		if (isset($round['player2']['attack'])) {
			// do player1 damage here
			$p1poke['Current HP'] -= $damage1;
		}

		// next up         if they attacked         if they are alive
		if (isset($round['player1']['attack']) and $p2poke['Current HP'] > 0) {
			// do player2 damage here
			$p2poke['Current HP'] -= $damage2;
		}
	}

	// rewrite back to gamestate
	$gamestate['player1']['pokemon'][$gamestate['player1']['active_pokemon']] = $p1poke;
	$gamestate['player2']['pokemon'][$gamestate['player2']['active_pokemon']] = $p2poke;

	$round['winner'] = null;

	try {
		// no negative HP, he just dead
		if ($p1poke['Current HP'] < 1) {
			$p1poke['Current HP'] = 0;
			// switch the active pokemon of this player
			$gamestate['player1']['active_pokemon'] = getNextLivingPokemon($gamestate, 'player1');

		}
	} catch(OutOfRangeException $e) {
		$round['winner'] = $gamestate['player2']['username'];
	}
	try {
		// no negative HP, he just dead
		if ($p2poke['Current HP'] < 1) {
			$p2poke['Current HP'] = 0;
			// switch the active pokemon of this player
			$gamestate['player2']['active_pokemon'] = getNextLivingPokemon($gamestate, 'player2');
		}
	} catch(OutOfRangeException $e) {
		$round['winner'] = $gamestate['player1']['username'];
	}


	// player1->damage means damage taken for this attack
	$round['player1']['damage']        = $damage1;
	$round['player1']['effectiveness'] = $multiplier1;
//  $round['player1']['new_pokemon']   = $p1poke;
	$round['player2']['damage']        = $damage2;
	$round['player2']['effectiveness'] = $multiplier2;
//  $round['player2']['new_pokemon']   = $p2poke;
	$round['first'] = $first;

	writePlayerData('player1', $gamestate['player1']);
	writePlayerData('player2', $gamestate['player2']);

	updateGamestate([
		"round-$round_no" => $round,
		"round"           => $round_no + 1,
		"winner"          => $round['winner'],
	]);

	return $round;
}