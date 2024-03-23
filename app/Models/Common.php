<?php 
namespace App\Models;
use CodeIgniter\Model;
class Common extends Model
{
    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function data_insert_batch($table=null, array $data=null)
    {
        $rows=false;
        if(isset($table)){
            $rows = $this->db->table($table)->insertBatch($data);
            return $rows;
        }else{
            return $rows;
        }
        
    }

    public function data_insert($table=null, array $data=null)
    {
        $query=false;
        if(isset($table)){
            $query = $this->db->table($table)->insert($data);
            $id = $this->db->insertID();
            // echo $this->db->lastQuery;die();
            return $id;
        }else{
            return $query;
        }
        
    }

    public function data_update($table=null, array $where=array(), array $data=array())
    {
        $query=false;
        if(isset($table)){
            $query = $this->db->table($table)->update($data,$where);
            // echo $this->db->lastQuery;die();
        }
        return $query;
        
    }

    public function data_delete($table=null, array $where=array())
    {
        $query=false;
        if(isset($table)){
            $query = $this->db->table($table)->delete($where);
            // echo $this->db->lastQuery;die();
        }
        return $query;
        
    }

    public function data_single_update($table=null, $key=null, $value=null, $data=array())
    {
        $update=null;
        if(isset($table)){
            $builder = $this->db->table($table);
            $builder->where($key,$value);
            $update=$builder->update($data);
            // echo $this->db->lastQuery;die();
        }
        return $update;
    }

    public function get_single_row($table=null, $key=null, $value=null)
    {
        $result=null;
        if(isset($table)){
            $query = $this->db->table($table)->where($key,$value)->get();
            $result = $query->getRowArray();
            // echo $this->db->lastQuery;die();
        }
        return $result;
    }

    public function get_multiple_row($table=null, $where=array())
    {
        $result=null;
        if(isset($table)){
            $query = $this->db->table($table)->where($where)->get();
            $result = $query->getResultArray();
            // echo $this->db->lastQuery;die();
        }
        return $result;
    }

    public function get_data($table=null, $where=array(), $type='single')
    {
        $result=null;
        if(isset($table)){
            $query = $this->db->table($table)->where($where)->get();
            if($type=='single'){
                $result = $query->getRowArray();
            }else{
                $result = $query->getResultArray();
            }
        }
        return $result;
    }

    public function get_user_login($username=null, $password=null)
    {
        $result=null;
        if(isset($username) && isset($password)){
            $qry = 'SELECT * FROM users WHERE username="'.$username.'" AND password="'.$password.'"';
            // echo $qry;die;
            $query = $this->db->query($qry);
            $result = $query->getRowArray();
            // echo $this->db->lastQuery;die();
            // echo"<pre>"; var_dump($result);die();
        }
        return $result;
    }




    



    public function getCourses()
    {
        $result=null;
        try {
            $qry = 'SELECT c.id as course_id,c.url as course_url,c.name as course_name,c.description as course_description,c.status as course_status FROM courses as c ORDER BY c.id ASC';
            $query = $this->db->query($qry);
            $result = $query->getResultArray();
            return $result;
        } catch (\Exception $e) {
            log_message('error',$e->getMessage());
        }
        return $result;
    }

    public function getPlans()
    {
        $result=null;
        try {
            $qry = 'SELECT p.id as plan_id,p.name as plan_name,p.description as plan_description,p.price as plan_price,p.discount as plan_discount,p.status as plan_status,p.duration as plan_duration FROM plans as p ORDER BY p.id ASC';
            $query = $this->db->query($qry);
            $result = $query->getResultArray();
            // echo $this->db->lastQuery;die();
            return $result;
        } catch (\Exception $e) {
            log_message('error',$e->getMessage());
        }
        return $result;
    }












