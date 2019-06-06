<?php
/**
 * Controller
 * User: Eindopdracht Webprogramming
 * Date: 23-05-2019
 */

include 'model.php';

// routes should be with _ instead of camelCase, because they are transformed to URL's

function do_action($info) {
	$newgamestate = null;
	if (!isset($_POST['action']) or !isset($_POST['parameter'])) {
		return error("invalid action");
	} else {
		$action    = $_POST['action'];
		$parameter = $_POST['parameter'];
		$gamestate = getGamestate();
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
			$newgamestate = switchTo($gamestate, $player, $round, $parameter);
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
				$newgamestate["round-$round"]['player2']['damage'] = 20;
				$newgamestate["round-$round"]['first']             = 'player1';


				// afterwards:
				$newgamestate['round'] = $newgamestate['round'] + 1;
				writeGamestate($newgamestate);
			}
		}

	}
}

$routes->newRoute('do_action', 'post');

function start_game($info) {
	if (!(isset($_SESSION['username']))) {
		$username = $_POST['username'];
		$pokemon  = $_POST['pokemon'];

		$added_player = addPlayer($username, $pokemon);

		if (sizeof($pokemon) != 3) {
			return error('invalid amount of pokemon chosen');
		}

		if (!$added_player) {
			// game is full
			session_destroy();
			unset($_SESSION);

			return error('game is full');
		} else {
			echo json_encode(getGameInfo());

			return true;
		}
	}

	return error('you are already in a game');
}

$routes->newRoute('start_game', 'post');

function reset_player() {
	session_destroy();
	unset($_SESSION);
}

$routes->newRoute('reset_player', 'post');

function stop_game($info) {
	resetRound();
	session_destroy();
	unset($_SESSION);
}

// note: this should not be a public route on production, of course!
$routes->newRoute('stop_game', 'post');


function game_info($info) {
	$gamestate = getGamestate();

	$prevround = $_SESSION['round'];
	$round     = $_SESSION['round'] = $gamestate['round'];

	if ($round > $prevround) {
		send([
			'function' => 'roundchange',
			'data'     => $gamestate
		]);
	}
}

$routes->newRoute('game_info', 'get');


function get_profile($info) {
	send(getGameInfo());
}

$routes->newRoute('get_profile', 'get');


$routes->start();