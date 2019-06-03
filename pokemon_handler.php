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
	$username = $_POST['username'];
	$pokemon  = explode(",", $_POST['pokemon']);

	// dit is om te testen!
	save_game_info($username, $pokemon);

	echo json_encode(get_game_info());
}

$routes->new_route('start_game', 'post');

function get_profile($info) {
	echo json_encode(get_game_info());
}

$routes->new_route('get_profile', 'get');



$routes->start();