    public function getUserCourses($id=null)
    {
        $result=null;
        try {
            if($id){
                $qry = 'SELECT 
                c.id as course_id,
                c.name as course_name,
                c.description as course_description,
                c.url as course_url,
                p.id as plan_id,
                p.name as plan_name,
                p.description as plan_description,
                p.price as plan_price,
                p.discount as plan_discount,
                p.duration as plan_duration,
                ucpm.start,
                ucpm.end,
                ucpm.status,
                NOW()<=ucpm.end as lock_status 
                FROM plans as p
                LEFT JOIN user_course_plan_mapping as ucpm ON ucpm.plan_id=p.id
                LEFT JOIN courses as c ON c.id=ucpm.course_id
                WHERE ucpm.user_id='.$id.' AND p.status=1';
                $query = $this->db->query($qry);
                $result = $query->getResultArray();
                // echo $this->db->lastQuery;die;
            }
            return $result;
        } catch (\Exception $e) {
            log_message('error',$e->getMessage());
        }
        return $result;
    }









    public function getUserCoursePlanStatus($user_id,$course_id,$plan_id)
    {
        $result=null;
        try {
            if($user_id && $course_id && $plan_id){
                $qry = 'SELECT id FROM user_course_plan_mapping
                WHERE user_id='.$user_id.' AND course_id='.$course_id.' AND plan_id='.$plan_id.' AND start<=NOW() AND end>=NOW() AND status=1';
                $query = $this->db->query($qry);
                $result = $query->getResultArray();
            }
            return $result;
        } catch (\Exception $e) {
            log_message('error',$e->getMessage());
        }
        return $result;
    }












    public function getUserDetails($id=null)
    {
        $result = null;
        try {
            if($id){
                $qry = 'SELECT id,user_type,username,first_name,last_name FROM users WHERE id='.$id.'
                ORDER BY id ASC';
                $query = $this->db->query($qry);
                $result = $query->getRowArray();
            }
        } catch (\Exception $e) {
            log_message('error',$e->getMessage());
        }
        return $result;
    }

    public function getCoursePlanDetails()
    {
        $result = null;
        try {
            $qry = 'SELECT c.id as course_id,c.name as course_name,c.description as course_description,c.status as course_status,p.id as plan_id,c.url as url,p.name as plan_name,p.description as plan_description,p.price as plan_price,p.discount as plan_discount,p.duration as plan_duration,p.status as plan_status FROM course_plan_mapping as cpm
            LEFT JOIN courses as c ON c.id=cpm.course_id
            LEFT JOIN plans as p ON p.id=cpm.plan_id
            WHERE c.status=1 AND p.status=1
            ORDER BY c.id ASC,p.id ASC';
            $query = $this->db->query($qry);
            $result = $query->getResultArray();
        } catch (\Exception $e) {
            log_message('error',$e->getMessage());
        }
        return $result;
    }

    public function getUserCoursePlanDetails()
    {
        $result = null;
        try {
            $qry = 'SELECT ucpm.id as ucpm_id,u.id as user_id,u.username as username,CONCAT (u.first_name," ",u.last_name) as name,c.id as course_id,c.name as course_name,p.id as plan_id,p.name as plan_name,ucpm.start as start_date,ucpm.end as end_date,ucpm.status as ucpm_status FROM user_course_plan_mapping as ucpm
            LEFT JOIN users as u ON u.id=ucpm.user_id
            LEFT JOIN courses as c ON c.id=ucpm.course_id
            LEFT JOIN plans as p ON p.id=ucpm.plan_id
            ORDER BY ucpm.user_id ASC';
            $query = $this->db->query($qry);
            $result = $query->getResultArray();
        } catch (\Exception $e) {
            log_message('error',$e->getMessage());
        }
        return $result;
    }

    public function getCourseVideoDetails()
    {
        $result = null;
        try {
            $qry = 'SELECT c.id as course_id,c.name as course_name,v.id as video_id,v.title as video_title FROM course_video_mapping as cvm
            LEFT JOIN courses as c ON c.id=cvm.course_id
            LEFT JOIN videos as v ON v.id=cvm.video_id
            ORDER BY cvm.course_id ASC';
            $query = $this->db->query($qry);
            $result = $query->getResultArray();
        } catch (\Exception $e) {
            log_message('error',$e->getMessage());
        }
        return $result;
    }

    public function getVideos()
    {
        $result = null;
        try {
            $qry = 'SELECT id,url,title,status FROM videos
            ORDER BY id ASC';
            $query = $this->db->query($qry);
            $result = $query->getResultArray();
        } catch (\Exception $e) {
            log_message('error',$e->getMessage());
        }
        return $result;
    }

