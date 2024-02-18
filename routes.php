<?php

// Article blog routes
$router->get('/', 'ArticlesController@index');
$router->get('/show/{id}', 'ArticlesController@show');

// Auth Routes

// Admin routes
$router->get('/admin/dash', 'AdminController@index');
$router->get('/admin/new', 'AdminController@new');
$router->post('/admin/dash', 'AdminController@create');
