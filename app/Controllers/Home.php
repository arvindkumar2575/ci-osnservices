<?php

namespace App\Controllers;

use App\Models\Common;
use App\Models\Settings;
use DateTime;

class Home extends BaseController
{
    
    public function index()
    {
        $data=array();
        $data['page']="home";
        // echo '<pre>';print_r($data);die;
        return view('welcome_message',$data);
    }

}
