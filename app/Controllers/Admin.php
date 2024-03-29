<?php

namespace App\Controllers;

use App\Models\Common;
use App\Models\Settings;
use App\Models\VideoModel;
use DateTime;
use Config\GDriveVideos;
use Config\YouTubeAPI;

class Admin extends BaseController
{
    protected $session;
    protected $settings;
    protected $common;
    protected $videoModel;
    public function __construct()
    {
        $this->session = session();
        $this->settings = new Settings();
        $this->common = new Common();
        $this->videoModel = new VideoModel();

    }

    public function admin()
    {
        if (!checkSession()) {
            return redirect()->to("login");
        } else {
            $data = array();
            $data['page'] = "admin";
            $data['user'] = $this->common->getUserDetails(session("usersession")["id"]);
            $data['courses'] = $this->common->getCourses();
            $data['plans'] = $this->common->getPlans();
            $data['cpdetails'] = $this->common->getCoursePlanDetails();
            $data['ucpdetails'] = $this->common->getUserCoursePlanDetails();
            $data['cvdetails'] = $this->common->getCourseVideoDetails();
            $data['contactdetails'] = $this->common->getContactFormDetails();
            $data['videos'] = $this->common->getVideos();
            $data['users'] = $this->common->getUsers();
            // echo '<pre>';print_r($data);die;
            if($data['user']['user_type']=='admin'){
                return view(OSN_VIEWPATH . '/admin', $data);
            }else{
                return redirect()->to('dashboard');
            }
        }
    }

    public function fetchAddEditForm()
    {
        $data = array();
        $operation = $this->request->getVar('operation');
        $type = $this->request->getVar('type');
        $user_id = $this->request->getVar('user_id')??null;
        $course_id = $this->request->getVar('course_id')??null;
        $plan_id = $this->request->getVar('plan_id')??null;
        $video_id = $this->request->getVar('video_id')??null;
        $ucpm_id = $this->request->getVar('ucpm_id')??null;
        
        
        // var_dump($operation,$type,$user_id,$course_id,$plan_id,$video_id);die;
        $data['operation']=$operation;
        $data['type']=$type;
        switch ($type) {
            case 'courses':
                $data['heading'] = $operation=='add'?'Add Courses':'Edit Course';
                if(isset($course_id)){
                    $course_detail = $this->common->get_single_row('courses','id',$course_id);
                    $data['name']=$course_detail['name'];
                    $data['description']=$course_detail['description'];
                    $data['url']=$course_detail['url'];
                    $data['status']=$course_detail['status'];
                }
                break;
            case 'plans':
                $data['heading'] = $operation=='add'?'Add Plans':'Edit Plan';
                if(isset($plan_id)){
                    $plan_detail = $this->common->get_single_row('plans','id',$plan_id);
                    $data['name']=$plan_detail['name'];
                    $data['description']=$plan_detail['description'];
                    $data['price']=$plan_detail['price'];
                    $data['discount']=$plan_detail['discount'];
                    $data['status']=$plan_detail['status'];
                }
                break;
            case 'videos':
                $data['heading'] = $operation=='add'?'Add Videos':'Edit Video';
                if(isset($video_id)){
                    $video_detail = $this->common->get_single_row('videos','id',$video_id);
                    $data['url']=$video_detail['url'];
                    $data['title']=$video_detail['title'];
                    $data['description']=$video_detail['description'];
                    $data['status']=$video_detail['status'];
                }
                break;
            case 'cpm':
                $data['heading'] = $operation=='add'?'Add Course Plan Mapping':'Edit Course Plan Mapping';
                break;
            case 'cvm':
                $data['heading'] = $operation=='add'?'Add Course Video Mapping':'Edit Course Video Mapping';
                break;
            
            case 'users':
                $data['heading'] = $operation=='add'?'Add Users':'Edit Users';
                if(isset($user_id)){
                    $user_detail = $this->common->get_single_row('users','id',$user_id);
                    $data['username']=$user_detail['username'];
                    $data['user_type']=$user_detail['user_type'];
                    $data['first_name']=$user_detail['first_name'];
                    $data['last_name']=$user_detail['last_name'];
                    $data['verified']=$user_detail['verified'];
                    $data['status']=$user_detail['status'];
                }
                break;
            case 'ucpm':
                $data['heading'] = $operation=='add'?'Add User Course Plan Mapping':'Edit User Course Plan Mapping';
                if(isset($user_id)){
                    $ucpm_detail = $this->common->get_data('user_course_plan_mapping',array('id'=>$ucpm_id));
                    $data['status']=$ucpm_detail['status'];
                }
                // echo '<pre>';print_r($data);die;
                break;
            default:
                $data['heading'] = 'Add Form';
                break;
        }
        $data['ucpm_id']=$ucpm_id;
        $data['user_id']=$user_id;
        $data['course_id']=$course_id;
        $data['plan_id']=$plan_id;
        $data['video_id']=$video_id;
        if ($operation == 'edit') {
        }else if($operation == 'add'){
        }
        
        // echo '<pre>';print_r($data);die;
        $form = view(OSN_VIEWPATH . '/components/add-edit-form',$data);
        $result = array('status' => true, 'data' => $form);
        return json_encode($result);
    }


