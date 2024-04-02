<?php

$router->get('/', 'HomeController@index');
$router->get('/jobs', 'JobController@index');
$router->get('/jobs/create', 'JobController@create');
$router->get('/jobs/search', 'JobController@search');


$router->get('/about', 'AboutController@index');
$router->get('/contact', 'ContactController@index');

$router->get('/apply', 'ApplyController@index');
$router->post('/apply', 'ApplyController@send_applied_job');

$router->get('/category', 'CategoryController@index');
$router->get('/category/show', 'CategoryController@show');
