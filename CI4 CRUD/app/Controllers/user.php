<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class User extends Controller
{
    public function index()
    {
        $userModel = new UserModel();
        $data = ['users' => $userModel->findAll()];
        return view('list', $data);
    }

    public function create()
    {
        helper(['form']);
        $validation = \Config\Services::validation();

        if ($this->request->getMethod() === 'post') {
            // Set validation rules
            $rules = [
                'name'  => 'required|min_length[3]|max_length[50]',
                'email' => 'required|valid_email'
            ];

            if ($this->validate($rules)) {
                // Validation passed, process the form data (save to database, etc.)
                $userModel = new UserModel();
                $formData = [
                    'name'  => $this->request->getPost('name'),
                    'email' => $this->request->getPost('email'),
                ];

                // Insert data into the 'users' table
                $userModel->insert($formData);

                return redirect()->to('/user/index'); // Redirect to a success page
            }
        }

        // Validation failed or initial page load, load the form view
        return view('create', ['validation' => $validation]);
    }

    public function success()
    {
        return "Form submitted successfully!";
    }

    public function edit($user_id)
    {
        $db = \Config\Database::connect();

        // Load the user data
        $user = $db->table('users')->where('user_id', $user_id)->get()->getRow();

        if (!$user) {
            // Handle the case when the user is not found
            return "User not found";
        }

        // Render the 'edit' view with user data
        return view('edit', ['user' =>(array) $user]);
    }

    public function update($user_id)
    {
        $db = \Config\Database::connect();

        // Validate form data
        $rules = [
            'name'  => 'required|min_length[3]|max_length[50]',
            'email' => 'required|valid_email',
        ];

        $validation = \Config\Services::validation(); // Get the validation service

        if ($this->validate($rules)) {
            // Form data is valid, update the user in the database
            $data = [
                'name'  => $this->request->getPost('name'),
                'email' => $this->request->getPost('email'),
            ];

           
            $db->table('users')->where('user_id', $user_id)->update($data);  // Update the user in the database
            session()->setFlashdata('success', 'Record updated successfully');
            
            return redirect()->to(base_url('user/index'));
        } else {
            // Validation failed, reload the edit view with validation errors
            $user = $db->table('users')->where('user_id', $user_id)->get()->getRow();
            return view('edit', ['user' => $user, 'validation' => $this->validator]);
        }
    }
     public function delete($user_id)
    {
        $db = \Config\Database::connect();
        $user = $db->table('users')->where('user_id', $user_id)->get()->getRow();

        if (!$user) {
            // Handle the case when the user is not found
            return "User not found";
        }

        // Delete the user from the database
        $db->table('users')->where('user_id', $user_id)->delete();

        // Set a flash message to indicate the successful delete
        session()->setFlashdata('success', 'Record deleted successfully');

        // Redirect to index page or display a success message
        return redirect()->to(base_url('user/index'));
    }
}
