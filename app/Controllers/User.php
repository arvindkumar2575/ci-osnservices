<?php

namespace App\Controllers;

use App\Models\Common;
use App\Models\Settings;
use DateTime;

class User extends BaseController
{
    protected $session;
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
        if (checkSession()) {
            return redirect()->to("dashboard");
        } else {
            $data = array();
            $data['page'] = "login";
            return view(OSN_VIEWPATH . '/login', $data);
        }
    }
    public function register()
    {
        if (checkSession()) {
            return redirect()->to("dashboard");
        } else {
            $data = array();
            $data['page'] = "register";
            return view(OSN_VIEWPATH . '/register', $data);
        }
    }

    public function userLogin()
    {
        $form_type = $this->request->getVar('form_type');
        if ($form_type == 'User_Login_Form') {
            $username = $this->request->getVar('username');
            $password = $this->request->getVar('password');
            // echo '<pre>';var_dump($username);die;
            if (empty($username) || empty($password)) {
                $result = array('status' => false, 'message' => 'All fields are required!');
                return json_encode($result);
            } else {
                $user_exit = $this->userValidate($username, $password);
                if ($user_exit) {
                    $result = array('status' => true, 'message' => 'You are successfully logged in!');
                    return json_encode($result);
                } else {
                    $result = array('status' => false, 'message' => 'Please try again!');
                    return json_encode($result);
                }
            }
        }else if ($form_type == 'User_Register_Form') {
            $first_name = $this->request->getVar('first_name');
            $last_name = $this->request->getVar('last_name');
            $username = $this->request->getVar('username');
            $password = $this->request->getVar('password');
            if (empty($first_name) && empty($last_name) && empty($username) || empty($password)) {
                $result = array('status' => false, 'message' => 'All fields are required!');
                return json_encode($result);
            } else {
                $user_exit = $this->common->get_single_row('users','username',$username);
                // echo '<pre>';var_dump($first_name, $last_name, $username, $password,$user_exit);die;
                if(!$user_exit){
                    $user_id = $this->userRegister($first_name, $last_name, $username, $password);
                    if ($user_id) {
                        $result = array('status' => true, 'message' => 'You have successfully register!<br>You will get email notification within 5hr.','id'=>$user_id);
                        return json_encode($result);
                    } else {
                        $result = array('status' => false, 'message' => 'Please try again!');
                        return json_encode($result);
                    }
                }else{
                    $result = array('status' => false, 'message' => 'Username already registered!');
                    return json_encode($result);
                }
            }
        }
        $result = array('status' => false, 'message' => 'Invalid request!');
        return json_encode($result);
    }

    private function userValidate($username, $password)
    {
        $user_data = $this->common->get_user_login($username, md5($password));
        // echo '<pre>';var_dump($user_data);die;
        if (isset($user_data) && !empty($user_data) && $user_data["username"] == $username) {
            $usersession = array(
                'id' => $user_data['id'],
                'isLoggedIn' => true
            );
            $this->session->set("usersession", $usersession);
            return true;
        } else {
            return false;
        }
    }

    private function userRegister($first_name, $last_name, $username, $password)
    {
        $currentDate = new DateTime();
        $user_data = array(
            'username'=>$username,
            'password'=>md5($password),
            'first_name'=>$first_name,
            'last_name'=>$last_name,
            'verification_code'=>md5($username),
            'created_at'=>$currentDate->format('Y-m-d H:i:s'),
            'modified_at'=>$currentDate->format('Y-m-d H:i:s'),
        );
        $user_id = $this->common->data_insert('users',$user_data);
        if($user_id){
            return $user_id;
        }else{
            return false;
        }
    }

    public function logout()
    {
        $this->session->destroy();
        return redirect()->to('/');
    }

    public function verification()
    {
        // die('arvind');
        $email = $this->request->getVar('email');
        $verification_code = $this->request->getVar('verification_code');
        if (isset($email) && !empty($email) && isset($verification_code) && !empty($verification_code)) {
            $user_data = $this->common->get_single_row('users', 'username', $email);
            // echo '<pre>';print_r($user_data);die;
            if (isset($user_data) && !empty($user_data)) {
                if ($user_data['verified']=='1') {
                    $result = array('status' => true, 'message' => 'You are already verified!');
                    return json_encode($result);
                }else if($user_data['verification_code'] == $verification_code){
                    $data = $this->common->data_single_update('users', 'id', $user_data['id'], array('verified'=>1));
                    if ($data) {
                        $result = array('status' => true, 'message' => 'User successfully verified!');
                        return json_encode($result);
                    }else{
                        $result = array('status' => false, 'message' => 'Invalid User!');
                        return json_encode($result);
                    }
                }else{
                    $result = array('status' => false, 'message' => 'Verification failed!');
                    return json_encode($result);
                }
            } else {
                $result = array('status' => false, 'message' => 'Please try again!');
                return json_encode($result);
            }
        }
        $result = array('status' => false, 'message' => 'Invalid request!');
        return json_encode($result);
    }

    public function dashboard()
    {
        // echo "<pre>";print_r(session("usersession"));
        $video_url = $this->request->getVar('video_url');
        if (!checkSession()) {
            return redirect()->to("login");
        } else {
            $data = array();
            $data['page'] = "dashboard";
            $data['user'] = $this->common->get_single_row("users", "id", session("usersession")["id"]);
            if($video_url){
                $video_detail = $this->common->get_single_row("videos", "url", $video_url);
                if($video_detail){
                    $data['video'] = $video_detail;
                }else{
                    return redirect()->to('dashboard');
                }
            }
            return view(OSN_VIEWPATH . '/dashboard', $data);
        }
    }

    public function profile()
    {
        // echo "<pre>";print_r(session("usersession"));
        if (!checkSession()) {
            return redirect()->to("login");
        } else {
            $data = array();
            $data['page'] = "profile";
            $data['user'] = $this->common->get_single_row("users", "id", session("usersession")["id"]);
            return view(OSN_VIEWPATH . '/profile', $data);
        }
    }

    public function addVideoForm()
    {
        $id = $this->request->getVar('id');
        $course_id = $this->request->getVar('course_id');
        $url = $this->request->getVar('url');
        $title = $this->request->getVar('title');
        $description = $this->request->getVar('description');
        $video_data=array(
            'course_id' => $course_id,
            'title' => $title,
            'description' => $description,
        );
        // echo '<pre>';print_r($user_data);die;
        $video_id=false;
        if($id){
            // echo 'aaa<pre>';print_r($video_data);die;
            $where = array('id'=>$id,'url'=>$url);
            $video_id = $this->common->data_update('videos', $where, $video_data);
        }else{
            $video_data=array_merge($video_data,array('url'=>$url));
            // echo 'asdf<pre>';print_r($video_data);die;
            $video_id = $this->common->data_insert('videos',$video_data);
        }
        
        if($video_id){
            $result = array('status' => true, 'message' => 'Video added successfully!');
            return json_encode($result);
        }else{
            $result = array('status' => false, 'message' => 'Please try again!');
            return json_encode($result);
        }
    }
}
