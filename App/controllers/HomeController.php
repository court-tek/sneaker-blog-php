<?php

namespace App\Controllers;

use Framework\Database;

class HomeController
{
    protected $db;
    
    /**
     * This is the construct function
     * 
     * @return void
     */
    public function __construct()
    {
        // Allows you to access the database with $db;
        $config = require basePath('../config/db.php');
        $this->db = new Database($config);
    }

    /**
     * This is the main index route of the Home Controller
     * 
     * @return void
     */
    public function index()
    {
        $home = [
            'greeting' => 'Welcome to the 🐘 PHP MVC'
        ];

        // inspectAndDie($home);

        loadView('home/home', [ 'home' => $home ]);
    }
}