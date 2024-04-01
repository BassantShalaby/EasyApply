<?php

$router->get('/', 'HomeController@index');
$router->get('/jobs', 'JobController@index');
$router->get('/jobs/create', 'JobController@create');
$router->get('/about', 'AboutController@index');
$router->get('/contact', 'ContactController@index');
$router->get('/category', 'CategoryController@index');
$router->get('/testimonial', 'TestimonialController@index');


//auth routes
$router->get('/signup-type', 'AuthController@signupType');
$router->get('/org-create', 'AuthController@orgCreate');
$router->post('/org-create', 'AuthController@orgStore');
$router->get('/appl-create', 'AuthController@applCreate');
$router->post('/appl-create', 'AuthController@applStore');
$router->get('/login', 'AuthController@loginIndex');