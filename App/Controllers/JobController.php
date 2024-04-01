<?php

namespace App\Controllers;

use Framework\Database;

class JobController
{
    protected $db;

    public function __construct()
    {

        $config = require basePath('config/db.php');
        $this->db = new Database($config);

    }
    public function index()
    {
        $jobs = $this->db->query('SELECT * FROM jobs')->fetchAll();
        $city = $this->db->query('select ci.name from jobs j join cities ci ON ci.id = j.city_id')->fetch();
        $country = $this->db->query('select c.name from jobs j join countries c ON c.id = j.country_id')->fetch();
        view('jobs/index', [
            'jobs' => $jobs,
            'city' => $city,
            'country' => $country
        ]);
    }
    public function create()
    {
        view('jobs/create');
    }
}