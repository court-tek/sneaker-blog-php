<?php

namespace App\Controllers;

use Framework\Database;

class AdminController
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
        
        // retrieve all items
        $articles = $this->db->query('SELECT * FROM articles')->fetchAll();

        loadView('listings/index', [
            'listings' => $articles,
        ]);

        // inspectAndDie($home);

        loadView('articles/index', [ 'articles' => $articles ]);
        // inspectAndDie($home);

        loadView('admin/index', [ 'articles' => $articles ]);
    }

    /**
     * Displays the form to add a new listing
     * 
     * @return void
     */
    public function new()
    {
        loadView('admin/new');
    }
}