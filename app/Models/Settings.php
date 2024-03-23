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
        $query = $this->db->query('SELECT id,setting_type,name,display_name FROM settings');
        $result = $query->getResultArray();
        return $result;
    }

    public function get_page_settings($name=null)
    {
        $query = $this->db->query('SELECT * FROM settings WHERE setting_type="page" AND name="'.$name.'"');
        $result = $query->getRowArray();
        return $result;
    }

    public function get_settings_single_row($key=null,$value=null)
    {
        $query = $this->db->query('SELECT * FROM settings WHERE '.$key.'="'.$value.'"');
        $result = $query->getRowArray();
        // echo $this->db->lastQuery;die();
        return $result;
    }
}