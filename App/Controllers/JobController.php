<?php

namespace App\Controllers;

use Framework\Database;
use Framework\Sanitization;
use Framework\Validation;
use PDO;

class JobController
{
    protected $db;
    protected $categories;
    protected $countries;
    protected $cities;
    protected $skills;
    // protected $jobs;


    public function __construct()
    {
        $config = require basePath('config/db.php');
        $this->db = new Database($config);
        $this->categories = $this->db->query('select id, name from categories')->fetchAll(PDO::FETCH_ASSOC);
        $this->countries = $this->db->query('select id, name from countries')->fetchAll(PDO::FETCH_ASSOC);
        $this->cities = $this->db->query('select l.country_id, l.city_id, c2.name as country_name, c.name as city_name FROM cities c JOIN locations l on c.id = l.city_id join countries c2 on c2.id = l.country_id')->fetchAll(PDO::FETCH_ASSOC);
        $this->skills = $this->db->query('select id, name from skills')->fetchAll(PDO::FETCH_ASSOC);
    }
    public function index()
    {
        $jobs = $this->db->query('select * from jobs')->fetchAll(PDO::FETCH_ASSOC);
        view('jobs/index', [
            'jobs' => $jobs
        ]);
    }
    public function create()
    {
        view('jobs/create', [
            'categories' => $this->categories,
            'countries' => $this->countries,
            'cities' => $this->cities,
            'skills' => $this->skills
        ]);
    }
    public function store()
    {
        // dd($_POST);
        $sanitizedData = [];
        foreach ($_POST as $fieldKey => $fieldValue) {
            if (gettype($fieldValue) !== 'array') {
                $sanitizedData[$fieldKey] = Sanitization::sanitizeHTML($fieldValue);
            } else {
                $sanitizedData[$fieldKey] = $fieldValue;
            }
        }
        // dd($sanitizedData);
        // $sanitizedData = array_map('Framework\Sanitization::sanitizeHTML', $_POST);
        $requiredFields = ['title', 'description'];
        $errors = [];


        foreach ($requiredFields as $field) {
            if (empty(trim($sanitizedData[$field]))) {
                $errors[] = ucfirst($field) . " is required";
            }

        }

        if (!empty($errors)) {
            view('jobs/create', [
                'errors' => $errors,
                'oldJobData' => $sanitizedData,
                'categories' => $this->categories,
                'countries' => $this->countries,
                'cities' => $this->cities,
                'skills' => $this->skills
            ]);
        } else {
            extract($sanitizedData);
            $q1 = 'insert into jobs (title, description, open_vacancies, level, exp_years, city_id, location_type, salary_max, salary_min, gender, emp_type, category_id, requirements) values (?,?,?,?,?,?,?,?,?,?,?,?,?)';
            $this->db->query($q1, [
                $title,
                $description,
                $vacancies,
                $level,
                $expYears,
                $city_id,
                $locationType,
                $salaryMax,
                $salaryMin,
                $gender,
                $empType,
                $category_id,
                $requirements
            ])->fetchAll(PDO::FETCH_ASSOC);

            $insertedJibId = $this->db->lastInsertId();

            foreach ($skills as $skill_id) {
                $q2 = 'insert into job_skills (job_id, skill_id) values (?,?)';
                $this->db->query($q2, [
                    $insertedJibId,
                    $skill_id
                ])->fetchAll(PDO::FETCH_ASSOC);
            }

            redirect('/jobs');
        }
    }
}