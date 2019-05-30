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

$routes->start();