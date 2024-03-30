<?php



// return [
//     '/' => 'controllers/home.php',
//     '/jobs' => 'controllers/jobs/index.php',
//     '/jobs/create' => 'controllers/jobs/create.php',
// ];

$router->get('/', 'Home@index');
$router->get('/jobs', 'Jobs/index@ccccc');
$router->get('/jobs/create', '/jobs/create@ccccc');
$router->get('/about', 'About@index');
$router->get('/category', 'Category@index');
$router->get('/contact', 'Contact@index');
$router->get('/testimonial', 'Testimonial@index');


//auth routes
$router->get('/signup-type', 'SignupController@type');
$router->get('/organization-signup1', 'SignupController@create');
