<?php

$router->get('/', 'HomeController@index');
$router->get('/jobs', 'JobController@index');
$router->post('/jobs', 'JobController@store');
$router->get('/jobs/create', 'JobController@create');
$router->get('/about', 'AboutController@index');
$router->get('/contact', 'ContactController@index');
$router->get('/category', 'CategoryController@index');
$router->get('/testimonial', 'TestimonialController@index');
