<?php

$router->get('/', 'HomeController@index');
$router->get('/jobs', 'JobController@index');
$router->get('/jobs/create', 'JobController@create');
$router->get('/about', 'AboutController@index');
$router->get('/contact', 'ContactController@index');
$router->get('/category', 'CategoryController@index');
$router->get('/testimonial', 'TestimonialController@index');


//auth routes
$router->get('/signup-type', 'AuthController@Index');
$router->get('/org-create', 'OrgController@Create');
$router->post('/org-create', 'OrgController@Store');
// $router->get('/appl-create', 'AuthController@applCreate');
// $router->post('/appl-create', 'AuthController@applStore');
$router->get('/login', 'LoginController@Index');
$router->post('/login', 'LoginController@Login');
$router->get('/logout', 'AuthController@Logout');
$router->get('/home/organization', 'HomeController@organization');

