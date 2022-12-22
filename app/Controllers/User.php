<?php

namespace App\Controllers;

use App\Models\Common;
use App\Models\Settings;
use DateTime;

class User extends BaseController
{
    protected $settings;
    protected $common;
    public function __construct()
    {
        $this->session = session();
        $this->settings = new Settings();
        $this->common = new Common();
    }

    public function index()
    {
        if(checkSession()){
            return redirect()->to("dashboard");
        }else{
            $data=array();
            $data['page']="login";
            return view(OSN_VIEWPATH.'/login',$data);
        }
    }
    
    public function userLogin()
    {
        $form_type = $this->request->getVar('form_type');
        if($form_type=='User_Login_Form'){
            $username = $this->request->getVar('username');
            $password = $this->request->getVar('password');
            // echo '<pre>';var_dump($username);die;
            if(empty($username)||empty($password)){
                $result = array('status'=>false,'message'=>'All fields are required!');
                return json_encode($result);
            }else{
                $user_exit = $this->userValidate($username,$password);
                if($user_exit){
                    $result = array('status'=>true,'message'=>'You are successfully logged in!');
                    return json_encode($result);
                }else{
                    $result = array('status'=>false,'message'=>'Please try again!');
                    return json_encode($result);
                }
            }

        }
        $result = array('status'=>false,'message'=>'Invalid request!');
        return json_encode($result);
    }

    private function userValidate($username,$password)
    {
        $user_data = $this->common->get_user_login($username,md5($password));
        // echo '<pre>';var_dump($user_data);die;
        if(isset($user_data) && !empty($user_data) && $user_data["username"]==$username){
            $usersession = array(
                'id'=>$user_data['id'],
                'isLoggedIn'=>true
            );
            $this->session->set("usersession",$usersession);
            return true;
        }else{
            return false;
        }
    }

    public function logout()
    {
        $this->session->destroy();
        return redirect()->to('/');
    }

    public function dashboard()
    {
        // echo "<pre>";print_r(session("usersession"));
        if(!checkSession()){
            return redirect()->to("login"); 
        }else{
            $data=array();
            $data['page']="dashboard";
            return view(OSN_VIEWPATH.'/dashboard',$data);
        }
    }
}
