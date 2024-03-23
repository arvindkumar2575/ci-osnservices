<?php

namespace App\Controllers;

use App\Models\Common;
use App\Models\Settings;

class AdminController extends BaseController
{
    protected $settings;
    protected $common;
    public function __construct()
    {
        $this->settings = new Settings();
        $this->common = new Common();
    }

    public function admin()
    {
        $data=array();
        $data['page']="admin";

        // echo '<pre>';print_r($data);die;
        return view(ADMIN_VIEW.'/index',$data);
    }


    public function excelPlay()
    {
        $data=array();
        $data['page']="excelplay";
        
        // echo '<pre>';print_r($data);die;
        return view(MYDASHBOARD_VIEW.'/excelplay',$data);
    }



}
