<?php

namespace App\Controllers;

use App\Models\Common;
use App\Models\Settings;

class MyDashboardController extends BaseController
{
    protected $settings;
    protected $common;
    public function __construct()
    {
        $this->settings = new Settings();
        $this->common = new Common();
    }

    public function myDashboard()
    {
        $data=array();
        $data['page']="mydashboard";

        // echo '<pre>';print_r($data);die;
        return view(MYDASHBOARD_VIEW.'/index',$data);
    }


    public function excelPlay()
    {
        $data=array();
        $data['page']="excelplay";
        
        // echo '<pre>';print_r($data);die;
        return view(MYDASHBOARD_VIEW.'/excelplay',$data);
    }



}
