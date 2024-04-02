<?php

namespace App\Controllers;

use Framework\Database;

use PDO;

class JobController
{
    protected $db;

    public function index()
    {
        $config = require basePath('config/db.php');
        $this->db = new Database($config);
        $jobs = $this->db->query('select * from jobs')->fetchAll(PDO::FETCH_ASSOC);
        view('jobs/index', [
            'jobs' => $jobs
        ]);
    }
    public function create()
    {
        view('jobs/create');
    }

    public function search()
    {
        $config = require basePath('config/db.php');
        $this->db = new Database($config);

        $keywords = isset($_GET['keywords']) ? trim($_GET['keywords']) : '';
        $location = isset($_GET['location']) ? trim($_GET['location']) : '';

        $query = "SELECT * FROM jobs 
            WHERE (title LIKE :keywords OR description LIKE :keywords OR job_status LIKE :keywords 
                   OR experience LIKE :keywords OR location_type LIKE :keywords OR gender LIKE :keywords 
                   OR emp_type LIKE :keywords) 
            AND (city_id IN (SELECT id FROM cities WHERE name LIKE :location) 
                 OR country_id IN (SELECT id FROM countries WHERE name LIKE :location))";

        // Dump the generated SQL query and parameters for debugging
        $params = [
            'keywords' => "%{$keywords}%",
            'location' => "%{$location}%"
        ];

        $jobs = $this->db->query($query, $params)->fetchAll();

        View('/jobs/index', [
            'jobs' => $jobs,
            'keywords' => $keywords,
            'location' => $location
        ]);
    }
}
