<?php

namespace App;

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
    echo '<pre>'.print_r($this->_routes, true).'</pre>';
  }

}
