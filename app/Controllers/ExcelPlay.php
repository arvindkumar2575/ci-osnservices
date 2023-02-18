<?php

namespace App\Controllers;

use App\Models\Common;
use App\Models\Settings;
use App\Models\VideoModel;
use DateTime;
use Config\GDriveVideos;
use Config\YouTubeAPI;

class ExcelPlay extends BaseController
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

    public function freeExcelPlay()
    {
        $data=array();
        $data['title']="Excel Play - Free";
        $data['page']="free-excel-play";
        $data['videoList']=$this->getFreeVideos();
        // echo '<pre>';print_r($data);die;
        return view(EXCELPLAY_VIEWPATH.'/free-excel-play',$data);
    }

    public function index()
    {
        if(!checkSession()){
            return redirect()->to("login"); 
        }else{
            $course_id = $_GET['c']??'';
            $plan_id = $_GET['p']??'';
            // echo $course_id;echo ' - ';echo $plan_id;die;
            if(!empty($course_id) && !empty($plan_id)){
                $d = array(
                    'user_id'=>session("usersession")['id'],
                    'course_id'=>$course_id,
                    'plan_id'=>$plan_id,
                    'status'=>1
                );
                $c = $this->common->getUserCoursePlanStatus(session("usersession")['id'],$course_id,$plan_id);
                if($c){
                    $data=array();
                    $data['title']="Excel Play";
                    $data['page']="excel-play";
                    $data['videoList']=$this->getVideos(session("usersession")["id"]);
                    $data['user'] = $this->common->get_single_row("users", "id", session("usersession")["id"]);
                    // echo '<pre>';print_r($data);die;
                    return view(EXCELPLAY_VIEWPATH.'/index',$data);
                }else{
                    return redirect()->to("dashboard");
                }
            }else{
                // var_dump('aaa');die;
                return redirect()->to("dashboard");
            }
        }
    }

    public function runyt()
    {
        if(!checkSession()){
            // echo 'arvind';die;
            return redirect()->to("login"); 
        }else{
            $usersession = $this->session->get('usersession');
            if($usersession['id']=='2'){
                $yt = new YouTubeAPI;
                $api = explode('.',$yt->api_key);
                $ytrequrl = $yt->url.'?key='.$api[1].$yt->playlistIds['basic_excel'].$yt->string;
                $response  = file_get_contents($ytrequrl);
                $jsonobj  = json_decode($response);
                
                $insertdata = array();
                foreach ($jsonobj->items as $key1 => $value1) {
                    $data=array();
                    $data['url'] = $value1->snippet->resourceId->videoId;
                    $vid = $this->common->get_single_row('videos','url',$data['url']);
                    if($vid){
                        continue;
                    }
                    $data['title'] = $value1->snippet->title;
                    $data['description'] = $value1->snippet->description;
                    array_push($insertdata,$data);
                }
                if($insertdata){
                    $rows = $this->common->data_insert_batch('videos',$insertdata);
                    die(json_encode(array('status' => true, 'message' => $rows.' rows are inserted successfully!')));
                }else{
                    die(json_encode(array('status' => false, 'message' => 'No rows are inserted in database!')));
                }
            }else{
                die(json_encode(array('status' => false, 'message' => 'Invalid User!')));
            }
        }
    }

    private function getFreeVideos()
    {
        $videoList = array();
        return $videoList;
    }

    private function getVideos($id)
    {
        $user_valid_plans = array();
        $user_valid_plans = $this->videoModel->get_user_valid_course_plan_list($id);
        if($user_valid_plans){
            foreach ($user_valid_plans as $key => $value) {
                $user_valid_plans[$key]['videos'] = $this->videoModel->get_video_based_course($value['course_id']);
            }
        }
        return $user_valid_plans;
    }

}
