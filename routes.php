<?php

$router->get('/', 'HomeController@index');

$router->get('/jobs', 'JobController@index');
$router->post('/jobs', 'JobController@store');
$router->delete('/jobs/destroy', 'JobController@destroy');
$router->get('/jobs/edit', 'JobController@edit');
$router->put('/jobs/update', 'JobController@update');

$router->get('/jobs/show', 'JobController@show');
$router->get('/jobs/create', 'JobController@create');
$router->get('/about', 'AboutController@index');
$router->get('/contact', 'ContactController@index');
$router->get('/category', 'CategoryController@index');
$router->get('/testimonial', 'TestimonialController@index');
