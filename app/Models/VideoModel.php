<?php

namespace App\Models;
use CodeIgniter\Model;

class VideoModel extends Model
{
    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }
    
    public function get_user_valid_course_plan_list($id)
    {
        $sql='SELECT ucpm.id,ucpm.user_id,ucpm.course_id,c.name as course_name,ucpm.plan_id,p.name as plan_name,ucpm.start,ucpm.end,ucpm.status FROM user_course_plan_mapping as ucpm
        LEFT JOIN courses as c ON c.id=ucpm.course_id
        LEFT JOIN plans as p ON p.id=ucpm.plan_id
        WHERE ucpm.user_id='.$id.' AND ucpm.start<=NOW() AND ucpm.end>=NOW()';
        $query = $this->db->query($sql);
        $result = $query->getResultArray();
        return $result;
    }

    public function get_video_based_course($course_id)
    {
        $result = array();
        try {
            $sql='SELECT v.id,v.url,v.title FROM course_video_mapping as cvm
            RIGHT JOIN videos as v ON (v.id=cvm.video_id AND v.status=1)
            WHERE cvm.course_id='.$course_id.'';
            $query = $this->db->query($sql);
            $result = $query->getResultArray();
        } catch (\Throwable $e) {
            log_message('error',$e->getMessage());
        }
        return $result;

    }
    
}