<?php
// map my EventController and make endpoints available

$routes = [
    'GET' => [
        '/events' => 'EventController@index',
        '/events/{id}' => 'EventController@show',
    ],
    'POST' => [
        '/events' => 'EventController@store',
    ],
    'PUT' => [
        '/events/{id}' => 'EventController@update',
    ],
    'DELETE' => [
        '/events/{id}' => 'EventController@destroy',
    ],
];

$requestMethod = $_SERVER['REQUEST_METHOD'];
$requestUri = $_SERVER['REQUEST_URI'];

// Find the matching route
foreach ($routes[$requestMethod] as $route => $controllerMethod) {
    // Check if the route matches the current request URI
    if (preg_match('#^' . $route . '$#', $requestUri, $matches)) {
        // Extract the parameters from the URI
        $parameters = array_slice($matches, 1);

        // Call the corresponding controller method
        list($controller, $method) = explode('@', $controllerMethod);
        $controller = new $controller();
        call_user_func_array([$controller, $method], $parameters);

        // Stop processing further routes
        break;
    }
}
?>