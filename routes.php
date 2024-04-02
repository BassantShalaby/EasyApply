<?php

$router->get('/', 'HomeController@index' , ['auth']);
$router->get('/jobs', 'JobController@index');
$router->get('/jobs/create', 'JobController@create');
$router->get('/about', 'AboutController@index');
$router->get('/contact', 'ContactController@index');
$router->get('/category', 'CategoryController@index');
$router->get('/testimonial', 'TestimonialController@index');


//auth routes
//signup as ....
$router->get('/signup-type', 'AuthController@Index');

//organization signup
$router->get('/org-create', 'OrgController@Create');
$router->post('/org-create', 'OrgController@Store');
$router->get('/home/organization', 'HomeController@organization');


// applicant signup
$router->get('/appl-create', 'ApplicantController@Create');
$router->post('/appl-create', 'ApplicantController@Store');
$router->get('/home/applicant', 'HomeController@applicant');

//login
$router->get('/login', 'LoginController@Index');
$router->post('/login', 'LoginController@Login');

//logout
$router->get('/logout', 'AuthController@Logout');



