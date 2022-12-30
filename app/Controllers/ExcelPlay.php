<?php

namespace App\Controllers;

use App\Models\Common;
use App\Models\Settings;
use DateTime;
use Config\GDriveVideos;
use Config\YouTubeAPI;

class ExcelPlay extends BaseController
{
    protected $settings;
    protected $common;
    public function __construct()
    {
        $this->session = session();
        $this->settings = new Settings();
        $this->common = new Common();
        $this->videoConfig = new GDriveVideos;

    }

    public function index()
    {
        if(!checkSession()){
            return redirect()->to("login"); 
        }else{
            $data=array();
            $data['page']="excel-play";
            $data['videoURL']=$this->videoConfig->url;
            $data['videoList']=$this->videoConfig->playlistIds['excel_play'];
            $data['user'] = $this->common->get_single_row("users", "id", session("usersession")["id"]);
            // echo '<pre>';print_r($data);die;
            return view(EXCELPLAY_VIEWPATH.'/index',$data);
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

}
