<?php

namespace App\Models;
use CodeIgniter\Model;

class Settings extends Model
{
    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }
    
    public function settings()
    {
        $query = $this->db->query('SELECT * FROM settings');
        $result = $query->getResultArray();
        return $result;
    }
}