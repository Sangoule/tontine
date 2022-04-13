<?php 
namespace App\Models;
use CodeIgniter\Model;
use App\Models\AdherentModel;

class CotiseModel extends Model{
    protected $table="cotiser";
    protected $allowedFields=["idAdherent","idEcheance"];
    function listeTontineCotiser($idAdherent){
        $this->where('idAdherent',$idAdherent);
        $this->where('idEcheance',$idEcheance)->findAll();
   }
   function cotiser($idAdherent){
      
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
}