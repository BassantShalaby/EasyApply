<?php

namespace App\Controllers;

class HomeController
{
    public function index()
    {
        view('home');
    }
    public function Organization()
    {
        view('organization');
    }
}