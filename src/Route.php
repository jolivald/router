<?php

namespace App;

class Route {

  protected $_path;

  protected $_callback;

  public function __construct($path, $callback) {
    $this->_path = $path;
    $this->_callback = $callback;
  }

}