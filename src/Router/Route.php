<?php

namespace App\Router;

class Route {

  protected $_path;
  protected $_callback;
  protected $_matches;

  public function __construct($path, $callback) {
    $this->_path = trim($path, '/');
    $this->_callback = $callback;
  }

  public function match ($url){
    $url = trim($url, '/');
    $path = preg_replace('#:([\w]+)#', '([^/]+)', $this->_path);
    $reg = '#^';
    $ex = '$#i';
    $regex = $reg.$path.$ex;
    if (!preg_match($regex, $url, $matches)){
      return false;
    }
    array_shift($matches);
    $this->_matches = $matches;
    return true;
  }

  public function call() {
    call_user_func_array($this->_callback, $this->_matches);
  }

}