    public function getContactFormDetails()
    {
        $result = null;
        try {
            $qry = 'SELECT * FROM contact_form
            ORDER BY id ASC';
            $query = $this->db->query($qry);
            $result = $query->getResultArray();
        } catch (\Exception $e) {
            log_message('error',$e->getMessage());
        }
        return $result;
    }

    public function getUsers()
    {
        $result = null;
        try {
            $qry = 'SELECT * FROM users
            ORDER BY id ASC';
            $query = $this->db->query($qry);
            $result = $query->getResultArray();
        } catch (\Exception $e) {
            log_message('error',$e->getMessage());
        }
        return $result;
    }

    public function checkCourseMappedAnyWhere($id)
    {
        $result=null;
        try {
            $sql = 'SELECT c.id as course_id,cpm.course_id as cpm_course_id,ucpm.course_id as upcm_course_id FROM courses as c
            LEFT JOIN course_plan_mapping as cpm ON cpm.course_id=c.id
            LEFT JOIN user_course_plan_mapping as ucpm ON ucpm.course_id=c.id
            WHERE c.id='.$id.'';
            $query = $this->db->query($sql);
            $result = $query->getRowArray();
        } catch (\Throwable $e) {
            log_message('error',$e->getMessage());
        }
        return $result;
    }

    public function checkPlanMappedAnyWhere($id)
    {
        $result=null;
        try {
            $sql = 'SELECT p.id as plan_id,cpm.plan_id as cpm_plan_id,cvm.plan_id as cvm_plan_id,ucpm.plan_id as ucpm_plan_id FROM plans as p
            LEFT JOIN course_plan_mapping as cpm ON cpm.plan_id=p.id
            LEFT JOIN course_video_mapping as cvm ON cvm.plan_id=p.id
            LEFT JOIN user_course_plan_mapping as ucpm ON ucpm.plan_id=p.id
            WHERE p.id='.$id.'';
            $query = $this->db->query($sql);
            $result = $query->getRowArray();
        } catch (\Throwable $e) {
            log_message('error',$e->getMessage());
        }
        return $result;
    }

    public function checkVideoMappedAnyWhere($id)
    {
        $result=null;
        try {
            $sql = 'SELECT v.id as video_id,pvm.video_id as pvm_video_id FROM videos as v
            LEFT JOIN plan_video_mapping as pvm ON pvm.video_id=v.id
            WHERE v.id='.$id.'';
            $query = $this->db->query($sql);
            $result = $query->getRowArray();
        } catch (\Throwable $e) {
            log_message('error',$e->getMessage());
        }
        return $result;
    }






















    public function getCoursePlanMapping()
    {
        $result=null;
        try {
            $qry = 'SELECT cpm.course_id as course_id,cpm.plan_id as plan_id FROM course_plan_mapping as cpm ORDER BY cpm.course_id ASC';
            $query = $this->db->query($qry);
            $result = $query->getResultArray();
            return $result;
        } catch (\Exception $e) {
            log_message('error',$e->getMessage());
        }
        return $result;
    }


    public function getContactDetails()
    {
        $result = null;
        try {
            $qry = 'SELECT p.id as plan_id,p.name as plan_name,v.id as video_id,v.title as video_title FROM course_video_mapping as cvm
            LEFT JOIN plans as p ON p.id=cvm.plan_id
            LEFT JOIN videos as v ON v.id=cvm.video_id
            ORDER BY cvm.plan_id ASC';
            $query = $this->db->query($qry);
            $result = $query->getResultArray();
        } catch (\Exception $e) {
            log_message('error',$e->getMessage());
        }
        return $result;
    }

    public function getMedia()
    {
        $result = null;
        try {
            $qry = 'SELECT * FROM media
            ORDER BY id ASC';
            $query = $this->db->query($qry);
            $result = $query->getResultArray();
        } catch (\Exception $e) {
            log_message('error',$e->getMessage());
        }
        return $result;
    }



    public function getSearchQuery($q)
    {
        $sql = 'SELECT id,username,first_name,last_name FROM users WHERE username LIKE "%'.$q.'%" OR CONCAT(first_name," ",last_name) LIKE "%'.$q.'%" LIMIT 5';
        $query = $this->db->query($sql);
        // echo $this->db->lastQuery;die;
        $result = $query->getResultArray();
        return $result;
    }

}