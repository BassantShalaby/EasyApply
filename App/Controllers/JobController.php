<?php

namespace App\Controllers;

class JobController
{
    public function index()
    {
        view('jobs/index');
    }
    public function create()
    {
        view('jobs/create');
    }
}