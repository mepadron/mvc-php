<?php
namespace App;

class Router
{
 protected $routes = [];
 private function addRoute($route, $controller, $action, $method) {
    $this->routes[$method][$route] = [
        'controller' => $controller,
        'action' => $action
    ];
 }


 public function get($route, $controller, $action) {
    $this->addRoute($route, $controller, $action, 'GET');
 }

 public function post($route, $controller, $action) {
    $this->addRoute($route, $controller, $action, 'POST');
 }

 public function put($route, $controller, $action) {
    $this->addRoute($route, $controller, $action, 'PUT');
 }

 public function delete($route, $controller, $action) {
    $this->addRoute($route, $controller, $action, 'DELETE');
 }

 public function processRoute() {
    $url = strtok($_SERVER['REQUEST_URI'], '?');
    $method = $_SERVER['REQUEST_METHOD'];

    if(array_key_exists($url, $this->routes[$method])) {
        $controller = $this->routes[$method][$url]['controller'];
        $action = $this->routes[$method][$url]['action'];

        $controller = new $controller();
        $controller->$action();
        
    }else {
        throw new  \Exception("404 Not Found");
    }
 }
}