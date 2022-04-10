<?php 
namespace App\Models;
use CodeIgniter\Model;

class TontineModel extends Model{
    protected $table="tontine";
    protected $allowedFields=["label","	periodicite","dateDeb","nbEcheance","idAdherent"];
    function listeTontineAdherent($idAdherent){
        return $this->where('idAdherent',$idAdherent)->findAll();
    }
}