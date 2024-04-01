<?php

$router->get('/', 'HomeController@index');

$router->get('/about', 'AboutController@index');
$router->get('/contact', 'ContactController@index');
$router->get('/category', 'CategoryController@index');
$router->get('/testimonial', 'TestimonialController@index');
// Jobs Routes
$router->get('/jobs', 'JobController@index');
$router->get('/jobs/create', 'JobController@create');
$router->get('/jobs/show', 'JobController@create');
// Applicants Routes
$router->get('/applicants', 'ApplicantController@index');
$router->get('/applicants/show', 'ApplicantController@show');
$router->get('/applicants/jobs', 'ApplicantController@jobs');
$router->get('/applicants/edit', 'ApplicantController@edit');
// Organizations Routes
// $router->get('/organizations', 'OrganizationController@index');
$router->get('/organizations/show', 'OrganizationController@show');
$router->get('/organizations/edit', 'OrganizationController@edit');
$router->get('/organizations/jobs', 'OrganizationController@jobs');
$router->get('/organizations/job-apps', 'OrganizationController@applications');
$router->post('/organizations/updateStatus', 'OrganizationController@updateStatus');


