<?php
/**
 * Controller
 * User: Eindopdracht Webprogramming
 * Date: 23-05-2019
 */

include 'model.php';

/* Display the default cards on every page */
/* $right_column = use_template('cards'); */

/* Set the default routes for the navigation bar */
$navigation_tpl = Array(
	0 => Array(
		'name' => 'Home',
		'url'  => 'index'
	),
	1 => Array(
		'name' => 'Instructions',
		'url'  => 'instructions'
	),
	2 => Array(
		'name' => 'Pokemon',
		'url'  => 'pokemon'
	)
);

/* Homepage */
if (new_route('/', 'get')) {

	/* Page info */
	$page_title = 'Homepage';
	$navigation = get_navigation($navigation_tpl, 0);

	/* Page content */
	$page_subtitle = "subtitle";
	$page_content  = "content";

	/* Choose Template */
	include use_template('main');
} /* Instructions page */
elseif (new_route('/instructions', 'get')) {

	/* Page info */
	$page_title = 'Pokemon instructions page';
	$navigation = get_navigation($navigation_tpl, 1);

	/* Page content */
	$page_subtitle = 'very cool subtitle';
	$page_content  = 'epic content';

	/* Choose Template */
	include use_template('main');
} /* Pokemon list page */
elseif (new_route('/pokemon', 'get')) {

	/* Page info */
	$page_title = "Pokemon list page";
	$navigation = get_navigation($navigation_tpl, 2);

	/* Page content */
	$page_subtitle = 'subtitle';
	$page_content  = 'pokmon list';

	/* Choose Template */
	include use_template('main');

} /* Pokemon handler API */
elseif (new_route('/handler', 'post')) {

	/* HIER DE FUNCTIES DIE DE ACTIES AFHANDELEN */
} else {
	http_response_code(404);
	echo 'page not found';
}
