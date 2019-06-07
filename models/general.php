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
ini_set('html_errors', false); // display errors as text so its easier to read in js console


// routes class
class Routes {
	var $navigation = [];
	var $active_route = null;

	// send the user to the active function
	function start() {
		$this->active_route['function']($this->active_route, $this->navigation);
	}

	// add a possible route
	function newRoute($route_uri, $request_type, $menu_title = false, $function = false) {

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
				return error('wrong HTTP method for this request');
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
function getNavigation($template, $active_item) {
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
 * Creates filename to the template
 *
 * @param string $template filename of the template without extension
 *
 * @return string
 */
function useTemplate($template) {
	return "views/$template.php";
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

function send($data) {
	// send data to the client
	http_response_code(200);
	echo json_encode($data);
}

function error($data, $code = 400) {
	// send an error to the client
	http_response_code($code);
	echo json_encode(["error" => $data]);
	die();
	return false;
}

function debug($where, $dump){
	$data = [$where => $dump];
	file_put_contents("debug.log", json_encode($data) . PHP_EOL, FILE_APPEND);
}