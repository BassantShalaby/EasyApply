<?php

namespace App\Controllers;

use Framework\Database;
use PDO;


class OrganizationController
{
    protected $db;

    public function __construct()
    {

        $config = require basePath('config/db.php');
        $this->db = new Database($config);

    }
    public function index()
    {
        view('organizations/index');
    }

    public function show()
    {
        $id = $_SESSION['id'];
        $org = $this->db->query('SELECT * FROM organizations WHERE id =' . $id . '')->fetch();
        $org_city = $this->db->query('select ci.name from organizations o join cities ci ON ci.id = o.city_id
        where o.id=' . $id . ';')->fetch();
        $org_country = $this->db->query('select c.name from organizations o join countries c ON c.id = o.country_id
        where o.id=' . $id . ';')->fetch();
        $org_jobs = $this->db->query('select count(*) from jobs j join organizations o on j.org_id = o.id
        where o.id=' . $id . ';')->fetch();
        if (!$org) {
            ErrorController::notFound('Applicant not found');
            return;
        }
        view('organizations/view', [
            'organization' => $org,
            'org_city' => $org_city,
            'org_country' => $org_country,
            'org_jobs' => $org_jobs,
        ]);
    }

    public function edit()
    {
        $id = $_SESSION['id'];
        $org = $this->db->query('SELECT * FROM organizations WHERE id =' . $id . '')->fetch();
        $org_city = $this->db->query('select ci.name from organizations o join cities ci ON ci.id = o.city_id
        where o.id=' . $id . ';')->fetch();
        $org_country = $this->db->query('select c.name from organizations o join countries c ON c.id = o.country_id
        where o.id=' . $id . ';')->fetch();
        view('organizations/edit', [
            'org' => $org,
            'org_city' => $org_city,
            'org_country' => $org_country,
        ]);
    }

    public function jobs()
    {
        $id = $_SESSION['id'];
        $org = $this->db->query('SELECT * FROM organizations WHERE id =' . $id . '')->fetch();
        $org_jobs = $this->db->query('select * from jobs j join organizations o on j.org_id = o.id
        where o.id=' . $id . ';')->fetchAll();
        view('organizations/jobs', [
            'org' => $org,
            'jobs' => $org_jobs,
        ]);

    }


    public function applications()
    {
        $id = $_SESSION['id'];
        $job = $this->db->query('SELECT * FROM jobs WHERE id =' . $id . '')->fetch();
        $applications = $this->db->query('SELECT
        a.id as applicant_id,
        j.title AS job_title,
        CONCAT(a.first_name, " ", a.last_name) AS applicant_name,
        ap.status AS status,
        ap.reason AS reason
        FROM
        applies ap
        JOIN
        jobs j ON ap.job_id = j.id
        JOIN
        applicants a ON ap.applicant_id = a.id;')->fetchAll();
        $status = $this->db->query("SHOW COLUMNS FROM applies WHERE Field = 'status'");
        if ($status->rowCount() > 0) {
            $row = $status->fetch(PDO::FETCH_ASSOC);
            $status_values = explode(",", str_replace("'", "", substr($row['Type'], 5, -1)));
        }
        view('organizations/jobs-apps', [
            'job' => $job,
            'applications' => $applications,
            'status_values' => $status_values,
        ]);

    }

    public function updateStatus()
    {   

        $this->updateApplicationStatus();
        $id = $_GET['id'];
        // Redirect to the desired page
        header("Location: /organizations/job-apps?id=$id");
    }

    public function updateApplicationStatus(){

        $this->db->query("UPDATE applies SET status = '{$_POST['new_status']}' WHERE applicant_id = {$_POST['applicant_id']}");        
    }


}