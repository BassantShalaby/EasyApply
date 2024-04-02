<?php

namespace App\Controllers;

use Framework\Database;

class CategoryController
{

    
    function index()
    {
        $config = require basePath('config/db.php');
        $dp = new Database($config);

        $categories = $dp->query('select * from categories') ->fetchAll();

        view('categories/category',['categories' => $categories]);
    }

    function show(){

        $id = $_GET['id'];
        $config = require basePath('config/db.php');
        $dp = new Database($config);

        $categoryName = $dp->query('SELECT name FROM categories WHERE id = ' . $id)->fetchColumn();
        $categoryJobs = $dp->query('select * from jobs where id='. $id) -> fetchAll();
        // $categoryJobs = $dp->query('SELECT * FROM jobs WHERE id = ' . $id . ' AND expiry_date < CURDATE()')->fetchAll();
        loadPartial('category',['categoryJobs' => $categoryJobs ]);
        view('categories/show' , ['categoryJobs' => $categoryJobs , 'categoryName' => $categoryName]);

    }
}




