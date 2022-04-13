<?php 
namespace App\Models;
use CodeIgniter\Model;

class AdherentModel extends Model{
    protected $table="adherent";
    protected $allowedFields=["id","prenom","nom","login","motPasse","profil"];
    function participer($idTontine){
        return $this->join("participer as p","p.idAdherent=adherent.id")->join("tontine as t","t.id=p.idTontine")->where("t.id=",$idTontine)->findAll();
    }
    function cotiser($idTontine){
        $cotis=$this->selectCount('adherent.id','nbCotis')
                    ->select('adherent.id')
                    ->join("cotiser c","c.idAdherent=adherent.id")
                    ->join("echeance e","e.id=c.idEcheance")
                    ->where("e.idTontine",$idTontine)
                    ->groupBy("adherent.id")
                    ->get()->getResultArray();
        $cotisations=[];
        foreach($cotis as $coti)
        $cotisations[$coti["id"]]=$coti["nbCotis"];
        return $cotisations;
    }
    function cotiserA($idAdherent){
      
        $cotis=$this->selectCount('adherent.id','nbCotis')
                    ->select('adherent.id')
                    ->join("cotiser c","c.idAdherent=adherent.id")
                    ->join("echeance e","e.id=c.idEcheance")
                    ->where('idAdherent',$idAdherent)
                    ->groupBy("adherent.id")
                    ->get()->getResultArray();
             
            
        $cotisations=[];
        foreach($cotis as $coti)
        $cotisations[$coti["id"]]=$coti["nbCotis"];
        return $cotisations;
    }
    function nombreAdherent(){
       $nbA= $this->select('id')->where('adherent.profil','adherent')->get()->getResultArray();
        return count($nbA);
    }
    function listeAdherent(){
        return $this->get()->getResultArray();
         
     }
     function listeAdherentrets($idAdherent){
        return $this->where('id',$idAdherent)->first();
         
     }

}