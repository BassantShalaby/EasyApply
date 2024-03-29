<?php

// return [
//     '/' => 'controllers/home.php',
//     '/jobs' => 'controllers/jobs/index.php',
//     '/jobs/create' => 'controllers/jobs/create.php',
// ];

$router->get('/', 'controllers/home.php');
$router->get('/jobs', 'controllers/jobs/index.php');
$router->get('/jobs/create', 'controllers/jobs/create.php');
$router->get('/about', 'controllers/about.php');
$router->get('/category', 'controllers/category.php');
$router->get('/contact', 'controllers/contact.php');
$router->get('/testimonial', 'controllers/testimonial.php');