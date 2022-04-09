<?php

namespace App\Controllers;
helper('html');
class Utilisateur extends BaseController
{   
    public function index()
    {
        return view('utilisateur/index');
    }
    public function inscription()
    {
        return view('utilisateur/inscription');
    }
    public function presentation()
    {
        return view('presentation');
    }
}
