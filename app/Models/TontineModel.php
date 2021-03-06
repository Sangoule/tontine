<?php 
namespace App\Models;
use CodeIgniter\Model;

class TontineModel extends Model{
    protected $table="tontine";
    protected $allowedFields=["id","label","periodicite","dateDeb","nbEcheance","idResponsable"];
    function listeTontines($idAdherent){
        //1. recuperer la liste des tontine auxquelles l'adherent participe
        $listPart=$this->builder('participer')->distinct()->select('idTontine')->where('idAdherent',$idAdherent)->get()->getResultArray();

        //2. garder les idTontine dans un tableaux
        $idTon=[];
        foreach($listPart as $tp)
        $idTon[]=$tp['idTontine'];
        //3. Recuperer la liste des tontines sans les tontines deja choisi
        if($idTon)
            $this->whereNotIn("id",$idTon);
        return $this->findAll();
    }
    function tontine($idTontine){
        return $this->find($idTontine);
    }
    function listeTontineAdherent($idAdherent){

        return $this->where('idResponsable',$idAdherent)->findAll();
    }
    /* function listeTontineCotiser($idAdherent,$idEcheance){
         $this->where('idAdherent',$idAdherent);
         $this->where('idEcheance',$idEcheance)->findAll();
    } */
    function listeTontineid($idAdherent){
       $liste= $this->builder('participer')->distinct()->select('idTontine')
        ->where('idAdherent',$idAdherent)->get()->getResultArray();
        $idTon=[];
        if($idTon)
            $this->whereNotIn("id",$idTon);
        return $this->findAll();

   }
   function nombreTontine(){
    $nbB= $this->select('id')->get()->getResultArray();
     return count($nbB);
 }
}