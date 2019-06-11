<?php
/**
 * Controller
 * User: Eindopdracht Webprogramming
 * Date: 23-05-2019
 */

include 'model.php';


function index($info, $nav) {
	/* Page info */
	$page_title = 'Homepage';
	$navigation = getNavigation($nav, $info['url']);

	/* Choose Template */
	include useTemplate('main');
}

$routes->newRoute('/', 'get', 'Home', 'index');

function instructions($info, $nav) {

	/* Page info */
	$page_title = 'Pokemon instructions page';
	$navigation = getNavigation($nav, 'instructions');

	/* Choose Template */
	include useTemplate('instructions');
}

$routes->newRoute('instructions', 'get', 'Instructions');


function pokemon($info, $nav) {

	/* Page info */
	$page_title = "Pokemon list page";
	$navigation = getNavigation($nav, 'pokemon');
	
	/* Choose Template */
	include useTemplate('pokemon');
}

$routes->newRoute('pokemon', 'get', 'Pokemon');


function post_handler($info){
	// test handler
	print_r($info);
	send('POSTED');
}
$routes->newRoute('post_handler', 'post');



$routes->start();
