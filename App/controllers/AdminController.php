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

    /**
     * Save data to the database
     * 
     * @return void
     */
    public function create()
    { 
        $allowedFields = ['title', 'description', 'salary', 'tags', 'company', 'address', 'city', 'state', 'phone', 'email', 'requirements', 'benefits', 'work_environment'];

        $newListingData = array_intersect_key($_POST, array_flip($allowedFields));

        $newListingData['user_id'] = 1;                     

        $newListingData = array_map('sanitize', $newListingData);

        $requiredFields = ['title', 'description', 'email', 'city', 'state', 'salary'];

        $errors = [];

        foreach ($requiredFields as $field) {
            if (empty($newListingData[$field]) || !Validation::string($newListingData[$field])) {
                $errors[$field] = ucfirst($field) . ' is required';
            }
        }
        
        if (!empty($errors)) {
            // Reload with errors
            loadView('listings/new', [
                'errors' => $errors,
                'listing' => $newListingData
            ]);
        } else {
            // Submit data
           $fields = [];
           
            foreach ($newListingData as $field => $value) {
                $fields[] = $field;
            }

            $fields = implode(', ',  $fields); 

            $values = [];
            
            foreach ($newListingData as $field => $value) {
                // Convert empty strings to null
                if ($value === '') {
                    $newListingData[$field] = null;
                }
                $values[] = ':' . $field; 
            }

            $values = implode(', ', $values);

            $query = "INSERT INTO listings ({$fields}) VALUES ({$values})";

            $this->db->query($query, $newListingData);

            redirect('/listings');
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

        $listing = $this->db->query('SELECT * FROM listings WHERE id = :id', $params)->fetch();

        if (!$listing) {
            ErrorController::notFound('Listing Not Found');
            return;
        }

        $this->db->query('DELETE FROM listings WHERE id = :id', $params); 
        
        // Set flash message
        $_SESSION['success_message'] = 'Listing deleted successfully';
        redirect('/listings');
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

        $listing = $this->db->query('SELECT * FROM listings where id = :id', $params)->fetch();

        if (!$listing) {
            ErrorController::notFound('Listing Not Found');
            return;
        }

        loadView('listings/edit', ['listing' => $listing]);
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

        $listing = $this->db->query('SELECT * FROM listings where id = :id', $params)->fetch();

        if (!$listing) {
            ErrorController::notFound('Listing Not Found');
            return;
        }

         $allowedFields = ['title', 'description', 'salary', 'tags', 'company', 'address', 'city', 'state', 'phone', 'email', 'requirements', 'benefits', 'work_environment'];

         $updateValues = [];

         $updateValues = array_intersect_key($_POST, array_flip($allowedFields));

         $updateValues = array_map('sanitize', $updateValues); 

         $requiredFields = ['title', 'description', 'email', 'city', 'state', 'salary'];

         $errors = [];

         foreach ($requiredFields as $field) {
            if (empty($updateValues[$field]) || !Validation::string($updateValues[$field])) {
                $errors[$field] = ucfirst($field) . ' is required';
            }
        }

        if (!empty($errors)) {
            // Reload with errors
            loadView('listings/edit', [
                'listing' => $listing, 
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

            $_SESSION['success_message'] = 'Listing Updated';



            redirect('/listing/' . $id);



            inspectAndDie($updateQuery);
        }
        // loadView('listings/edit', ['listing' => $listing]); 
    }
}