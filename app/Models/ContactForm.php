<?php

namespace App\Models;
use CodeIgniter\Model;

class ContactForm extends Model
{
    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }
    
    public function contact_form()
    {
        $query = $this->db->query('SELECT * FROM settings');
        $result = $query->getResultArray();
        echo $this->db->lastQuery;die();
        return $result;
    }
}