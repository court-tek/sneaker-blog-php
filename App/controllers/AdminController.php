<?php

namespace App\Controllers;

use Framework\Database;
use Framework\Validation;

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

        // inspectAndDie($home);
        loadView('admin/index');
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

    /**
     * Save data to the database
     * 
     * @return void
     */
    public function create()
    { 
        
        $allowedFields = $allowedFields = ['title', 'content', 'img_url', 'featured', 'category_id', 'author'];

        $newArticleData = array_intersect_key($_POST, array_flip($allowedFields));

        $newArticleData['user_id'] = 1;                     

        $newArticleData = array_map('sanitize', $newArticleData);

        $requiredFields = ['title', 'content', 'img_url', 'category_id', 'author'];

        $errors = [];

        foreach ($requiredFields as $field) {
            if (empty($newArticleData[$field]) || !Validation::string($newArticleData[$field])) {
                $errors[$field] = ucfirst($field) . ' is required';
            }
        }
        
        if (!empty($errors)) {
            // Reload with errors
            loadView('admin/new', [
                'errors' => $errors,
                'listing' => $newArticleData
            ]);
        } else {
            // Submit data
           $fields = [];
           
            foreach ($newArticleData as $field => $value) {
                $fields[] = $field;
            }

            $fields = implode(', ',  $fields); 

            $values = [];
            
            foreach ($newArticleData as $field => $value) {
                // Convert empty strings to null
                if ($value === '') {
                    $newArticleData[$field] = null;
                }
                $values[] = ':' . $field; 
            }

            $values = implode(', ', $values);

            $query = "INSERT INTO articles ({$fields}) VALUES ({$values})";

            $this->db->query($query, $newArticleData);

            redirect('/admin/dash');
        }
    }

    /**
     * Delete a article from the database
     * 
     * @param array $params
     */
    public function destroy($params)
    {
        $id = $params['id'];

        $params = [
            'id' => $id
        ];

        $article = $this->db->query('SELECT * FROM articles WHERE id = :id', $params)->fetch();

        if (!$article) {
            ErrorController::notFound('Article Not Found');
            return;
        }

        $this->db->query('DELETE FROM articles WHERE id = :id', $params); 
        
        // Set flash message
        $_SESSION['success_message'] = 'Article deleted successfully';
        redirect('/admin/dash');
    }

    /**
     * Show the articles edit form
     * 
     * @param array $params 
     * @return void
     */
    public function edit($params)
    {
        $id = $params['id'] ?? '';

        $params = [
            'id' => $id
        ];

        $article = $this->db->query('SELECT * FROM articles where id = :id', $params)->fetch();

        if (!$article) {
            ErrorController::notFound('Article Not Found');
            return;
        }

        loadView('article/edit', ['article' => $article]);
    }

    /**
     * Update a listing
     * 
     * @param array $params 
     * @return void
     */
    public function update($params)
    {
        $id = $params['id'] ?? '';

        $params = [
            'id' => $id
        ];

        $article = $this->db->query('SELECT * FROM articles where id = :id', $params)->fetch();

        if (!$article) {
            ErrorController::notFound('Listing Not Found');
            return;
        }

         $allowedFields = ['title', 'content', 'image_url', 'featured', 'category_id', 'author'];

         $updateValues = [];

         $updateValues = array_intersect_key($_POST, array_flip($allowedFields));

         $updateValues = array_map('sanitize', $updateValues); 

         $requiredFields = ['title', 'image_url', 'author'];

         $errors = [];

         foreach ($requiredFields as $field) {
            if (empty($updateValues[$field]) || !Validation::string($updateValues[$field])) {
                $errors[$field] = ucfirst($field) . ' is required';
            }
        }

        if (!empty($errors)) {
            // Reload with errors
            loadView('admin/edit', [
                'article' => $article, 
                'errors' => $errors,
            ]);
            exit;
        } else {
            // Submit to the database
            $updateFields = [];

            foreach(array_keys($updateValues) as $field) {
                $updateFields[] = "{$field} = :{$field}";
            }

            $updateFields = implode(', ', $updateFields);

            $updateQuery = "UPDATE listings SET $updateFields WHERE id = :id";

            $updateValues['id'] = $id;

            $this->db->query($updateQuery, $updateValues);

            $_SESSION['success_message'] = 'Article Updated';



            redirect('/admin/' . $id);



            inspectAndDie($updateQuery);
        }
        // loadView('listings/edit', ['listing' => $listing]); 
    }
}