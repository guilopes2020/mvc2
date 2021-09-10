<?php
use core\Router;
use src\controllers\HomeController;

$router = new Router();

$router->get('/', 'HomeController@index');
$router->get('/novo', 'ClientesController@add');
$router->post('/novo', 'ClientesController@addAction');
$router->get('/editar/{id}', 'ClientesController@update');
$router->post('/editar/{id}', 'ClientesController@updateAction');
$router->get('/excluir/{id}', 'ClientesController@del');