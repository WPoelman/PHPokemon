<?php
/**
 * Controller
 * User: Eindopdracht Webprogramming
 * Date: 23-05-2019
 */

include 'model.php';


function damage() {
	// returnt de damage die een aanval doet
	$move_power = "pak hiervoor de Power van de gekozen move";
	$own_attack = "pak hiervoor de Attack stat van de eigen huidige Pokemon";
	$rival_defense = "pak hiervoor de Defense stat van de rival Pokemon";

	$damage = ((5 * $move_power * ($own_attack / $rival_defense)) / 50) + 2;

	return round(multiplied_damage($damage));
}

function multiplied_damage($damage) {
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


function attack($gamestate, $player, $round, $attack_name) {
	// 'attack stuff hier'

	$active_pokemon = get_pokemon_info($gamestate[$player]['active_pokemon']);

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


	return update_gamestate([
		"round-$round" => [$player => $roundinfo],
	]);

}

function switch_to($gamestate, $player, $round, $pokemon) {
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

	return write_gamestate($gamestate);
}

function do_action($info) {
	$newgamestate = null;
	if (!isset($_POST['action']) or !isset($_POST['parameter'])) {
		return error("invalid action");
	} else {
		$action    = $_POST['action'];
		$parameter = $_POST['parameter'];
		$gamestate = get_gamestate();
		$round     = $gamestate['round'];
		if ($round < 1) {
			return error('you cannot choose an action yet');
		}
		$player = $_SESSION['playernum']; // player1 or player2

		if (isset($gamestate["round-$round"][$player])) {
			return error('you already played this round');
		}

		if ($action == 'attack') {
			$newgamestate = attack($gamestate, $player, $round, $parameter);
			// continue
		} elseif ($action == 'switch') {
			$newgamestate = switch_to($gamestate, $player, $round, $parameter);
			// continue
		} else {
			return error("invalid action");
		}


		// continued if no errors
		if ($newgamestate) {
			// if both players have filled in their action, calculate who goes first and how many damage the attacks do
			if (sizeof($newgamestate["round-$round"]) == 2) {
				// both players have played
				// calculate order and damage stuff here

				// example (stub):
				$newgamestate["round-$round"]['player1']['damage'] = 0;
				$newgamestate["round-$round"]['player1']['damage'] = 20;
				$newgamestate["round-$round"]['first']             = 'player1';


				// afterwards:
				$newgamestate['round'] = $newgamestate['round'] + 1;
				write_gamestate($newgamestate);
			}
		}

	}
}

$routes->new_route('do_action', 'post');

function start_game($info) {
	if (!(isset($_SESSION['username']))) {
		$username = $_POST['username'];
		$pokemon  = $_POST['pokemon'];

		$added_player = add_player($username, $pokemon);

		if (sizeof($pokemon) != 3) {
			return error('invalid amount of pokemon chosen');
		}

		if (!$added_player) {
			// game is full
			session_destroy();
			unset($_SESSION);

			return error('game is full');
		} else {
			echo json_encode(get_game_info());

			return true;
		}
	}

	return error('you are already in a game');
}

$routes->new_route('start_game', 'post');

function reset_player() {
	session_destroy();
	unset($_SESSION);
}

$routes->new_route('reset_player', 'post');

function stop_game($info) {
	reset_round();
	session_destroy();
	unset($_SESSION);
}

// note: this should not be a public route on production, of course!
$routes->new_route('stop_game', 'get');


function game_info($info) {
	$gamestate = get_gamestate();

	$prevround = $_SESSION['round'];
	$round     = $_SESSION['round'] = $gamestate['round'];

	if ($round > $prevround) {
		send([
			'function' => 'roundchange',
			'data'     => $gamestate
		]);
	}
}

$routes->new_route('game_info', 'get');


function get_profile($info) {
	send(get_game_info());
}

$routes->new_route('get_profile', 'get');


$routes->start();