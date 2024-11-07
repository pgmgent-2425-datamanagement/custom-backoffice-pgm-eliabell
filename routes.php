<?php

//$router->get('/', function() { echo 'Dit is de index vanuit de route'; });
$router->setNamespace('\App\Controllers');
$router->get('/', 'HomeController@index');
$router->get('/catalog', 'BookController@catalog');
$router->get('/catalog/add', 'BookController@add');
$router->get('/catalog/edit/{id}', 'BookController@edit');
$router->post('/catalog/edit/{id}', 'BookController@update');

$router->get('/catalog/delete/{id}', 'BookController@delete');
$router->post('/catalog/save', 'BookController@save');
$router->get('/catalog/detail/{id}', 'BookController@detail');
$router->get('/authors', 'AuthorController@catalog');
$router->get('/authors/add', 'AuthorController@add');
$router->get('/authors/edit/{id}', 'AuthorController@edit');
$router->get('/authors/delete/{id}', 'AuthorController@delete');
$router->post('/authors/save', 'AuthorController@save');
$router->get('/authors/detail/{id}', 'AuthorController@detail');
$router->get('/genres', 'GenreController@catalog');
