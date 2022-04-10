<?php

namespace App\Controllers;
helper('html');
class Utilisateur extends BaseController
{   
    public function index()
    {
        echo view('layout/entete.php');
        echo view('utilisateur/connexion');
        echo view('layout/pied.php');
    }
    public function inscription()
    {  
        $data=["titre"=>"Sama Tontine:: S'inscrire sur la plateforme","menuActif"=>"inscription"]; 
        if($this->request->getMethod()=="post"){
            echo "Nom :".$this->request->getPost('nom').'</br>';
            echo "Prenom :".$this->request->getPost('prenom').'</br>';
            echo "login :".$this->request->getPost('login').'</br>';
            echo "Mot de passe :".$this->request->getPost('motPasse').'</br>';
            echo "Mot de passe :".$this->request->getPost('motPasseConf').'</br>';

        }
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
