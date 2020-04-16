<?php

require __DIR__.'/vendor/autoload.php';

$router = new App\Router\Router($_GET['url']);

$router->get('/', function () {
  echo 'je suis à l\'index';
});
$router->get('/posts', function () {
  echo 'tous les posts';
});
$router->get('/posts/:id', function ($id) {
  echo 'afficher le post n° '.$id;
});
$router->post('/posts/:id', function ($id) {
  echo 'poster le post n° '.$id;
});

$router->drive_check();