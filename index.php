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

	/* Page content */
	$page_subtitle = "subtitle";
	$page_content  = "content";

	/* Choose Template */
	include useTemplate('main');
}

$routes->newRoute('/', 'get', 'Home', 'index');

function instructions($info, $nav) {

	/* Page info */
	$page_title = 'Pokemon instructions page';
	$navigation = getNavigation($nav, 'instructions');

	/* Page content */
	$page_subtitle = 'very cool subtitle';
	$page_content  = 'epic content';

	/* Choose Template */
	include useTemplate('instructions');
}

$routes->newRoute('instructions', 'get', 'Instructions');


function pokemon($info, $nav) {

	/* Page info */
	$page_title = "Pokemon list page";
	$navigation = getNavigation($nav, 'pokemon');

	/* Page content */
	$page_subtitle = 'subtitle';
	$page_content  = 'pokmon list';

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
