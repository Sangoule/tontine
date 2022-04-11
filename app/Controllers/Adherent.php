<?php
namespace App\Controllers;
//1. rendre accessible  la classe Model
use CodeIgniter\I18n\Time;
use App\Models\TontineModel;
use App\Models\AdherentModel;
use App\Models\EcheanceModel;
use App\Models\ParticipeModel;
helper(['html','form']);
class Adherent extends BaseController{
    
    public function genererEcheance($idTontine){
        //1. Recuperer les informations sur la tontine courante
            $model=new TontineModel();
            $maTontine= $model->tontine($idTontine);
        //2. creer un tableau des echeances
        $tabEcheance=[];
        $dateDeb=Time::createFromFormat('Y-m-d',$maTontine["dateDeb"]);  
        for($i=1;$i<=$maTontine["nbEcheance"];$i++){
             $tabEcheance[]=['date'=>$dateDeb->toDateString(),'numero'=>$i,'idTontine'=>$idTontine];
             if($maTontine["periodicite"]=="mensuelle"){
                 $dateDeb=$dateDeb->addMonths(1);
             }
             else{
                 $dateDeb=$dateDeb->addDays(7);
             }
        }
        //3. inserer le tableau dans la base de données
        $modelEcheance=new EcheanceModel();
        $nbInserer=$modelEcheance->generer($tabEcheance);
        //4. Revenir sur la page tontine avec un message de confirmation
        $session=session();
        $session->setFlashdata('successAjEcheance',$nbInserer.' échéance ajoutées');
        return redirect()->to(base_url()."/adherent/tontine/$idTontine");
    }    
    public function adhererTontine($idTontine){
        $data=["titre"=>"Sama Tontine:: Accueil adherent", "menuActif"=>"adhesion"];
        if($this->request->getMethod()=="post"){
            $reglesValid=[
                "montant"=>["rules"=>"required|integer","errors"=>["required"=>"le montant est obligatoire","integer"=>"le montant doit etre un nombre"]],
                
            ];
            if(!$this->validate($reglesValid)){
                $data['validation']=$this->validator;
            }
            else{//donnees valides
                    $participeData=[
                        "idTontine"=>$idTontine,
                        "montant"=>$this->request->getPost('montant'),
                        "idAdherent"=>session()->get('id')
                        
                    ];
                    $participe=new ParticipeModel();
                    $participe->insert($participeData);
                    $session=session();
                    $session->setFlashdata('success ajout Adhesion', 'adhesion avec succes');
                    return redirect()->to('adherent/adhesion');
            }
        }
        else{
            $data['idTontine']=$idTontine;
        }
        echo view('layout/entete',$data);
        echo view('adherent/ajoutAdhesion');
        echo view('layout/pied');
    }
    public function adhesion(){
        $data=["titre"=>"Sama Tontine:: Accueil adherent", "menuActif"=>"adhesion"];
        //1. instancier le modele et recupere les tontine dispo
        $idAdherent=session()->get('id');
        $model= new TontineModel();
        $listeTontines=$model->listeTontines('idAdherent');
        //2. ajouter la liste des donnees transmis a la vue 
        $data['listeTontines']=$listeTontines;
        // la vue
        echo view('layout/entete',$data);
        echo view('adherent/adhesion');
        echo view('layout/pied');
    }
    public function tontine($idTontine){
        $data=["titre"=>"Sama Tontine:: Accueil adherent", "menuActif"=>"adherentAcc"];
        $tontine=new TontineModel();
        $maTontine= $tontine->tontine($idTontine);
        $data['maTontine']=$maTontine;
        $modelAd= new AdherentModel();
        $participants=$modelAd->participer($idTontine);
        $data['participants']=$participants;
        //5. Récuperer la liste des echeances
        $modelEcheance = new EcheanceModel();
        $echeance=$modelEcheance->echeancesTontine($idTontine);
        //6. Ajouter la liste aux données transmises a la vue
        $data['echeances']=$echeance;
        echo view('layout/entete',$data);
        echo view('adherent/tontine');
        echo view('layout/pied');
    }
    public function suprimerTontine($idTontine){
        $tontine=new TontineModel();
        $tontine->delete($idTontine);
        $session=session();
        $session->setFlashdata('success ajout de tontine', 'Supression effectuée');
        return redirect()->to(base_url().'/adherent');
    }
    public function modifierTontine($idTontine){
        $data=["titre"=>"Sama Tontine:: Accueil adherent", "menuActif"=>"adherentAcc"];
        $data['periodicite']=['mensuelle'=>'mensuelle','hebdomadaire'=>'hebdomadaire'];
        $data["nbEcheance"]=[1=>1,2,3,4,5,6,7,8,9,10,11,12];
        $tontine=new TontineModel();
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
                        "id"=>$this->request->getPost('id'),
                        "label"=>$this->request->getPost('label'),
                        "periodicite"=>$this->request->getPost('periodicite'),
                        "dateDeb"=>$dateDeb->format("Y/m/d"),
                        "nbEcheance"=>$this->request->getPost('nbEcheance'),
                        "idResponsable"=>session()->get('id')
                    ];
                    
                    $tontine->save($tontineData);
                    $session=session();
                    $session->setFlashdata('success ajout de tontine', 'tontine modifié avec succes');
                    return redirect()->to('adherent');
            }
        }
        else{
            $maTontine= $tontine->tontine($idTontine);
            $dateDeb=Time::createFromFormat('Y-m-d',$maTontine['dateDeb']);
            $maTontine["dateDeb"]=$dateDeb->format(("d/m/Y"));
            $data["tontine"]=$maTontine;
        }
        echo view('layout/entete',$data);
        echo view('adherent/modificationTontine');
        echo view('layout/pied');

    }
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
                        "idResponsable"=>session()->get('id')
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
        $idResponsable=session()->get('id');
        //4, Recuperer la liste des  tontine a partir du modele
        $listeTontineResp=$model->listeTontineAdherent($idResponsable);
        //5. ajouter cette liste  aux donnees transmi a la  vue
        $data['listeTontineResp']=$listeTontineResp;
            echo view('layout/entete',$data);
            echo view('adherent/index');
            echo view('layout/pied'); 
    }
}