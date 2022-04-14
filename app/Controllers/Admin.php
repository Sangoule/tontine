<?php

namespace App\Controllers;

use App\Models\TontineModel;
use App\Models\AdherentModel;
use App\Models\EcheanceModel;
helper('html');
class Admin extends BaseController
{
     public function index()
    {
        $data=["titre"=>"presentation","menuActif"=>"administrateurAcc"];
       
        //2. Instancier le modele Tontine
        $model= new TontineModel();
        $modelAd= new AdherentModel();
        
        //3. Recuperer l'id de l'adherent
        $idResponsable=session()->get('id');
        $idTontine=$model->listeTontineid($idResponsable);
        
        
        //4, Recuperer la liste des  tontine a partir du modele
        $listeTontineResp=$model->listeTontineAdherent($idResponsable);
        //5. Ajouter cette liste  aux donnees transmi a la  vue
        $data['listeTontineResp']=$listeTontineResp;
        //6. Ajouter liste cotisation
        
        $nbA=$modelAd->nombreAdherent();
        $data['nbA']=$nbA;
        $nbB=$model->nombreTontine();
        $data['nbB']=$nbB;
        
        echo view('layout/entete.php', $data);
        echo view('administrateur/index');
        echo view('layout/pied.php');

    }
    public function gerer(){
        $data=["titre"=>"presentation","menuActif"=>"gestionUtilisateurs"];
        $modelAd= new AdherentModel();
        $liste=$modelAd->listeAdherent();
        $data['liste']=$liste;
        echo view('layout/entete.php', $data);
        echo view('administrateur/gestion');
        echo view('layout/pied.php');
    }
    public function reinitialiser($idAdherent){
        $data=["titre"=>"presentation","menuActif"=>"gestionUtilisateurs"];
        
        $adherent=new AdherentModel();
        if($this->request->getMethod()=="post"){
            $reglesValid=[
                "nom"=>["rules"=>"required","errors"=>["required"=>"le nom est obligatoire "]],
                "prenom"=>["rules"=>"required","errors"=>["required"=>"le prénom est obligatoire "]],
                "login"=>["rules"=>"required|min_length[6]","errors"=>["required"=>"le login est obligatoire ","min_length"=>"le login doit comporter au moins 6 caractères "]],
                "motPasse"=>["rules"=>"required|min_length[6]","errors"=>["required"=>"le mot de passe est obligatoire ","min_length"=>"le mot de passe doit comporter au moins 6 caractères "]],
                "motPasseConf"=>["rules"=>"required|matches[motPasse]","errors"=>["required"=>"la confirmation du mot de passe est obligatoire ","matches"=>"la confirmation doit être identique au mot de passe "]],
            ];
            if(!$this->validate($reglesValid)){
                $data['validation']=$this->validator;
            }
            else{//donnees valides
                $adherentData=[
                    
                    "login"=>$this->request->getPost('login'),
                    "motPasse"=>$this->request->getPost('motPasse'),
                    
                ];
            $adherent= new AdherentModel();
            $adherent->save($adherentData);
            $session=session();
            $session->setFlashdata('success','Modification réussi. Connectez-vous');
            return redirect()->to('admin');
            }
            
        }
        else{
            $adherent= $adherent->listeAdherentrets($idAdherent);
            
            $data["adherent"]=$adherent;
        
    }
        
        echo view('layout/entete.php', $data);
        echo view('administrateur/reinitialisation');
        echo view('layout/pied.php');
    }
  
}
