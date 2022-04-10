<?php

namespace App\Controllers;
use App\Models\AdherentModel;
use CodeIgniter\Validation\Rules;

helper(['html','form']);
class Utilisateur extends BaseController
{   
    public function deconnexion(){
        //1. supprimer les donnees de session.
        session()->destroy();
        //2. Redirection sur l'action d'affichage des messages
        return redirect()->to('/utilisateur/deconnexionMessage');
    }
    public function deconnexionMessage(){
        //1. message de deconnexion.
        $session=session();
        $session->setFlashdata('success','Deconnexion reussie');
        //2. Redirection vers la page de connexion
        return redirect()->to('utilisateur');
    }
    public function index()
    {    $data=["titre"=>"Se Connecter","menuActif"=>"connexion"];
        if($this->request->getMethod()=="post"){
            $reglesValid=[
                "login"=>["rules"=>"required|valid_email","errors"=>["required"=>"login obligatoire ","valid_email"=>"email nom valide"]],
                "motPasse"=>["rules"=>"required | utilisateurValide[login, motPasse]","errors"=>["required"=>"le mot de passe est obligatoire ","utilisateurValide"=>"Email et /ou mot de passe incorrect(s)"]],
            ];
            if(!$this->validate($reglesValid)){
                $data['validation']=$this->validator;
            }
            else{//login et mot de passe correct
                $model= new AdherentModel();
                $user = $model->where('login',$this->request->getPost('login'))->where('motPasse',$this->request->getPost('motPasse'))->first();
                $data=[
                    'id'=>$user["id"],
                    'nom'=>$user["nom"],
                    'prenom'=>$user["prenom"],
                    'login'=>$user["login"],
                    'profil'=>$user["profil"],
                ];
                session()->set($data);
                return redirect()->to(base_url($user["profil"]));
            }
        }
        echo view('layout/entete.php',$data);
        echo view('utilisateur/connexion');
        echo view('layout/pied.php');
    }
    public function inscription()
    {  
        $data=["titre"=>"Sama Tontine:: S'inscrire sur la plateforme","menuActif"=>"inscription"]; 
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
            else{ //insertion dans la base de données
                $adherentData=[
                    "Nom"=>$this->request->getPost('nom'),
                    "prenom"=>$this->request->getPost('prenom'),
                    "login"=>$this->request->getPost('login'),
                    "motPasse"=>$this->request->getPost('motPasse'),
                    "profil"=>"adherent"
                ];
            $adherent= new AdherentModel();
            $adherent->insert($adherentData);
            $session=session();
            $session->setFlashdata('success','Inscription réussi. Connectez-vous');
            return redirect()->to('utilisateur');
            }

        }
        echo view('layout/entete.php',$data);
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
