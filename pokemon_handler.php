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
	// process the post data
	$_SESSION['username'] = $_POST['username'];
	$pokemon_names = $_POST['pokemon'];

	// get the pokemon info for the selected pokemon based on their names
	$pokemon_info = json_decode(file_get_contents("pokemon.json"), true);
	$pokemon_selection = [];
	for ($i = 0; $i < 3; ++$i) {
		array_push($pokemon_selection, $pokemon_info[$pokemon_names[$i]]);
	}

	// Initialize a game state json
	$game_state = json_decode(file_get_contents("game_state.json"), true);
	if (! isset($game_state['player1'])) {
		$game_state['player1']['username'] = $_SESSION['username'];
		$game_state['player1']['pokemon'] = $pokemon_selection;
	} else {
		$game_state['player2']['username'] = $_SESSION['username'];
		$game_state['player2']['pokemon'] = $pokemon_selection;
	}

	// Save to external file
	$game_state_json = fopen('game_state.json', 'w');
	fwrite($game_state_json, json_encode($game_state));
	fclose($game_state_json);

	// dit is om te testen!
	echo json_encode($game_state);
}
$routes->new_route('start_game', 'post');

$routes->start();