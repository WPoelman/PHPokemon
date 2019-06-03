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
	$pokemon = explode(",", $_POST['pokemon']);

	// dit is om te testen!
	echo json_encode(["pokemon" => $pokemon, "username"=> $username]);
}
$routes->new_route('start_game', 'post');

$routes->start();