<?php
namespace App\Controllers;

use Framework\Database;
use Framework\Validation;
use Framework\Session;

class LoginController
{
    protected $db;
    public function __construct()
    {
        $config = require basePath('config/db.php');
        $this->db = new Database($config);


    }
    function Index()
    {
        view('auth/login');
    }

    function Login()
    {
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $errors = [];

        if (!Validation::string($email) && empty($errors)) {
            $errors[] = 'Email is required';
        }
        if (!Validation::email($email) && empty($errors)) {
            $errors[] = 'Please enter a valid email address';
        }
        if (!Validation::string($pass, 8, 50) && empty($errors)) {
            $errors[] = 'Password must be at least 8 charachters';
        }
        if (!empty($errors)) {
            view('auth/login', [
                'errors' => $errors,
                'email' => $email,
                'pass' => $pass,
            ]);
            exit;
        }
        $params = [
            'email' => $email
        ];

        $org = $this->db->query('select * from organizations where email = :email', $params)->fetch();
        $applicant = $this->db->query('select * from applicants where email = :email', $params)->fetch();
        if (!$org && !$applicant) {
            dump($org);
            dd($applicant);
            $errors[] = "ًWrong email or passwordddd";
            view('auth/login', [
                'errors' => $errors,
                'email' => $email,
                'pass' => $pass,
            ]);
            exit;
        }
        
        if (($org || $applicant) && !password_verify($pass, $org['password'])) {
            $errors[] = "ًWrong email or password";
            view('auth/login', [
                'errors' => $errors,
                'email' => $email,
                'pass' => $pass,
            ]);
            exit;
        }

        if ($org && password_verify($pass, $org['password'])) {
            session_start();
            Session::set('token' , $org->token);
            Session::set('id' , $org->id);
            Session::set('account' , 'organization');
            header('Location:/home/organization');
            exit;
        }
        // if ($org && !password_verify($pass, $org['password'])) {
        //     session_start();
        //     Session::set('token' , $org->token);
        //     Session::set('id' , $org->id);
        //     Session::set('account' , 'organization');
        //     header('Location:/home/organization');
        //     exit;
        // }



        //  else {

        //     }
        //  }

    }
}