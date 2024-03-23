<?php

namespace App\Controllers;

use App\Models\Common;
use App\Models\Settings;
use DateTime;

class TestController extends BaseController
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
        // echo '<pre>';print_r($data);die;
        return view(OSNSERVICES_VIEWPATH.'/index',$data);
    }



}
