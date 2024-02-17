<?php

namespace App\Controllers;

use Framework\Database;

class ArticlesController
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
        $articles = [
            [
                'title' => 'First Post',
                'content' => "This is the first post",
                'date' => 'Febuary 17, 2024',
                'image' => "https://raw.githubusercontent.com/court-tek/sneaker-blog-php/main/public/images/adidasstop.avif"
            
            ],           
            [
                'title' => 'Second Post',
                'content' => "This is the second post",
                'date' => 'Febuary 17, 2024',
                'image' => "https://raw.githubusercontent.com/court-tek/sneaker-blog-php/main/public/images/adidasstop.avif"
            
            ],          
            [
                'title' => 'Third Post',
                'content' => "This is the third post",
                'date' => 'Febuary 17, 2024',
                'image' => "https://raw.githubusercontent.com/court-tek/sneaker-blog-php/main/public/images/adidasstop.avif"
            
            ],          
        ];

        // inspectAndDie($home);

        loadView('articles/index', [ 'articles' => $articles ]);
    }
}