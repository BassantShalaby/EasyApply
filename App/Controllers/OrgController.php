<?php
namespace App\Controllers;

use Framework\Database;
use Framework\Validation;

class OrgController
{


    protected $db;


    public function __construct()
    {
        $config = require basePath('config/db.php');
        $this->db = new Database($config);
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

        $industries = $this->db->query('SELECT id, name FROM categories')->fetchAll();
        $industriesSelect = '<select class="form-select" name="industry" id="industries">';
        $industriesSelect .= '<option selected disabled>Choose an industry</option>';
        foreach ($industries as $industry) { // Use singular variable name $industry
            $industriesSelect .= "<option value='" . $industry['name'] . "'>" . $industry['name'] . "</option>"; // Corrected variable names
        }
        $industriesSelect .= "</select>";
        View('auth/org-create', [
            'countries' => $countriesSelect,
            'cities' => $citiesSelect,
            'industries' => $industriesSelect,
            'name' => ''

        ]);






    }
    function Store()
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $pass1 = $_POST['pass1'];
        $pass2 = $_POST['pass2'];
        $phone = $_POST['phone'];
        $info = $_POST['info'];
        $link = $_POST['link'];
        $logo = $_FILES['logo'];

        if (isset($_POST['country'])) {
            $country = $_POST['country'];
        }
        if (isset($_POST['city'])) {
            $city = $_POST['city'];
        }
        if (isset($_POST['industry'])) {
            $industry = $_POST['industry'];
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

        $industries = $this->db->query('SELECT id, name FROM categories')->fetchAll();
        ;
        $industriesSelect = '<select class="form-select" name="industry" id="industries">';
        $industriesSelect .= '<option selected disabled>Choose an industry</option>';
        foreach ($industries as $industry) {
            if (isset($_POST['industry']) && $industry['name'] == $_POST['industry']) {
                $selected = 'selected';
            } else {
                $selected = '';

            }
            $industriesSelect .= "<option value='" . $industry['name'] . "' " . $selected . ">" . $industry['name'] . "</option>";
        }
        $industriesSelect .= "</select>";



        $errors = [];
        if (!Validation::string($name) && empty($errors)) {
            $errors[] = 'Organization name is required';
        }

        if (!preg_match('/^[a-zA-Z\s.]+$/', $name) && empty($errors)) {
            $errors[] = "Organization name can only contain letters, spaces, and periods.";
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
            $errors[] = 'Organization phone is required';
        }
        if (!preg_match('/^\+\d{1,3}\d{11}$/', $phone) && empty($errors)) {
            $errors[] = "Phone number should start with a plus sign (+) followed by the country code and the phone number (e.g., +201227860498)";
        }
        if (!Validation::string($info) && empty($errors)) {
            $errors[] = 'Organization information is required';
        }
        if (!Validation::string($info, 100, 255) && empty($errors)) {
            $errors[] = "Organization info must be between 100 and 255 characters long.";
        }
        if (!Validation::string($link) && empty($errors)) {
            $errors[] = 'Organization website or linkedin account are required';
        }
        if (!preg_match('/^.{100,255}$/', $info) && empty($errors)) {
            $errors[] = "Organization info must be between 100 and 255 characters long.";
        }
        if (!Validation::string($link) && empty($errors)) {
            $errors[] = 'Organization website or linkedin account are required';
        }
        if (!isset($_POST['country']) && empty($errors)) {
            $errors[] = 'Country is required';
        }
        if (empty($_POST['city']) && empty($errors)) {
            $errors[] = 'City is required';
        }
        if (empty($_POST['industry']) && empty($errors)) {
            $errors[] = 'Organization industry is required';
        }
        // Check if a file is uploaded
        if (isset($_FILES['logo']) && $_FILES['logo']['error'] === UPLOAD_ERR_OK) {
            $file_name = $_FILES['logo']['name'];
            $file_tmp = $_FILES['logo']['tmp_name'];
            $file_type = $_FILES['logo']['type'];

            // Check if the uploaded file is an image
            $allowed_types = array('image/jpeg', 'image/png', 'image/gif');
            if (in_array($file_type, $allowed_types)) {
                // Move the uploaded file to a designated folder on the server
                $upload_dir = 'uploads/';
                $destination = $upload_dir . $file_name;
                move_uploaded_file($file_tmp, $destination);

                // Store the file's name (or path) in your database
                $logo = $destination;

            } else {
                $errors[] = "Only JPEG, PNG, and GIF logos are allowed.";
            }
        } else {
            if (empty($errors)) {
                $errors[] = "Logo is required.";
            }

        }


        if (!empty($errors)) {
            view('auth/org-create', [
                'errors' => $errors,
                'name' => $name,
                'email' => $email,
                'info' => $info,
                'pass1' => $pass1,
                'pass2' => $pass2,
                'phone' => $phone,
                'link' => $link,
                'countries' => $countriesSelect,
                'cities' => $citiesSelect,
                'industries' => $industriesSelect
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
            view('auth/org-create', [
                'errors' => $errors,
                'name' => $name,
                'email' => $email,
                'info' => $info,
                'pass1' => $pass1,
                'pass2' => $pass2,
                'phone' => $phone,
                'link' => $link,
                'countries' => $countriesSelect,
                'cities' => $citiesSelect,
                'industries' => $industriesSelect
            ]);
            exit;
        }

        $data = [
            'name' => $name,
            'email' => $email,
            'password' => password_hash($pass1, PASSWORD_DEFAULT),
            'phone' => $phone,
            'link' => $link,
            'info' => $info,
            'country' => $_POST['country'],
            'city' => $_POST['city'],
            'industry' => $_POST['industry'],
            'logo' => $logo,
            'token' => md5(uniqid() . rand(1000000, 9999999))
        ];

        // Assuming `country_id` and `city_id` are the correct column names in your database
        $this->db->query('INSERT INTO `organizations` (`name`, `email`, `password`, `phone`, `link`, `country_id`, `city_id`, `industry`, `logo`, `info`,`token`, `created_at`, `updated_at`) VALUES (:name, :email, :password, :phone, :link, :country, :city, :industry, :logo, :info, :token,current_timestamp(), current_timestamp())', $data);
        session_start();
        $_SESSION['message'] = 'You signed up successfully, now log in';
        header("Location:login");
        exit;

    }


}