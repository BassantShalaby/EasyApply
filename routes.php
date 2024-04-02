<?php

$router->get('/', 'HomeController@index');
$router->get('/about', 'AboutController@index');
$router->get('/contact', 'ContactController@index');

//--------------------
//apply routes
//--------------------

//--------------------
//category routes
//--------------------
$router->get('/category', 'CategoryController@index');
$router->get('/category/show', 'CategoryController@show');
$router->get('/testimonial', 'TestimonialController@index');

//--------------------
//Jobs routes
//--------------------
$router->get('/jobs', 'JobController@index');
$router->post('/jobs', 'JobController@store');
$router->delete('/jobs/destroy', 'JobController@destroy');
$router->get('/jobs/edit', 'JobController@edit');
$router->put('/jobs/update', 'JobController@update');
$router->get('/jobs/show', 'JobController@show');
$router->get('/jobs/create', 'JobController@create');
$router->get('/jobs/search', 'JobController@search');
$router->post('/jobs/show', 'JobController@send_applied_job');

//--------------------
//Auth routes
//--------------------

//signup as ....
$router->get('/signup-type', 'AuthController@Index');
//organization signup
$router->get('/org-create', 'OrgController@Create');
$router->post('/org-create', 'OrgController@Store');
$router->get('/home/organization', 'HomeController@organization');
//applicant signup
$router->get('/appl-create', 'ApplicantController@Create');
$router->post('/appl-create', 'ApplicantController@Store');
$router->get('/home/applicant', 'HomeController@applicant');
//login
$router->get('/login', 'LoginController@Index');
$router->post('/login', 'LoginController@Login');
//logout
$router->get('/logout', 'AuthController@Logout');

//--------------------
// Applicants Routes
//--------------------
$router->get('/applicants', 'ApplicantController@index');
$router->get('/applicants/show', 'ApplicantController@show');
$router->get('/applicants/jobs', 'ApplicantController@jobs');
$router->get('/applicants/edit', 'ApplicantController@edit');

//--------------------
// Organizations Routes
//--------------------
$router->get('/organizations', 'OrganizationController@index');
$router->get('/organizations/show', 'OrganizationController@show');
$router->get('/organizations/edit', 'OrganizationController@edit');
$router->get('/organizations/jobs', 'OrganizationController@jobs');
$router->get('/organizations/job-apps', 'OrganizationController@applications');
$router->post('/organizations/updateStatus', 'OrganizationController@updateStatus');


