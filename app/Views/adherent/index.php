<h1>Bienvenue <?= session()->get('prenom') .' ' .session()->get('nom')?></h1>
<p class="fs-5 col-md-8">
    vous pouvez gerer vos tontine, adherer aux tontines disponibles, créer de nouvelles tontines, ...
</p>
<h2>les tontines gérées
    <a href="<?= base_url()?>/adherent/ajouterTontine" class="btn btn-success"> Nouvelle Tontine</a>
</h2>
<?php if(session()->get("success ajout de tontine")):?>
     <div class="row alert alert-success">
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
    if(!$listeTontineResp):
    ?>
    <tr>
        <td colspan="5" class="table-danger text-center">Aucune tontine gérée pour l'instant </td>
    </tr>
    <?php //si au moins une tontine est gérée
        else :
        foreach($listeTontineResp as $tontine):
            ?>
           <tr>
        <td><?= $tontine['label']?></td>
        <td><?= $tontine['periodicite']?></td>
        <td><?= date_format(date_create($tontine['dateDeb']),"d M Y") ?></td>
        <td><?= $tontine['nbEcheance']?></td>
        <td>
            <a href="<?= base_url()?>/adherent/modifierTontine/<?= $tontine['id']?> " class="btn btn-warning">Modifier</a>
            <a href="<?= base_url()?>/adherent/suprimerTontine/<?= $tontine['id']?>" class="btn btn-danger">Suprimer</a>
            <a href="<?= base_url()?>/adherent/participantTontine/<?= $tontine['id']?>" class="btn btn-warning">Participants</a>
        </td>
    </tr>
          <?php endforeach; ?>
     <?php 
    endif;
    ?>  
    
</table>