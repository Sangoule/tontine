<h1>Bienvenue <?= session()->get('prenom') .' ' .session()->get('nom')?></h1>
<p class="fs-5 col-md-8">
    vous pouvez gerer vos tontine, adherer aux tontines disponibles, créer de nouvelles tontines, ...
</p>
<h2>les tontines gérées
    <a href="<?= base_url()?>/adherent/ajouterTontine" class="btn btn-success"> Nouvelle Tontine</a>
</h2>
<?php if(session()->get("success ajout de tontine")):?>
     <div class="row alert alert-danger">
       <?= session()->get("success ajout de tontine")?>
     </div>    
<?php endif;?>
<table class="table">
    <tr>
        <th>label</th>
        <th>periodicite</th>
        <th>dateDeb</th>
        <th>Nombre d'Echeance</th>
        <th>Action</th>
    </tr>
    <?php 
    if(!$listeTontineAdherent):
    ?>
    <tr>
        <td colspan="5" class="table-danger text-center">Aucune tontine gérée pour l'instant </td>
    </tr>
    <?php //si au moins une tontine est gérée
        else : ?>
     <?php 
    endif;
    ?>  
    
</table>