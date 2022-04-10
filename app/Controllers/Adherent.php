<?php
namespace App\Controllers;
helper(['html','form']);
class Adherent extends BaseController{
    public function index(){
        $data=["titre"=>"Sama Tontine:: Accueil adherent", "menuActif"=>"adherentAcc"];
        echo view('layout/entete',$data);
        echo view('adherent/index');
        echo view('layout/pied');
    }
}