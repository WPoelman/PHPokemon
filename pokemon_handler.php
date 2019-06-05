<?php
/**
 * Controller
 * User: Eindopdracht Webprogramming
 * Date: 23-05-2019
 */

include 'model.php';


function attack($attack_name) {
	// 'attack stuff hier'
	$gamestate = get_gamestate();
	$round     = $gamestate['round'];
	if ($round < 1) {
		return error('you cannot choose an action yet');
	}
	$player    = $_SESSION['playernum']; // player1 or player2
	$roundinfo = [
		// TODO: check if attack in active pokemon's abilities and get stats of it
		"attack" => $attack_name,
	];

	if (isset($gamestate["round-$round"][$player])) {
		return error('you already played this round');
	}

	return update_gamestate([
		"round-$round" => [$player => $roundinfo],
	]);

}

function switch_to($pokemon) {
	// 'switching stuff hier'
}

function do_action($info) {
	$newgamestate = null;
	if (!isset($_POST['action']) or !isset($_POST['parameter'])) {
		return error("invalid action");
	} else {
		$action    = $_POST['action'];
		$parameter = $_POST['parameter'];
		if ($action == 'attack') {
			$newgamestate = attack($parameter);
			// continue
		} elseif ($action == 'switch') {
			$newgamestate = switch_to($parameter);
			// continue
		} else {
			return error("invalid action");
		}


		// continued if no errors
		if ($newgamestate) {
			// if both players have filled in their action, calculate who goes first and how many damage the attacks do

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