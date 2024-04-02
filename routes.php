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
$router->post('/jobs', 'JobController@store', ['auth']);
$router->delete('/jobs/destroy', 'JobController@destroy', ['auth']);
$router->get('/jobs/edit', 'JobController@edit', ['auth']);
$router->put('/jobs/update', 'JobController@update', ['auth']);
$router->get('/jobs/show', 'JobController@show');
$router->get('/jobs/create', 'JobController@create', ['auth']);
$router->get('/jobs/search', 'JobController@search');
$router->post('/jobs/show', 'JobController@send_applied_job');

//--------------------
//Auth routes
//--------------------

//signup as ....
$router->get('/signup-type', 'AuthController@Index', ['guest']);
//organization signup
$router->get('/org-create', 'OrgController@Create', ['guest']);
$router->post('/org-create', 'OrgController@Store', ['guest']);
$router->get('/home/organization', 'HomeController@organization', ['auth']);
//applicant signup
$router->get('/appl-create', 'ApplicantController@Create', ['guest']);
$router->post('/appl-create', 'ApplicantController@Store', ['guest']);
$router->get('/home/applicant', 'HomeController@applicant', ['auth']);
//login
$router->get('/login', 'LoginController@Index', ['guest']);
$router->post('/login', 'LoginController@Login', ['guest']);
//logout
$router->get('/logout', 'AuthController@Logout', ['auth']);

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


