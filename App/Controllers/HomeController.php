<?php

namespace App\Controllers;

use Framework\Database;
use PDO;

class HomeController
{
    protected $db;
    public function __construct()
    {
        $config = require basePath('config/db.php');
        $this->db = new Database($config);
    }
    public function index()
    {
        $categories = $this->db->query('select * from categories')->fetchAll();
        $q = 'select j.*, c.name as city_name, ct.name as country_name from jobs j join cities c on j.city_id = c.id join countries ct on c.country_id = ct.id where j.expiry_date > NOW()';
        $jobs = $this->db->query($q)->fetchAll();
        // $jobs = $this->db->query('SELECT * FROM jobs WHERE id = ' . $id . ' AND expiry_date < CURDATE()')->fetchAll();

        view('home', ['categories' => $categories, 'jobs' => $jobs]);
    }
    public function Organization()
    {
        view('organization');
    }
    public function applicant()
    {
        view('applicant');
    }
}