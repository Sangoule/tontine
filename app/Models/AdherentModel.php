<?php 
namespace App\Models;
use CodeIgniter\Model;

class AdherentModel extends Model{
    protected $table="adherent";
    protected $allowedFields=["id","prenom","nom","login","motPasse","profil"];
    function participer($idTontine){
        return $this->join("participer as p","p.idAdherent=adherent.id")->join("tontine as t","t.id=p.idTontine")->where("t.id=",$idTontine)->findAll();
    }
}