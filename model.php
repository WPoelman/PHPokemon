<?php
/**
 * Model
 * User: Eindopdracht Webprogramming
 * Date: 23-05-2019
 */

/* Enable error reporting */
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

/**
 * Check if the route exist
 * @param string $route_uri URI to be matched
 * @param string $request_type request method
 * @return bool
 *
 */
function new_route($route_uri, $request_type)
{
    $route_uri_expl = array_filter(explode('/', $route_uri));
    $current_path_expl = array_filter(explode('/', parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)));
    if ($route_uri_expl == $current_path_expl && $_SERVER['REQUEST_METHOD'] == strtoupper($request_type)) {
        return True;
    }
}

/**
 * Creates a new navigation array item using url and active status
 * @param string $url The url of the navigation item
 * @param bool $active Set the navigation item to active or inactive
 * @return array
 */
function na($url, $active)
{
    return [$url, $active];
}

/**
 * Creates filename to the template
 * @param string $template filename of the template without extension
 * @return string
 */
function use_template($template)
{
    $template_doc = sprintf("views/%s.php", $template);
    return $template_doc;
}

/**
 * Creates breadcrumb HTML code using given array
 * @param array $breadcrumbs Array with as Key the page name and as Value the corresponding url
 * @return string html code that represents the breadcrumbs
 */
function get_breadcrumbs($breadcrumbs)
{
    $breadcrumbs_exp = '
    <nav aria-label="breadcrumb">
    <ol class="breadcrumb">';
    foreach ($breadcrumbs as $name => $info) {
        if ($info[1]) {
            $breadcrumbs_exp .= '<li class="breadcrumb-item active" aria-current="page">' . $name . '</li>';
        } else {
            $breadcrumbs_exp .= '<li class="breadcrumb-item"><a href="' . $info[0] . '">' . $name . '</a></li>';
        }
    }
    $breadcrumbs_exp .= '
    </ol>
    </nav>';
    return $breadcrumbs_exp;
}

/**
 * Pritty Print Array
 * @param $input
 */
function p_print($input)
{
    echo '<pre>';
    print_r($input);
    echo '</pre>';
}

/**
 * Creats HTML alert code with information about the success or failure
 * @param bool $type True if success, False if failure
 * @param string $message Error/Success message
 * @return string
 */
function get_error($feedback)
{
    $feedback = json_decode($feedback, True);
    $error_exp = '
        <div class="alert alert-' . $feedback['type'] . '" role="alert">
            ' . $feedback['message'] . '
        </div>';
    return $error_exp;
}

/**
 * Changes the HTTP Header to a given location
 * @param string $location location to be redirected to
 */
function redirect($location)
{
    header(sprintf('Location: %s', $location));
    die();
}