    public function addEditDeleteFormData()
    {
        try {

            $data = array();
            $operation = $this->request->getVar('operation');
            $type = $this->request->getVar('type');
            $ucpm_id = $this->request->getVar('ucpm_id')??null;
            $user_id = $this->request->getVar('user_id')??null;
            $course_id = $this->request->getVar('course_id')??null;
            $plan_id = $this->request->getVar('plan_id')??null;
            $video_id = $this->request->getVar('video_id')??null;
            
            
            // var_dump($operation,$type,$user_id,$course_id,$plan_id,$video_id);die;
            switch ($type) {
                case 'courses':
                    $data['heading'] = $operation=='add'?'Add Courses':'Edit Course';
                    $data = array(
                        'name'=>$this->request->getVar('name')??'',
                        'description'=>$this->request->getVar('description')??'',
                        'url'=>$this->request->getVar('url')??'',
                        'status'=>$this->request->getVar('status')??'',
                    );
                    if($operation=='add'){
                        $id = $this->common->data_insert('courses',$data);
                        if($id){
                            $result = array('status' => true, 'message' => 'Course added successfully!');
                            return json_encode($result);
                        }else{
                            $result = array('status' => false, 'message' => 'Please try again!');
                            return json_encode($result);
                        }
                    }elseif($operation=='edit'){
                        $where = array('id'=>$course_id);
                        $id = $this->common->data_update('courses',$where,$data);
                        if($id){
                            $result = array('status' => true, 'message' => 'Course added successfully!');
                            return json_encode($result);
                        }else{
                            $result = array('status' => false, 'message' => 'Please try again!');
                            return json_encode($result);
                        }
                    }elseif($operation=='delete'){
                        $where = array('id'=>$course_id);
                        $d = $this->common->checkCourseMappedAnyWhere($course_id);
                        if(!empty($d['cpm_course_id']) || !empty($d['ucpm_course_id'])){
                            $result = array('status' => false, 'message' => 'Course still mapped anywhere!');
                            return json_encode($result);
                        }else{
                            // echo '<pre>';print_r($d);die;
                            $id = $this->common->data_delete('courses',$where);
                            if($id){
                                $result = array('status' => true, 'message' => 'Course deleted successfully!');
                                return json_encode($result);
                            }else{
                                $result = array('status' => false, 'message' => 'Please try again!');
                                return json_encode($result);
                            }
                        }
                    }
                    break;
                case 'plans':
                    $data['heading'] = $operation=='add'?'Add Plans':'Edit Plan';
                    $data = array(
                        'name'=>$this->request->getVar('name')??'',
                        'description'=>$this->request->getVar('description')??'',
                        'price'=>$this->request->getVar('price')??'',
                        'discount'=>$this->request->getVar('discount')??'',
                        'status'=>$this->request->getVar('status')??'',
                    );
                    if($operation=='add'){
                        $id = $this->common->data_insert('plans',$data);
                        if($id){
                            $result = array('status' => true, 'message' => 'Plan added successfully!','id'=>$id);
                            return json_encode($result);
                        }else{
                            $result = array('status' => false, 'message' => 'Please try again!');
                            return json_encode($result);
                        }
                    }elseif($operation=='edit'){
                        $where = array('id'=>$plan_id);
                        $id = $this->common->data_update('plans',$where,$data);
                        if($id){
                            $result = array('status' => true, 'message' => 'Plan added successfully!','id'=>$id);
                            return json_encode($result);
                        }else{
                            $result = array('status' => false, 'message' => 'Please try again!');
                            return json_encode($result);
                        }
                    }elseif($operation=='delete'){
                        $where = array('id'=>$plan_id);
                        $d = $this->common->checkPlanMappedAnyWhere($plan_id);
                        if(!empty($d['cpm_plan_id']) || !empty($d['cvm_plan_id']) || !empty($d['ucpm_plan_id'])){
                            $result = array('status' => false, 'message' => 'Plan still mapped anywhere!');
                            return json_encode($result);
                        }else{
                            // echo '<pre>';print_r($d);die;
                            $id = $this->common->data_delete('plans',$where);
                            if($id){
                                $result = array('status' => true, 'message' => 'Plan deleted successfully!');
                                return json_encode($result);
                            }else{
                                $result = array('status' => false, 'message' => 'Please try again!');
                                return json_encode($result);
                            }
                        }
                    }
                    break;
                case 'cpm':
                    $data['heading'] = $operation=='add'?'Add Course Plan Mapping':'Edit Course Plan Mapping';
                    $data = array(
                        'course_id'=>$course_id,
                        'plan_id'=>$plan_id
                    );
                    if($operation=='add'){
                        $d = $this->common->get_multiple_row('course_plan_mapping',$data);
                        if($d){
                            $result = array('status' => false, 'message' => 'This mapping already present!');
                            return json_encode($result);
                        }else{
                            $this->common->data_insert('course_plan_mapping',$data);
                            $result = array('status' => true, 'message' => 'Course Plan Mapping added successfully!');
                            return json_encode($result);
                        }
                    }elseif($operation=='delete'){
                        $id = $this->common->data_delete('course_plan_mapping',$data);
                        if($id){
                            $result = array('status' => true, 'message' => 'Course Plan Mapping deleted successfully!','id'=>$id);
                            return json_encode($result);
                        }else{
                            $result = array('status' => false, 'message' => 'Please try again!');
                            return json_encode($result);
                        }
                    }
                    break;
                case 'cvm':
                    $data['heading'] = $operation=='add'?'Add Course Video Mapping':'Edit Course Video Mapping';
                    $data = array(
                        'course_id'=>$course_id,
                        'video_id'=>$video_id
                    );
                    if($operation=='add'){
                        $d = $this->common->get_multiple_row('course_video_mapping',$data);
                        if($d){
                            $result = array('status' => false, 'message' => 'This mapping already present!');
                            return json_encode($result);
                        }else{
                            $this->common->data_insert('course_video_mapping',$data);
                            $result = array('status' => true, 'message' => 'Course Video Mapping added successfully!');
                            return json_encode($result);
                        }
                    }elseif($operation=='delete'){
                        
                        $id = $this->common->data_delete('course_video_mapping',$data);
                        if($id){
                            $result = array('status' => true, 'message' => 'Course Video Mapping deleted successfully!','id'=>$id);
                            return json_encode($result);
                        }else{
                            $result = array('status' => false, 'message' => 'Please try again!');
                            return json_encode($result);
                        }
                    }
                    break;
                case 'videos':
                    $data['heading'] = $operation=='add'?'Add Videos':'Edit Video';
                    $data = array(
                        'url'=>$this->request->getVar('url')??'',
                        'title'=>$this->request->getVar('title')??'',
                        'description'=>$this->request->getVar('description')??'',
                        'status'=>$this->request->getVar('status')??'',
                    );
                    if($operation=='add'){
                        $id = $this->common->data_insert('videos',$data);
                        if($id){
                            $result = array('status' => true, 'message' => 'Video added successfully!','id'=>$id);
                            return json_encode($result);
                        }else{
                            $result = array('status' => false, 'message' => 'Please try again!');
                            return json_encode($result);
                        }
                    }elseif($operation=='edit'){
                        $where = array('id'=>$video_id);
                        $id = $this->common->data_update('videos',$where,$data);
                        if($id){
                            $result = array('status' => true, 'message' => 'Video added successfully!','id'=>$id);
                            return json_encode($result);
                        }else{
                            $result = array('status' => false, 'message' => 'Please try again!');
                            return json_encode($result);
                        }
                    }elseif($operation=='delete'){
                        $where = array('id'=>$video_id);
                        $d = $this->common->checkVideoMappedAnyWhere($video_id);
                        if(!empty($d['cvm_video_id'])){
                            $result = array('status' => false, 'message' => 'Video still mapped anywhere!');
                            return json_encode($result);
                        }else{
                            // echo '<pre>';print_r($d);die;
                            $id = $this->common->data_delete('videos',$where);
                            if($id){
                                $result = array('status' => true, 'message' => 'Video deleted successfully!');
                                return json_encode($result);
                            }else{
                                $result = array('status' => false, 'message' => 'Please try again!');
                                return json_encode($result);
                            }
                        }
                    }
                    break;
                case 'users':
                    $data['heading'] = $operation=='add'?'Add Users':'Edit Users';
                    $data = array(
                        'username'=>$this->request->getVar('username')??'',
                        'user_type'=>$this->request->getVar('user_type')??'',
                        'first_name'=>$this->request->getVar('first_name')??'',
                        'last_name'=>$this->request->getVar('last_name')??'',
                        'verified'=>$this->request->getVar('verified')??'',
                        'status'=>$this->request->getVar('status')??'',
                    );
                    $currentDate = new DateTime();
                    if($operation=='add'){
                        $data['password']=md5($this->request->getVar('password'));
                        $data['created_at']=$currentDate->format('Y-m-d H:i:s');
                        $data['modified_at']=$currentDate->format('Y-m-d H:i:s');
                        $data['verification_code']=md5($this->request->getVar('username'));
                        $id = $this->common->data_insert('users',$data);
                        if($id){
                            $result = array('status' => true, 'message' => 'User added successfully!','id'=>$id);
                            return json_encode($result);
                        }else{
                            $result = array('status' => false, 'message' => 'Please try again!');
                            return json_encode($result);
                        }
                    }elseif($operation=='edit'){
                        $data['modified_at']=$currentDate->format('Y-m-d H:i:s');
                        $where = array('id'=>$user_id);
                        $id = $this->common->data_update('users',$where,$data);
                        if($id){
                            $result = array('status' => true, 'message' => 'User added successfully!','id'=>$id);
                            return json_encode($result);
                        }else{
                            $result = array('status' => false, 'message' => 'Please try again!');
                            return json_encode($result);
                        }
                    }
                    break;
                case 'ucpm':
                    $data['heading'] = $operation=='add'?'Add User Course Plan Mapping':'Edit User Course Plan Mapping';
                    $data = array(
                        'user_id'=>$user_id,
                        'course_id'=>$course_id,
                        'plan_id'=>$plan_id
                    );
                    
                    $currentDate = new DateTime();
                    if($operation=='add'){
                        $d = $this->common->get_multiple_row('user_course_plan_mapping',$data);
                        // echo '<pre>';print_r($d);die;
                        if($d){
                            $result = array('status' => false, 'message' => 'This mapping already present!');
                            return json_encode($result);
                        }else if(!$user_id || !$course_id || !$plan_id){
                            $result = array('status' => false, 'message' => 'All fields are required!');
                            return json_encode($result);
                        }else{
                            $data['start'] = $currentDate->format('Y-m-d H:i:s');
                            $data['end'] = $currentDate->format('Y-m-d H:i:s');
                            $this->common->data_insert('user_course_plan_mapping',$data);
                            $result = array('status' => true, 'message' => 'Course Plan Mapping added successfully!');
                            return json_encode($result);
                        }
                    }elseif($operation=='edit'){
                        $status = $this->request->getVar('status')??'';
                        if($status=='1'){
                            $ucp = $this->common->get_data('user_course_plan_mapping',array('id'=>$ucpm_id));
                            // echo '<pre>';print_r($ucp);die;
                            if($ucp['start']==$ucp['end']){
                                $p = $this->common->get_data('plans',array('id'=>$plan_id));
                                $dm = $p['duration'];
                                $data['start'] = $currentDate->format('Y-m-d H:i:s');
                                if($dm>0){
                                    $currentDate->modify("+".$dm." month");
                                }else{
                                    $currentDate->modify("+1 year");
                                }
                                $data['end'] = $currentDate->format('Y-m-d H:i:s');
                                $data['status'] = $status;
                                // echo '<pre>';print_r($data);die;
                                $id = $this->common->data_update('user_course_plan_mapping',array('id'=>$ucpm_id),$data);
                                if($id){
                                    $result = array('status' => true, 'message' => 'Course Plan Mapping updated successfully!','id'=>$id);
                                    return json_encode($result);
                                }else{
                                    $result = array('status' => false, 'message' => 'Please try again!');
                                    return json_encode($result);
                                }
                            }else{
                                $data['status'] = $status;
                                // echo '<pre>';print_r($data);die;
                                $id = $this->common->data_update('user_course_plan_mapping',array('id'=>$ucpm_id),$data);
                                if($id){
                                    $result = array('status' => true, 'message' => 'Course Plan Mapping updated successfully!','id'=>$id);
                                    return json_encode($result);
                                }else{
                                    $result = array('status' => false, 'message' => 'Please try again!');
                                    return json_encode($result);
                                }
                            }
                        }else{
                            $data['status'] = $status;
                                // echo '<pre>';print_r($data);die;
                            $id = $this->common->data_update('user_course_plan_mapping',array('id'=>$ucpm_id),$data);
                            if($id){
                                $result = array('status' => true, 'message' => 'Course Plan Mapping updated successfully!','id'=>$id);
                                return json_encode($result);
                            }else{
                                $result = array('status' => false, 'message' => 'Please try again!');
                                return json_encode($result);
                            }
                        }
                        
                    }elseif($operation=='delete'){
                        $id = $this->common->data_delete('user_course_plan_mapping',$data);
                        if($id){
                            $result = array('status' => true, 'message' => 'Course Plan Mapping deleted successfully!','id'=>$id);
                            return json_encode($result);
                        }else{
                            $result = array('status' => false, 'message' => 'Please try again!');
                            return json_encode($result);
                        }
                    }
                    break;
                default:
                    $data['heading'] = 'Add Form';
                    break;
            }






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
            $video_id=false;
            if($id){
                $where = array('id'=>$id,'url'=>$url);
                $video_id = $this->common->data_update('videos', $where, $video_data);
            }else{
                $video_data=array_merge($video_data,array('url'=>$url));
                $video_id = $this->common->data_insert('videos',$video_data);
            }
            
            // echo 'asdf<pre>';print_r($video_data);die;
            if($video_id){
                $result = array('status' => true, 'message' => 'Video added successfully!');
                return json_encode($result);
            }else{
                $result = array('status' => false, 'message' => 'Please try again!');
                return json_encode($result);
            }
        } catch (\Exception $e) {
            $result = array('status' => false, 'message' => $e['message']);
            return json_encode($result);
        }
        
    }

    public function searchNameEmail()
    {
        $q = $this->request->getVar('q');
        if($q){
            $d = $this->common->getSearchQuery($q);
            $result = array('status'=>true,'data'=>$d);
            return json_encode($result);
        }
        $result = array('status'=>false,'data'=>$q);
        return json_encode($result);
    }

}
