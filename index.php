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
	$navigation = get_navigation($nav, $info['url']);

	/* Page content */
	$page_subtitle = "subtitle";
	$page_content  = "content";

	/* Choose Template */
	include use_template('main');
}

$routes->new_route('/', 'get', 'Home', 'index');

function instructions($info, $nav) {

	/* Page info */
	$page_title = 'Pokemon instructions page';
	$navigation = get_navigation($nav, 'instructions');

	/* Page content */
	$page_subtitle = 'very cool subtitle';
	$page_content  = 'epic content';

	/* Choose Template */
	include use_template('instructions');
}

$routes->new_route('instructions', 'get', 'Instructions');


function pokemon($info, $nav) {

	/* Page info */
	$page_title = "Pokemon list page";
	$navigation = get_navigation($nav, 'pokemon');

	/* Page content */
	$page_subtitle = 'subtitle';
	$page_content  = 'pokmon list';

	/* Choose Template */
	include use_template('pokemon');
}

$routes->new_route('pokemon', 'get', 'Pokemon');


function post_handler($info){
	// test handler
	print_r($info);
	echo 'POSTED';
}
$routes->new_route('post_handler', 'post');



$routes->start();
