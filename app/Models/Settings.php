<?php

namespace App\Models;
use CodeIgniter\Model;

class Settings extends Model
{
    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }
    
    public function get_all_settings()
    {
        $query = $this->db->query('SELECT * FROM settings');
        $result = $query->getResultArray();
        return $result;
    }

    public function get_settings_single_row($name=null)
    {
        $query = $this->db->query('SELECT * FROM settings WHERE name="'.$name.'"');
        $result = $query->getRowArray();
        // echo $this->db->lastQuery;die();
        return $result;
    }
}