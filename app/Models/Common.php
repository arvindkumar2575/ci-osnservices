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
            return $id;
        }else{
            return $query;
        }
        
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
}