<?php

namespace App\Controllers;

use Framework\Database;
use PDO;
use Exception;

// require __DIR__ . '/vendor/autoload.php';
// require '/../..helpers.php';

class ApplyController
{

    protected $db;

    public function __construct()
    {
      $config = require basePath('config/db.php');
      $this->db = new Database($config);
    }
    
    public function index()
    {
        view('apply');
    }

    public function send_applied_job()
    {

        $allowedFields = ['applicant_id','job_id','reason'];
        $nweAppliedData = array_intersect_key($_POST, array_flip($allowedFields));
        
         // $nweAppliedData['applicant_id']=3 ;

        $nweAppliedData = array_map('sanitize',$nweAppliedData);


        $requiredFields = ['applicant_id','job_id','reason'];

    $errors = [];

    foreach ($requiredFields as $field) {
      if (empty($nweAppliedData[$field])) {
        $errors[$field] = ucfirst($field) . ' is required';
      }
    }

    if (!empty($errors)) {
      // Reload view with errors
      view('apply', [
        'errors' => $errors,
        'apply' => $nweAppliedData
      ]);

    }
      else {
        $fields = [];

        foreach ($nweAppliedData as $field => $value) {
          $fields[] = $field;
        }
  
        $fields = implode(', ', $fields); 
    
        $values = [];

        foreach ($nweAppliedData as $field => $value) {
          // Convert empty strings to null
          if ($value === '') {
            $nweAppliedData[$field] = null;
          }
          $values[] = ':' . $field;
        }
  
        $values = implode(', ', $values);
  
        $query = "INSERT INTO applies ({$fields}) VALUES ({$values})";
  
        $this->db->query($query, $nweAppliedData);
  
        // Session::setFlashMessage('success_message', 'Listing created successfully');
        view('apply');
    }
    



   

    //     $status = 'pending';
    //     $reason = 'like like like';
    //     $applicant_id = 1;
    //     $job_id = 2;
    
    //     try {
    //         $query = "INSERT INTO applies (applicant_id, job_id, status, reason) VALUES (?, ?, ?, ?)";
    //         $this->db->query($query, [$applicant_id, $job_id, $status, $reason]);
    //         $lastInsertedId = $this->db->connection->lastInsertId();
    //         return "Applied job saved successfully with ID: $lastInsertedId";
    //     } catch (\Exception $e) {
    //         return "An error occurred: " . $e->getMessage();
    //     }
    }
    
}
