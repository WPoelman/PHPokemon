<?php
/**
 * Controller
 * User: Eindopdracht Webprogramming
 * Date: 23-05-2019
 */

include 'model.php';


function attack($info) {
	echo 'attack stuff hier';  // = requests.post('http://localhost/eindproject/pokemon_handler.php/attack').text
}

$routes->new_route('attack', 'post');

function start_game($info) {
	if (!(isset($_SESSION['username']))) {
		$username = $_POST['username'];
		$pokemon  = $_POST['pokemon'];

		$added_player = add_player($username, $pokemon);

		if(sizeof($pokemon) != 3){
			echo json_encode(['error' => 'invalid amount of pokemon chosen']);
			return false;
		}

		if(!$added_player){
			// game is full
			session_destroy();
			unset($_SESSION);
			echo json_encode(['error' => 'game is full']);
			return false;
		}
		else {
			echo json_encode(get_game_info());
			return true;
		}
	}
	echo json_encode(['error' => 'you are already in a game']);
	return false;
}

$routes->new_route('start_game', 'post');


function stop_game($info){
	reset_round();
	session_destroy();
	unset($_SESSION);
}
// note: this should not be a public route on production, of course!
$routes->new_route('stop_game', 'post');



function get_profile($info) {
	echo json_encode(get_game_info());
}

$routes->new_route('get_profile', 'get');


$routes->start();