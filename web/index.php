<?php

/**
 * Входная точка сайта
 */
require '../vendor/autoload.php';

$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

use DI\Container;

// $url = $_SERVER['REQUEST_URI'];
// $controller = [];

// if ($url == '/') {
//   $controller = ["App\controllers\HomeController", "index"];
// } elseif ($url == '/about') {
//   $controller = ["App\controllers\HomeController", "about"];
// }

// if (empty($controller)) {
//   echo "404 | ERROR";
// } else {
//   call_user_func($controller);
// }

$dispatcher = FastRoute\simpleDispatcher(function (FastRoute\RouteCollector $r) {
  $r->addRoute('GET', '/users/{id}', ["App\controllers\HomeController", "index"]);
  // {id} must be a number (\d+)
  // $r->addRoute('GET', '/user/{id:\d+}', ["App\controllers\HomeController", "index"]);
  // The /{title} suffix is optional
  // $r->addRoute('GET', '/articles/{id:\d+}[/{title}]', 'get_article_handler');
});

// Fetch method and URI from somewhere
$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

// Strip query string (?foo=bar) and decode URI
if (false !== $pos = strpos($uri, '?')) {
  $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);
switch ($routeInfo[0]) {
  case FastRoute\Dispatcher::NOT_FOUND:
    // ... 404 Not Found
    echo "404 Not Found";
    break;
  case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
    $allowedMethods = $routeInfo[1];
    // ... 405 Method Not Allowed
    echo "405 Method Not Allowed";
    break;
  case FastRoute\Dispatcher::FOUND:
    $handler = $routeInfo[1];
    $vars = $routeInfo[2];
    // ... call $handler with $vars
    $container = new DI\Container();
    $container->call($handler, $vars);
    break;
}