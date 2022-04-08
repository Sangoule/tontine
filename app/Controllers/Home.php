<?php

namespace App\Controllers;
helper('html');
class Home extends BaseController
{
    public function index()
    {
        return view('welcome_message');
    }
    public function contact()
    {
        return view('contact');
    }
}
