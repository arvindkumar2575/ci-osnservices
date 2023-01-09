<?php

namespace App\Models;
use CodeIgniter\Model;

class VideoModel extends Model
{
    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }
    
    public function get_course_based_video_list()
    {
        $sql='SELECT c.id as course_id,c.name as course_name,c.description as course_description,v.id as video_id,v.url,v.title,v.description FROM videos as v LEFT JOIN course as c on v.course_id=c.id';
        $query = $this->db->query($sql);
        $result = $query->getResultArray();
        return $result;
    }

    public function get_course_list()
    {
        $sql='SELECT * FROM course';
        $query = $this->db->query($sql);
        $result = $query->getResultArray();
        return $result;
    }

    public function get_video_list($course_id)
    {
        $sql='SELECT * FROM videos WHERE course_id='.$course_id.'';
        $query = $this->db->query($sql);
        $result = $query->getResultArray();
        return $result;
    }

}