<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('landing-pages/lp-osnservices/index');
    }

    public function aboutUs()
    {
        return view('landing-pages/lp-osnservices/about-us');
    }

    public function contactUs()
    {
        return view('landing-pages/lp-osnservices/contact-us');
    }

    public function formSubmit()
    {
        return 'form-submit';
    }
}
