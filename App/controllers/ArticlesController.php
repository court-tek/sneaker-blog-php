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
        // $articles = [
        //     [
        //         'title' => 'First Post',
        //         'content' => "This is the first post",
        //         'date' => 'Febuary 17, 2024',
        //         'image' => "https://raw.githubusercontent.com/court-tek/sneaker-blog-php/main/public/images/adidasstop.avif",
        //         'featured' => false
            
        //     ],           
        //     [
        //         'title' => 'Second Post',
        //         'content' => "This is the second post",
        //         'date' => 'Febuary 17, 2024',
        //         'image' => "https://raw.githubusercontent.com/court-tek/sneaker-blog-php/main/public/images/adidasstop.avif",
        //         'featured' => true
            
        //     ],          
        //     [
        //         'title' => 'Third Post',
        //         'content' => "This is the third post",
        //         'date' => 'Febuary 17, 2024',
        //         'image' => "https://raw.githubusercontent.com/court-tek/sneaker-blog-php/main/public/images/adidasstop.avif",
        //         'featured' => false
            
        //     ],          
        //     [
        //         'title' => 'Fourth Post',
        //         'content' => "This is the fourth post",
        //         'date' => 'Febuary 17, 2024',
        //         'image' => "https://raw.githubusercontent.com/court-tek/sneaker-blog-php/main/public/images/adidasstop.avif",
        //         'featured' => false
            
        //     ],          
        // ];

        // retrieve all items
        $articles = $this->db->query('SELECT * FROM articles')->fetchAll();

        loadView('listings/index', [
            'listings' => $articles,
        ]);

        // inspectAndDie($home);

        loadView('articles/index', [ 'articles' => $articles ]);
    }

    /**
     * Display a single listing
     * 
     * @param array $params
     * @return void
     */
    public function show($params)
    {

        $id = $params['id'] ?? '';

        $params = [
            'id' => $id
        ];

        $listing = $this->db->query('SELECT * FROM listings where id = :id', $params)->fetch();

        if (!$listing) {
            ErrorController::notFound('Listing Not Found');
            return;
        }

        loadView('listings/show', [
            'listing' => $listing,
        ]);
    }
}