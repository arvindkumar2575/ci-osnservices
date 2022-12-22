<?php

namespace App\Controllers;

use App\Models\Common;
use App\Models\Settings;
use DateTime;
use Config\GDriveVideos;


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
            // echo '<pre>';print_r($data);die;
            return view(EXCELPLAY_VIEWPATH.'/index',$data);
        }
    }

}
