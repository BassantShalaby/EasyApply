<?php

namespace App\Controllers;

use Framework\Database;


class CategoryController
{
    function index()
    {
        // $id = $_GET['id'];
        $config = require basePath('config/db.php');
        $dp = new Database($config);
        $categories = $dp->query('select * from categories')->fetchAll();
        // $vacancies = $dp->query('SELECT        
        // COUNT(j.id) AS job_count
        // FROM categories c LEFT JOIN jobs j ON c.id = j.category_id
        // WHERE j.job_status = "Open" and j.open_vacancies > 0 and  expiry_date > NOW()
        // GROUP BY c.id;')->fetch();
        view('categories/category', ['categories' => $categories]);
    }

    function show()
    {

        $id = $_GET['id'];
        $config = require basePath('config/db.php');
        $dp = new Database($config);

        $categoryName = $dp->query('SELECT name FROM categories WHERE id = ' . $id)->fetchColumn();
        $categoryJobs = $dp->query('
        SELECT 
            j.*, 
            c.name AS city_name, 
            co.name AS country_name 
        FROM 
            jobs j 
        JOIN 
            cities c ON j.city_id = c.id 
        JOIN 
            countries co ON c.country_id = co.id 
        WHERE 
            j.category_id = ' . $id . 'AND expiry_date > NOW();')->fetchAll();
        // $categoryJobs = $dp->query('SELECT * FROM jobs WHERE id = ' . $id . ' AND expiry_date < CURDATE()')->fetchAll();
        loadPartial('category', ['categoryJobs' => $categoryJobs]);
        view('categories/show', ['categoryJobs' => $categoryJobs, 'categoryName' => $categoryName]);

    }
}




