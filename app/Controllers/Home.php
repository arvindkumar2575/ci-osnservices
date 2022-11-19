<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data=array();
        $data['page']="home";
        return view(OSNSERVICES_VIEWPATH.'/index',$data);
    }

    public function aboutUs()
    {
        $data=array();
        $data['page']="about-us";
        $data['title']="About Us";
        $data['header_desc']="";

        return view(OSNSERVICES_VIEWPATH.'/about-us',$data);
    }

    public function contactUs()
    {
        $data=array();
        $data['page']="contact-us";
        $data['title']="Contact Us";
        $data['header_desc']="Fill below forms as per your reason of contact.";

        return view(OSNSERVICES_VIEWPATH.'/contact-us',$data);
    }

    public function formSubmit()
    {
        return 'form-submit';
    }
}
