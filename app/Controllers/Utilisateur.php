<?php

namespace App\Controllers;
helper('html');
class Utilisateur extends BaseController
{   
    public function index()
    {
        echo view('layout/entete.php');
        echo view('utilisateur/index');
        echo view('layout/pied.php');
    }
    public function inscription()
    {   
        echo view('layout/entete.php');
        echo view('utilisateur/inscription');
        echo view('layout/pied.php');
    }
    public function presentation()
    {
        echo view('layout/entete.php');
        echo view('utilisateur/presentation');
        echo view('layout/pied.php');
    }
}
