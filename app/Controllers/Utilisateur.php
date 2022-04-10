<?php

namespace App\Controllers;
helper(['html','form']);
class Utilisateur extends BaseController
{   
    public function index()
    {    $data=["titre"=>"Se Connecter","menuActif"=>"connexion"];
        echo view('layout/entete.php',$data);
        echo view('utilisateur/connexion');
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
        $data=["titre"=>"presentation","menuActif"=>"presentation"];
        echo view('layout/entete.php',$data);
        echo view('utilisateur/presentation');
        echo view('layout/pied.php');
    }
}
