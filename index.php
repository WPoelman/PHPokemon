<?php
/**
 * Controller
 * User: Eindopdracht Webprogramming
 * Date: 23-05-2019
 */

include 'model.php';
include ' pokemon_handler.php';

/* Display the default cards on every page */
/* $right_column = use_template('cards'); */

/* Set the default routes for the navigation bar */


//$navigation_tpl = Array(
//	0 => Array(
//		'name' => 'Home',
//		'url'  => 'index'
//	),
//	1 => Array(
//		'name' => 'Instructions',
//		'url'  => 'instructions'
//	),
//	2 => Array(
//		'name' => 'Pokemon',
//		'url'  => 'pokemon'
//	)
//);

$routes = [
	"home"         => new_route('/', 'get', 'Home'),
	"instructions" => new_route('instructions', 'get', 'Instructions'),
	"pokemon"      => new_route('pokemon', 'get', 'Pokemon'),
	"handler"      => new_route('handler', 'post'),
];


// todo: translate to functions in stead of if elif

/* Homepage */
if ($routes['home']['active']) {
	$active = $routes['home'];

	/* Page info */
	$page_title = 'Homepage';
	$navigation = get_navigation($navigation_tpl, $active['url']);

	/* Page content */
	$page_subtitle = "subtitle";
	$page_content  = "content";

	/* Choose Template */
	include use_template('main');
} /* Instructions page */
elseif ($routes['instructions']['active']) {
	$active = $routes['instructions'];

	/* Page info */
	$page_title = 'Pokemon instructions page';
	$navigation = get_navigation($navigation_tpl, 'instructions');

	/* Page content */
	$page_subtitle = 'very cool subtitle';
	$page_content  = 'epic content';

	/* Choose Template */
	include use_template('main');
} /* Pokemon list page */
elseif ($routes['pokemon']['active']) {
	$active = $routes['pokemon'];

	/* Page info */
	$page_title = "Pokemon list page";
	$navigation = get_navigation($navigation_tpl, 'pokemon');

	/* Page content */
	$page_subtitle = 'subtitle';
	$page_content  = 'pokmon list';

	/* Choose Template */
	include use_template('main');

} /* Pokemon handler API */
elseif ($routes['handler']['active']) {

	/* HIER DE FUNCTIES DIE DE ACTIES AFHANDELEN  UIT POKEMON HANDLER */
} else {
	http_response_code(404);
	echo 'page not found';
}
