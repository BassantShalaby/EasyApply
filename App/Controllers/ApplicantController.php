<?php

namespace App\Controllers;

use Framework\Database;
use PDO;


class ApplicantController
{
    protected $db;

    public function __construct()
    {
        $config = require basePath('config/db.php');
        $this->db = new Database($config);
    }
    public function index()
    {

        view('applicants/index');
    }

    public function show()
    {
        $id = $_GET['id'];
        $applicant = $this->db->query('SELECT * FROM applicants WHERE id =' . $id . '')->fetch();
        $applicant_city = $this->db->query('select ci.name from applicants a join cities ci ON ci.id = a.city_id
        where a.id=' . $id . ';')->fetch();
        $applicant_country = $this->db->query('select c.name from applicants a join countries c ON c.id = a.country_id
        where a.id=' . $id . ';')->fetch();
        $applicant_skills = $this->db->query('SELECT
        s.name AS skill_name,
        c.name AS category_name
        FROM applicants a
        JOIN
        applicant_skills aps ON a.id = aps.applicant_id
        JOIN
        skills_categories sc ON aps.skill_id = sc.skill_id
        JOIN
        skills s ON sc.skill_id = s.id
        JOIN
        categories c ON sc.category_id = c.id where a.id=' . $id . ';')->fetchAll(PDO::FETCH_ASSOC);
        if (!$applicant) {
            ErrorController::notFound('Applicant not found');
            return;
        }
        view('applicants/view', [
            'applicant' => $applicant,
            'applicant_city' => $applicant_city,
            'applicant_country' => $applicant_country,
            'applicant_skills' => $applicant_skills,
        ]);
    }

    public function edit()
    {
        $id = $_GET['id'];
        $applicant = $this->db->query('SELECT * FROM applicants WHERE id =' . $id . '')->fetch();

        view('applicants/edit');
    }

    public function jobs()
    {
        $id = $_GET['id'];
        // $org = $this->db->query('SELECT * FROM organizations WHERE id =' . $id . '')->fetch();
        $jobs = $this->db->query('SELECT
        CONCAT(a.first_name, " ", a.last_name) AS applicant_name,
        j.*,
        ap.status AS application_status,
        ap.created_at as applied_date
        FROM
        applies ap
        INNER JOIN applicants a ON ap.applicant_id = a.id
        INNER JOIN jobs j ON ap.job_id = j.id
        where a.id=' . $id . ';')->fetchAll();
        $status = $this->db->query("SHOW COLUMNS FROM applies WHERE Field = 'status'");
        if ($status->rowCount() > 0) {
            $row = $status->fetch(PDO::FETCH_ASSOC);
            $status_values = explode(",", str_replace("'", "", substr($row['Type'], 5, -1)));
        }
        view('applicants/jobs', [            
            'jobs' => $jobs,
            'status_values' => $status_values,
        ]);
    }

    public function update()
    {
    }


    public function delete()
    {
    }

}