<?php

namespace App\Controllers;
helper('html');
class Home extends BaseController
{
     public function index()
    {
        $data=["titre"=>"Sama Tontine::Faciliter la gestion des tontines","menuActif"=>"accueil"];
        echo view('layout/entete.php',$data);
        echo view('welcome_message');
        echo view('layout/pied.php');

    }
    public function contact()
    {
        echo view('layout/entete.php');
        echo view('contact');
        echo view('layout/pied.php'); 
    }
    public function connexion()
    {
        echo view('layout/entete.php');
        echo view('utilisateur/connexion');
        echo view('layout/pied.php');  
    }
    public function presentation()
    {
        echo view('layout/entete.php');
        echo view('utilisateur/presentation');
        echo view('layout/pied.php');  
    }
}
