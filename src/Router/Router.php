<?php

namespace App\Router;

class Router {

  private $_url;
  private $_routes = [
    'GET' => [],
    'POST' => []
  ];

  public function __construct($url) {
    $this->_url = $url;
  }

  public function get($path, $callback){
    $this->_routes['GET'][] = new Route($path, $callback);
  }

  public function post($path, $callback){
    $this->_routes['POST'][] = new Route($path, $callback);
  }

  public function drive_check() {
    $method = $_SERVER['REQUEST_METHOD'];
    if (!isset($this->_routes[$method])){
      throw new RouterException('La requête n\'existe pas');
    }
    foreach ($this->_routes[$method] as $route){
      if ($route->match($this->_url)){
        return $route->call();
      }
    }
    throw new RouterException('Aucune route ne correspond');
    //echo '<pre>'.print_r($this->_routes, true).'</pre>';
  }

}
