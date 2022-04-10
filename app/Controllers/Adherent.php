<?php
namespace App\Controllers;
//1. rendre accessible  la classe Model
use App\Models\TontineModel;
use CodeIgniter\I18n\Time;
helper(['html','form']);
class Adherent extends BaseController{
    
    public function ajouterTontine(){
        $data=["titre"=>"Sama Tontine:: Accueil adherent", "menuActif"=>"adherentAcc"];
        $data['periodicite']=['mensuelle'=>'mensuelle','hebdomadaire'=>'hebdomadaire'];
        $data["nbEcheance"]=[1=>1,2,3,4,5,6,7,8,9,10,11,12];
        if($this->request->getMethod()=="post"){
            $reglesValid=[
                "label"=>["rules"=>"required","errors"=>["required"=>"le label est obligatoire"]],
                "periodicite"=>["rules"=>"required","errors"=>["required"=>"periodicite est obligatoire"]],
                "dateDeb"=>["rules"=>"required|valid_date[d/m/Y]","errors"=>["required"=>"la date de debut est obligatoire","valid_date"=>"Date non valide"]],
                "nbEcheance"=>["rules"=>"required","errors"=>["required"=>"le nbEcheance est obligatoire"]],
            ];
            if(!$this->validate($reglesValid)){
                $data['validation']=$this->validator;
            }
            else{//donnees valides
                    $dateDeb=Time::createFromFormat('d/m/Y',$this->request->getPost('dateDeb'));
                    $tontineData=[
                        "label"=>$this->request->getPost('label'),
                        "periodicite"=>$this->request->getPost('periodicite'),
                        "dateDeb"=>$dateDeb->format("Y/m/d"),
                        "nbEcheance"=>$this->request->getPost('nbEcheance'),
                        "idAdherent"=>session()->get('idAdherent')
                    ];
                    $tontine=new TontineModel();
                    $tontine->insert($tontineData);
                    $session=session();
                    $session->setFlashdata('success ajout de tontine', 'tontine ajouter avec succes');
                    return redirect()->to('adherent');
            }
        }
        echo view('layout/entete',$data);
        echo view('adherent/ajoutTontine');
        echo view('layout/pied');
    }
    
    public function index(){
        $data=["titre"=>"Sama Tontine:: Accueil adherent", "menuActif"=>"adherentAcc"];
        //2. Instancier le modele Tontine
        $model= new TontineModel();
        //3. Recuperer l'id de l'adherent
        $idAdherent=session()->get('idAdherent ');
        //4, Recuperer la liste des  tontine a partir du modele
        $listeTontineAdherent=$model->listeTontineAdherent($idAdherent);
        //5. ajouter cette liste  aux donnees transmi a la  vue
        $data['listeTontineAdherent']=$listeTontineAdherent;
            echo view('layout/entete',$data);
            echo view('adherent/index');
            echo view('layout/pied'); 
    }
}