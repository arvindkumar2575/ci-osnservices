<?php

namespace App\Controllers;

use App\Models\Common;
use App\Models\Settings;
use DateTime;

class Home extends BaseController
{
    protected $settings;
    protected $common;
    public function __construct()
    {
        $this->settings = new Settings();
        $this->common = new Common();
    }

    public function index()
    {
        $data=array();
        $data['page']="home";
        $data['excel_play_config'] = $this->settings->get_settings_single_row('excel_play')['value'];
        // echo '<pre>';print_r($data);die;
        return view(OSNSERVICES_VIEWPATH.'/index',$data);
    }

    public function aboutUs()
    {
        $data=array();
        $data['page']="about-us";
        $data['title']="About Us";
        $data['header_desc']="";
        $data['excel_play_config'] = $this->settings->get_settings_single_row('excel_play')['value'];
        return view(OSNSERVICES_VIEWPATH.'/about-us',$data);
    }

    public function contactUs()
    {
        $data=array();
        $data['page']="contact-us";
        $data['title']="Contact Us";
        $data['excel_play_config'] = $this->settings->get_settings_single_row('excel_play')['value'];
        $data['header_desc']="Fill below forms as per your reason of contact.";

        return view(OSNSERVICES_VIEWPATH.'/contact-us',$data);
    }

    public function contactFormSubmit()
    {
        $form_type = $this->request->getVar('form_type');
        // echo '<pre>';print_r($form_type);die;
        if($form_type=='ITR_Filing_Form'){
            $first_name = $this->request->getVar('first_name');
            $last_name = $this->request->getVar('last_name');
            $email_id = $this->request->getVar('email_id');
            $mobile_no = $this->request->getVar('mobile_no');
            $reason_options = $this->request->getVar('reason_options');
            $default_message = $this->request->getVar('default_message');
            $itr_options = $this->request->getVar('itr_options');
            // echo '<pre>';var_dump($first_name,$last_name,$email_id,$mobile_no,$reason_options);die;
            if(empty($first_name)||empty($last_name)||empty($email_id)||empty($mobile_no)||empty($reason_options)){
                $result = array('status'=>false,'message'=>'All fields are required!');
                return json_encode($result);
            }else{
                $res = $this->contactDataSubmit($first_name,$last_name,$email_id,$mobile_no,$reason_options,$default_message,$itr_options);
                if($res=1){
                    $result = array('status'=>true,'message'=>'Thank you!<br>We will contact you shortly.');
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

    private function contactDataSubmit($first_name,$last_name,$email_id,$mobile_no,$reason_options,$default_message,$itr_options)
    {
        // echo '<pre>';var_dump($first_name,$last_name,$email_id,$mobile_no);die;
        $currentDate = new DateTime();
        $user_data=array(
            'first_name' => $first_name,
            'last_name' => $last_name,
            'email_id' => $email_id,
            'mobile_no' => $mobile_no,
            'reason_options' => $reason_options,
            'default_message' => $default_message,
            'itr_options' => $itr_options,
            'created_at'=>$currentDate->format('Y-m-d H:i:s'),
        );
        // echo '<pre>';print_r($user_data);die;
        $user_id = $this->common->data_insert('contact_form',$user_data);
        if($user_id){
            return $user_id;
        }else{
            return false;
        }
    }
}
