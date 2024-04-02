<?php

namespace App\Controllers;

use Framework\Database;
use Framework\Validation;
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
        $id = $_SESSION['id'];
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
        applicants_skills aps ON a.id = aps.applicant_id
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
        $id = $_SESSION['id'];
        $applicant = $this->db->query('SELECT * FROM applicants WHERE id =' . $id . '')->fetch();
        view('applicants/edit');
    }

    public function jobs()
    {
        $id = $_SESSION['id'];
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

    function Create()
    {
        $countries = $this->db->query('SELECT id, name FROM countries')->fetchAll();
        $countriesSelect = '<select class="form-select" name="country" id="country" required>';
        $countriesSelect .= '<option selected disabled>Choose a country</option>';
        foreach ($countries as $country) {
            $countriesSelect .= "<option value='" . $country['id'] . "' id='" . $country['id'] . "'>" . $country['name'] . "</option>";
        }
        $countriesSelect .= "</select>";

        $cities = $this->db->query("SELECT id,country_id, name FROM cities")->fetchAll();
        $citiesSelect = '<select class="form-select" name="city" id="city">';
        $citiesSelect .= '<option selected disabled>Choose a city</option>';
        foreach ($cities as $city) {
            $citiesSelect .= "<option value='" . $city['id'] . "' id='" . $city['country_id'] . "'>" . $city['name'] . "</option>";
        }
        $citiesSelect .= "</select>";

        $skills = $this->db->query('SELECT id, name FROM skills')->fetchAll();
        $skillsSelect = '<select class="form-select" name="skills[]" id="skills" multiple>';
        $skillsSelect .= '<option disabled>Choose your skills</option>';
        foreach ($skills as $skill) { // Use singular variable name $skill
            $skillsSelect .= "<option value='" . $skill['id'] . "'>" . $skill['name'] . "</option>"; // Corrected variable names
        }
        $skillsSelect .= "</select>";
        View('auth/appl-create', [
            'countries' => $countriesSelect,
            'cities' => $citiesSelect,
            'skills' => $skillsSelect,
            'name' => ''
        ]);
    }
    function Store()
    {
        $lname = $_POST['lname'];
        $fname = $_POST['fname'];
        $email = $_POST['email'];
        $pass1 = $_POST['pass1'];
        $pass2 = $_POST['pass2'];
        $phone = $_POST['phone'];
        $b_date = $_POST['b_date'];
        $title = $_POST['title'];
        $info = $_POST['info'];
        if (isset($_POST['skills'])) {
            $skills[] = $_POST['skills'];
        }
        if (isset($_FILES['pp'])) {
            $pp = $_FILES['pp'];
        }
        if (isset($_POST['gender'])) {
            $gender = $_POST['gender'];
        } else {
            $gender = '';
        }
        if (isset($_POST['exp_years'])) {
            $exp_years = $_POST['exp_years'];
        }
        if (isset($_POST['exp_lvl'])) {
            $exp_lvl = $_POST['exp_lvl'];
        } else {
            $exp_lvl = '';
        }
        if (isset($_FILES['pp'])) {
            $pp = $_FILES['pp']['name'];
        }
        if (isset($_FILES['cv'])) {
            $cv = $_FILES['cv']['name'];
        }
        if (isset($_POST['country'])) {
            $country = $_POST['country'];
        }
        if (isset($_POST['city'])) {
            $city = $_POST['city'];
        }
        if (isset($_POST['skill'])) {
            $skill = $_POST['skill'];
        }
        if (isset($_POST['gender']) && $_POST['gender'] == 'female') {
            $female = 'selected';
            $male = '';
            $disabledGender = '';
        }
        if (isset($_POST['gender']) && $_POST['gender'] == 'male') {
            $female = '';
            $male = 'selected';
            $disabledGender = '';
        }
        if (!isset($_POST['gender'])) {
            $female = '';
            $male = '';
            $disabledGender = 'selected';
        }
        if (isset($_POST['exp_lvl']) && $_POST['exp_lvl'] == 'entry-level') {
            $entry_lvl = 'selected';
            $junior = '';
            $mid_lvl = '';
            $senior = '';
            $lead = '';
            $disabledExp = '';
        }
        if (isset($_POST['exp_lvl']) && $_POST['exp_lvl'] == 'junior') {
            $entry_lvl = '';
            $junior = 'selected';
            $mid_lvl = '';
            $senior = '';
            $lead = '';
            $disabledExp = '';

        }
        if (isset($_POST['exp_lvl']) && $_POST['exp_lvl'] == 'mid-level') {
            $entry_lvl = '';
            $junior = '';
            $mid_lvl = 'selected';
            $senior = '';
            $lead = '';
            $disabledExp = '';

        }
        if (isset($_POST['exp_lvl']) && $_POST['exp_lvl'] == 'senior') {
            $entry_lvl = '';
            $junior = '';
            $mid_lvl = '';
            $senior = 'selected';
            $lead = '';
            $disabledExp = '';

        }
        if (isset($_POST['exp_lvl']) && $_POST['exp_lvl'] == 'lead') {
            $entry_lvl = '';
            $junior = '';
            $mid_lvl = '';
            $senior = '';
            $lead = 'selected';
            $disabledExp = '';
        }
        if (empty($_POST['exp_lvl'])) {
            $entry_lvl = '';
            $junior = '';
            $mid_lvl = '';
            $senior = '';
            $lead = '';
            $disabledExp = 'selected';
        }

        $countries = $this->db->query('SELECT id, name FROM countries')->fetchAll();
        ;
        $countriesSelect = '<select class="form-select" name="country" id="country">';
        $countriesSelect .= '<option selected disabled>Choose a country</option>';
        foreach ($countries as $country) {
            if (isset($_POST['country']) && $country['id'] == $_POST['country']) {
                $selected = 'selected';

            } else {
                $selected = '';

            }
            $countriesSelect .= "<option value='" . $country['id'] . "' id='" . $country['id'] . "' " . $selected . ">" . $country['name'] . "</option>";
        }
        $countriesSelect .= "</select>";

        $cities = $this->db->query("SELECT id,country_id, name FROM cities")->fetchAll();
        ;
        $citiesSelect = '<select class="form-select" name="city" id="city">';
        $citiesSelect .= '<option selected disabled>Choose a city</option>';
        foreach ($cities as $city) {
            if (isset($_POST['city']) && $city['id'] == $_POST['city']) {
                $selected = 'selected';
            } else {
                $selected = '';

            }
            $citiesSelect .= "<option value='" . $city['id'] . "' id='" . $city['country_id'] . "' " . $selected . ">" . $city['name'] . "</option>";
        }
        $citiesSelect .= "</select>";

        $skills = $this->db->query('SELECT id, name FROM skills')->fetchAll();
        ;
        $skillsSelect = '<select class="form-select" name="skills[] id="skills"  multiple>';
        $skillsSelect .= '<option selected disabled>Choose your skills</option>';
        foreach ($skills as $skill) {
            if (isset($_POST['skill']) && $skill['name'] == $_POST['skill']) {
                $selected = 'selected';
            } else {
                $selected = '';

            }
            $skillsSelect .= "<option value='" . $skill['name'] . "' " . $selected . ">" . $skill['name'] . "</option>";
        }
        $skillsSelect .= "</select>";


        $errors = [];
        if (!Validation::string($fname) && empty($errors)) {
            $errors[] = 'First name is required';
        }
        if (!Validation::string($lname) && empty($errors)) {
            $errors[] = 'Last name is required';
        }
        if (!preg_match('/^[a-zA-Z\s.]+$/', $lname) && !preg_match('/^[a-zA-Z\s.]+$/', $lname) && empty($errors)) {
            $errors[] = "Firsrt and last names can only contain letters, spaces, and periods.";
        }


        if (!Validation::string($email) && empty($errors)) {
            $errors[] = 'Email is required';
        }
        if (!Validation::email($email) && empty($errors)) {
            $errors[] = 'Please enter a valid email address';
        }
        if (!Validation::string($pass1, 8, 50) && empty($errors)) {
            $errors[] = 'Password must be at least 8 charachters';
        }
        if ((!Validation::string($pass1) || !Validation::string($pass2)) && empty($errors)) {
            $errors[] = 'Password and password confirmation are required';
        }
        if (!Validation::match($pass1, $pass2) && empty($errors)) {
            $errors[] = 'Passwords don\'t match';
        }
        if (!Validation::string($phone) && empty($errors)) {
            $errors[] = 'Phone number is required';
        }
        if (!preg_match('/^\+\d{1,3}\d{11}$/', $phone) && empty($errors)) {
            $errors[] = "Phone number should start with a plus sign (+) followed by the country code and the phone number (e.g., +201227860498)";
        }
        if (!Validation::string($b_date) && empty($errors)) {
            $errors[] = 'Birth date is required';
        }

        if (!Validation::string($title) && empty($errors)) {
            $errors[] = 'Profession title is required';
        }
        if (!Validation::string($exp_years) && empty($errors)) {
            $errors[] = 'Number of experience years is required';
        }
        if (empty($gender) && empty($errors)) {
            $errors[] = 'Gender is required';
        }
        if (empty($exp_lvl) && empty($errors)) {
            $errors[] = 'Experience level is required';
        }

        if (!Validation::string($info) && empty($errors)) {
            $errors[] = 'Your information (bio) is required';
        }
        if (!Validation::string($info, 100, 255) && empty($errors)) {
            $errors[] = "Your information (bio) must be between 100 and 255 characters long.";
        }

        if (empty($_POST['country']) && empty($errors)) {
            $errors[] = 'Country is required';
        }
        if (empty($_POST['city']) && empty($errors)) {
            $errors[] = 'City is required';
        }
        if (empty($_POST['skills']) && empty($errors)) {
            $errors[] = 'Skills is required';
        }
        // Check if a file is uploaded

        if (isset($_FILES['pp']) && $_FILES['pp']['error'] === UPLOAD_ERR_OK) {
            $file_name = $_FILES['pp']['name'];
            $file_tmp = $_FILES['pp']['tmp_name'];
            $file_type = $_FILES['pp']['type'];

            // Check if the uploaded file is an image
            $allowed_types = array('image/jpeg', 'image/png', 'image/gif');
            if (in_array($file_type, $allowed_types)) {
                // Move the uploaded file to a designated folder on the server
                $upload_dir = 'uploads/images/';
                $destination = $upload_dir . $file_name;
                move_uploaded_file($file_tmp, $destination);

                // Store the file's name (or path) in your database
                $pp = $destination;

            } else {
                $errors[] = "Only JPEG, PNG, and GIF profile pictures are allowed.";
            }
        } else {
            if (empty($errors)) {
                $errors[] = "Profile picture is required.";
            }

        }
        if (isset($_FILES['cv']) && $_FILES['cv']['error'] === UPLOAD_ERR_OK) {
            $file_name = $_FILES['cv']['name'];
            $file_tmp = $_FILES['cv']['tmp_name'];
            $file_type = $_FILES['cv']['type'];

            // Check if the uploaded file is an image
            $allowed_types = array('application/pdf');
            if (in_array($file_type, $allowed_types)) {
                // Move the uploaded file to a designated folder on the server
                $upload_dir = 'uploads/pdf/';
                $destination = $upload_dir . $file_name;
                move_uploaded_file($file_tmp, $destination);

                // Store the file's name (or path) in your database
                $cv = $destination;

            } else {
                $errors[] = "Only PDF CVs are allowed.";
            }
        } else {
            if (empty($errors)) {
                $errors[] = "CV is required.";
            }

        }


        if (!empty($errors)) {
            view('auth/appl-create', [
                'errors' => $errors,
                'lname' => $lname,
                'fname' => $fname,
                'email' => $email,
                'info' => $info,
                'pass1' => $pass1,
                'pass2' => $pass2,
                'b_date' => $b_date,
                'title' => $title,
                'exp_years' => $exp_years,
                'exp_lvl' => $exp_lvl,
                'gender' => $gender,
                'female' => $female,
                'male' => $male,
                'disabledGender' => $disabledGender,
                'entry_lvl' => $entry_lvl,
                'junior' => $junior,
                'mid_lvl' => $mid_lvl,
                'senior' => $senior,
                'lead' => $lead,
                'disabledExp' => $disabledExp,
                'phone' => $phone,
                'countries' => $countriesSelect,
                'cities' => $citiesSelect,
                'skills' => $skillsSelect
            ]);
            exit;
        }
        $params = [
            'email' => $email
        ];
        $org = $this->db->query('select * from organizations where email = :email', $params)->fetchAll();
        $applicant = $this->db->query('select * from applicants where email = :email', $params)->fetchAll();

        if (count($org) > 0 || count($applicant) > 0) {
            $errors[] = "This email is already registered";
            view('auth/appl-create', [
                'errors' => $errors,
                'lname' => $lname,
                'fname' => $fname,
                'email' => $email,
                'info' => $info,
                'pass1' => $pass1,
                'pass2' => $pass2,
                'b_date' => $b_date,
                'title' => $title,
                'exp_years' => $exp_years,
                'exp_lvl' => $exp_lvl,
                'gender' => $gender,
                'female' => $female,
                'male' => $male,
                'disabledGender' => $disabledGender,
                'entry_lvl' => $entry_lvl,
                'junior' => $junior,
                'mid_lvl' => $mid_lvl,
                'senior' => $senior,
                'lead' => $lead,
                'disabledExp' => $disabledExp,
                'phone' => $phone,
                'countries' => $countriesSelect,
                'cities' => $citiesSelect,
                'skills' => $skillsSelect
            ]);
            exit;
        }

        $data = [
            'fname' => $fname,
            'lname' => $lname,
            'b_date' => $b_date,
            'email' => $email,
            'country' => $_POST['country'],
            'city' => $_POST['city'],
            'pass' => password_hash($pass1, PASSWORD_DEFAULT),
            'info' => $info,
            'cv' => $cv,
            'pp' => $pp,
            'phone' => $phone,
            'title' => $title,
            'exp_lvl' => $exp_lvl,
            'exp_years' => $exp_years,
            'gender' => $gender,
            'token' => md5(uniqid() . rand(1000000, 9999999))
        ];

        $this->db->query('
        INSERT INTO `applicants` 
        (`first_name`, `last_name`, `birthdate`, `email`, `country_id`, `city_id`, `password`, `bio`, `cv`, `picture`, `phone`, `title`, `experience`, `exp_years`, `gender`, `token`) 
        VALUES 
        (:fname , :lname , :b_date , :email , :country , :city ,:pass , :info,:cv , :pp , :phone , :title,:exp_lvl,:exp_years,:gender,:token)', $data);
        $applicantId = $this->db->lastInsertId();
        foreach ($skills as $skill) {
            $skills_data = [
                'applicant_id' => $applicantId,
                'skill_id' => $skill['id']
            ];
            $this->db->query('
            INSERT INTO `applicants_skills` (applicant_id , skill_id ) values ( :applicant_id , :skill_id)'
                ,
                $skills_data
            );
        }
        session_start();
        $_SESSION['message'] = 'You signed up successfully, now log in';
        header("Location:login");
        exit;
    }


}


