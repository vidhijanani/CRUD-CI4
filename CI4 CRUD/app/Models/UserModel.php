<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users'; // Replace 'user' with your actual database table name
    protected $primaryKey = 'user_id';
    protected $allowedFields = ['name', 'email']; // Fields that can be filled during insertion

    public function All()
    {
        $db = \Config\Database::connect();

        $query = $db->query('SELECT * FROM users');
        return $query->getResultArray();  // SELECT * from users
    }
    public function getUser($user_id)
    {
        $result = $this->find($user_id);

        // Convert the object to an array
        if ($result) {
            return (array) $result;
        } else {
            return null;
        }
    }
    public function updateUser($user_id, $data)
    {
        $this->where('user_id', $user_id)->set($data)->update();
    }
}
