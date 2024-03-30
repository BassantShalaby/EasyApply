<?php

namespace App\Controllers;

use Framework\Database;

class Home
{
    function index()
    {
        loadView('home');
    }
}