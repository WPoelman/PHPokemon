<?php
/**
 * Model 'general' contains basic functions and functionalities
 * User: Eindopdracht Webprogramming
 * Date: 23-05-2019
 */

/* Enable error reporting */
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


// routes class
class Routes {
	var $navigation = [];
	var $active_route = null;

	// send the user to the active function
	function start() {
		$this->active_route['function']($this->active_route, $this->navigation);
	}

	// add a possible route
	function new_route($route_uri, $request_type, $menu_title = false, $function = false) {

		if (!$function) {
			$function = $route_uri;
		}


		$request_type = strtoupper($request_type);


		$folder            = rtrim($_SERVER['SCRIPT_NAME'], 'index.php');
		$route_uri_expl    = array_filter(explode('/', $route_uri));
		$current_path_expl = array_filter(explode('/', parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)));
		$active            = false;
		$url               = $route_uri;
		if (end($route_uri_expl) == end($current_path_expl)) {
			$active = true;
		}
		if ($route_uri == '/') {
			// home
			$url = $folder;

			if ($folder == $_SERVER['REQUEST_URI']) {
				// home active
				$active = true;
			}
		}

		if ($request_type == 'GET' and $menu_title) {
			$this->navigation[$url] = $menu_title;
		}

		$result = ['active' => $active, 'url' => $url, 'function' => $function];
		if ($active) {

			if ($_SERVER['REQUEST_METHOD'] != $request_type) {
				// if everything is good but the request is wrong method, throw error
				http_response_code(405);  // 405: method not allowed
				echo 'wrong HTTP method for this request';
				die();
			}


			$this->active_route = $result;
		}

		return $result;
	}

}

// create an instance of the routes that can be used by the current controller
$routes = new Routes();

/**
 * Creates navigation HTML code using given array with active_item page
 *
 * @param array $template Array with as Key the page name and as Value the corresponding url
 * @param integer $active_item the id of the active element in the navigation bar
 *
 * @return string html code that represents the navigation
 */
function get_navigation($template, $active_item) {
	$navigation_exp = '
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand">PHPokemon</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">';
	foreach($template as $url => $title) {
		if ($url == $active_item) {
			$navigation_exp .= '<li class="nav-item active">';
		} else {
			$navigation_exp .= '<li class="nav-item">';
		}
		$navigation_exp .= "<a class='nav-link' href='$url'>$title</a></li>";
	}
	$navigation_exp .= '
    </ul>
    </div>
    </nav>';

	return $navigation_exp;
}

/**
 * Creates a new navigation array item using url and active status
 *
 * @param string $url The url of the navigation item
 * @param bool $active Set the navigation item to active or inactive
 *
 * @return array
 */
function na($url, $active) {
	return [$url, $active];
}

/**
 * Creates filename to the template
 *
 * @param string $template filename of the template without extension
 *
 * @return string
 */
function use_template($template) {
	return "views/$template.php";
}

/**
 * Pritty Print Array
 *
 * @param $input
 */
function p_print($input) {
	echo '<pre>';
	print_r($input);
	echo '</pre>';
}

/**
 * Creats HTML alert code with information about the success or failure
 *
 * @param string $feedback Error/Success message
 *
 * @return string
 */
function get_error($feedback) {
	$feedback  = json_decode($feedback, true);
	$error_exp = '
        <div class="alert alert-' . $feedback['type'] . '" role="alert">
            ' . $feedback['message'] . '
        </div>';

	return $error_exp;
}

/**
 * Changes the HTTP Header to a given location
 *
 * @param string $location location to be redirected to
 */
function redirect($location) {
	header(sprintf('Location: %s', $location));
	die();
}