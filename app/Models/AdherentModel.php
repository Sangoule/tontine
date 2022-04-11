<?php 
namespace App\Models;
use CodeIgniter\Model;

class AdherentModel extends Model{
    protected $table="adherent";
    protected $allowedFields=["id","prenom","nom","login","motPasse","profil"];
}