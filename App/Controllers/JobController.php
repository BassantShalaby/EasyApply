<?php

namespace App\Controllers;

use Framework\Database;
use Framework\Sanitization;
use PDO;

class JobController
{
    protected $db;
    protected $categories;
    protected $countries;
    protected $cities;
    protected $skills;

    public function __construct()
    {
        $config = require basePath('config/db.php');
        $this->db = new Database($config);
        $this->categories = $this->db->query('select id, name from categories')->fetchAll(PDO::FETCH_ASSOC);
        $this->countries = $this->db->query('select id, name from countries')->fetchAll(PDO::FETCH_ASSOC);
        $this->cities = $this->db->query('select a.id as country_id, b.id as city_id, a.name as country_name, b.name as city_name from countries a join cities b on a.id = b.country_id')->fetchAll(PDO::FETCH_ASSOC);
        $this->skills = $this->db->query('select id, name from skills')->fetchAll(PDO::FETCH_ASSOC);
    }
    public function index()
    {
        $q = 'select j.*, c.name as city_name, ct.name as country_name from jobs j join cities c on j.city_id = c.id join countries ct on c.country_id = ct.id';
        $jobs = $this->db->query($q)->fetchAll(PDO::FETCH_ASSOC);
        view('jobs/index', [
            'jobs' => $jobs,
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
        $sanitizedData = [];
        foreach ($_POST as $fieldKey => $fieldValue) {
            if (gettype($fieldValue) !== 'array') {
                $sanitizedData[$fieldKey] = Sanitization::sanitizeHTML($fieldValue);
            } else {
                $sanitizedData[$fieldKey] = $fieldValue;
            }
        }
        $requiredFields = ['title', 'description', 'requirements'];
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
            foreach ($sanitizedData as $fieldKey => $fieldValue) {
                if ($fieldValue === '') {
                    $sanitizedData[$fieldKey] = null;
                }
            }
            extract($sanitizedData);
            $q1 = 'insert into jobs (title, description, open_vacancies, level, exp_years, city_id, location_type, salary_max, salary_min, gender, emp_type, category_id, requirements) values (?,?,?,?,?,?,?,?,?,?,?,?,?)';
            $this->db->query($q1, [
                $title,
                $description,
                $vacancies,
                $level,
                $exp_years,
                $city_id,
                $location_type,
                $salary_max,
                $salary_min,
                $gender,
                $emp_type,
                $category_id,
                $requirements
            ]);

            $insertedJobId = $this->db->lastInsertId();

            foreach ($skills as $skill_id) {
                $q2 = 'insert into jobs_skills (job_id, skill_id) values (?,?)';
                $this->db->query($q2, [
                    $insertedJobId,
                    $skill_id
                ]);
            }

            redirect("/jobs/show?id=$insertedJobId");
        }
    }

    public function show()
    {
        $id = $_GET['id'];

        $jobQ = 'select j.*, c.name as city_name, ct.name as country_name from jobs j join cities c on j.city_id = c.id join countries ct on c.country_id = ct.id where j.id = ?';
        $skillsQ = 'select name from skills s join jobs_skills js on s.id = js.skill_id where js.job_id = ?';
        $companyQ = 'select name, info from organizations where id=?';
        $job = $this->db->query($jobQ, [$id])->fetch(PDO::FETCH_ASSOC);
        $skills = $this->db->query($skillsQ, [$id])->fetchAll(PDO::FETCH_ASSOC);
        $company = $this->db->query($companyQ, [$job['org_id']])->fetchAll(PDO::FETCH_ASSOC);

        $job['description'] = $job['description'] ? explode("\r\n", $job['description']) : $job['description'];
        $job['requirements'] = $job['requirements'] ? explode("\r\n", $job['requirements']) : $job['requirements'];

        view('jobs/show', [
            'job' => $job,
            'skills' => $skills,
            'company' => $company,
            'job_id' => $id,
        ]);
    }

    public function send_applied_job()
    {
        $job_id = isset($_GET['id']) ? intval($_GET['id']) : null;
    
        // Get reason from the form
        $reason = isset($_POST['reason']) ? trim($_POST['reason']) : '';
    
        // Get applicant ID from session (assuming it's stored in session variable $_SESSION['applicant_id'])
        $applicant_id = $_SESSION['applicant_id'] ?? null;
    
        // Validate job ID
        if (!$job_id) {
            echo "Job ID is missing";
            return;
        }
    
        if (empty($reason)) {
            $errors['reason'] = 'Reason is required';
        }
    
        if (!empty($errors)) {
            view('apply', [
                'errors' => $errors,
                'apply' => ['reason' => $reason]
            ]);
            return; 
        }

        $applicant_id = isset($_SESSION['id']) ? intval($_SESSION['id']) : null;
        // $applicant_id = ;

        $data = [
            'applicant_id' => $applicant_id,
            'job_id' => $job_id,
            'status' => 'applied',
            'reason' => $reason
        ];
    
        try {
            $fields = implode(', ', array_keys($data));
            $placeholders = ':' . implode(', :', array_keys($data));
            $query = "INSERT INTO applies ({$fields}) VALUES ({$placeholders})";
            $this->db->query($query, $data);
    
            // Redirect to a success page or do other actions upon successful insertion
            redirect('/jobs');            
            // exit();
            
        } catch (\Exception $e) {
            // Handle database insertion error
            echo "An error occurred: " . $e->getMessage();
        }
    }
    
 
    public function destroy()
    {
        $id = $_GET['id'];
        $job = $this->db->query('select * from jobs where id = ?', [$id])->fetch(PDO::FETCH_ASSOC);

        if (!$job) {
            ErrorController::notFound('Job Not Found');
            return;
        }

        $this->db->query('delete from jobs where id = ?', [$id]);
        redirect('/jobs');
    }

    public function edit()
    {
        $id = $_GET['id'];
        $job = $this->db->query('select * from jobs where id = ?', [$id])->fetch(PDO::FETCH_ASSOC);

        $selectedJobSkillsIds = [];
        $jobSkillsIds = $this->db->query('select skill_id from jobs_skills where job_id = ?', [$id])->fetchAll(PDO::FETCH_ASSOC);
        foreach ($jobSkillsIds as $jobSkillId) {
            $selectedJobSkillsIds[] = $jobSkillId['skill_id'];
        }

        view('jobs/edit', [
            'job' => $job,
            'skills' => $this->skills,
            'categories' => $this->categories,
            'selectedJobSkillsIds' => $selectedJobSkillsIds,
            'countries' => $this->countries,
            'cities' => $this->cities,

        ]);
    }
    public function update()
    {
        $id = $_GET['id'];
        $job = $this->db->query('select * from jobs where id = ?', [$id])->fetch(PDO::FETCH_ASSOC);

        $selectedJobSkillsIds = [];
        $jobSkillsIds = $this->db->query('select skill_id from jobs_skills where job_id = ?', [$id])->fetchAll(PDO::FETCH_ASSOC);
        foreach ($jobSkillsIds as $jobSkillId) {
            $selectedJobSkillsIds[] = $jobSkillId['skill_id'];
        }

        $sanitizedData = [];
        foreach ($_POST as $fieldKey => $fieldValue) {
            if (gettype($fieldValue) !== 'array') {
                $sanitizedData[$fieldKey] = Sanitization::sanitizeHTML($fieldValue);
            } else {
                $sanitizedData[$fieldKey] = $fieldValue;
            }
        }
        $requiredFields = ['title', 'description'];
        $errors = [];

        foreach ($requiredFields as $field) {
            if (empty(trim($sanitizedData[$field]))) {
                $errors[] = ucfirst($field) . " is required";
            }
        }

        if (!empty($errors)) {
            view('jobs/edit', [
                'errors' => $errors,
                'job' => $job,
                'skills' => $this->skills,
                'categories' => $this->categories,
                'selectedJobSkillsIds' => $selectedJobSkillsIds,
                'countries' => $this->countries,
                'cities' => $this->cities,
            ]);
        } else {
            foreach ($sanitizedData as $fieldKey => $fieldValue) {
                if ($fieldValue === '') {
                    $sanitizedData[$fieldKey] = null;
                }
            }
            extract($sanitizedData);
            $q1 = 'update jobs set title=?, description=?, open_vacancies=?, level=?, exp_years=?, city_id=?, location_type=?, salary_max=?, salary_min=?, gender=?, emp_type=?, category_id=?, requirements=? where id=?';
            $this->db->query($q1, [
                $title,
                $description,
                $vacancies,
                $level,
                $exp_years,
                $city_id,
                $location_type,
                $salary_max,
                $salary_min,
                $gender,
                $emp_type,
                $category_id,
                $requirements,
                $id,
            ]);

            $this->db->query('delete from jobs_skills where job_id=?', [$id]);
            foreach ($skills as $skill_id) {
                $q2 = 'insert into jobs_skills (job_id, skill_id) values (?,?)';
                $this->db->query($q2, [
                    $id,
                    $skill_id
                ]);
            }

            redirect('/jobs');
        }
    }

    public function search()
    {
        $config = require basePath('config/db.php');
        $this->db = new Database($config);

        $keywords = isset($_GET['keywords']) ? trim($_GET['keywords']) : '';
        $location = isset($_GET['location']) ? trim($_GET['location']) : '';

        $query = "SELECT j.*, c.name AS city_name, co.name AS country_name
        FROM jobs j
        JOIN cities c ON j.city_id = c.id
        JOIN countries co ON c.country_id = co.id
        WHERE (
            j.title LIKE :keywords 
            OR j.description LIKE :keywords 
            OR j.job_status LIKE :keywords 
            OR j.level LIKE :keywords 
            OR j.exp_years LIKE :keywords 
            OR j.salary_max LIKE :keywords 
            OR j.salary_min LIKE :keywords 
            OR j.location_type LIKE :keywords 
            OR j.gender LIKE :keywords 
            OR j.emp_type LIKE :keywords
            OR j.requirements LIKE :keywords 
        ) 
        AND (
            c.name LIKE :location
            OR co.name LIKE :location
        )";

        // Dump the generated SQL query and parameters for debugging
        $params = [
            'keywords' => "%{$keywords}%",
            'location' => "%{$location}%"
        ];

        $jobs = $this->db->query($query, $params)->fetchAll(PDO::FETCH_ASSOC);
        // $q = 'select j.*, c.name as city_name, ct.name as country_name from jobs j join cities c on j.city_id = c.id join countries ct on c.country_id = ct.id';
        // $jobs = $this->db->query($q)->fetchAll(PDO::FETCH_ASSOC);
        View('/jobs/index', [
            'jobs' => $jobs,
            'keywords' => $keywords,
            'location' => $location
        ]);
    }
}
