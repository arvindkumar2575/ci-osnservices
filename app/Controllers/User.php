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
        if (!checkSession()) {
            return redirect()->to("login");
        } else {
            $data = array();
            $data['page'] = "dashboard";
            $data['user'] = $this->common->get_single_row("users", "id", session("usersession")["id"]);
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
}
