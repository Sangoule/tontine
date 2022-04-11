<?php 
namespace App\Models;
use CodeIgniter\Model;

class TontineModel extends Model{
    protected $table="tontine";
    protected $allowedFields=["label","periodicite","dateDeb","nbEcheance","idResponsable"];
    function tontine($idTontine){
        return $this->find($idTontine);
    }
    function listeTontineAdherent($idAdherent){
        return $this->where('idResponsable',$idAdherent)->findAll();
    }
}