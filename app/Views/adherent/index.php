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
<tr class="table-dark">
      <th scope="row">label</th>
      <th>periodicite</th>
      <th>date de Debut</th>
      <th>Nombre d'Echeance</th>
      <th>Cotisations</th>
      <th>...</th>
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
        <?php $i=0;$k=0;
        if (isset($cotisations[$tontine["idResponsable"]])) : 
            for($i=0;$i<$cotisations[$tontine["idResponsable"]];$i++):
        ?>

        <?php foreach($echeances as $echeance): $k++;?>
        
        <?php  if(($tontine["id"])==$echeance["idTontine"]) : ?>
            <span class="badge rounded-pill bg-success">
            <?= date_format(date_create($echeance["date"]),"d/m/Y");?>
        <?php endif;?>
            </span>
        <?php if($k>$tontine["id"]):
        break;
                endif;?>
                <?php endforeach;?>
        <?php endfor;?>
        <?php endif;?>
                    
        </td>
        <td width="20%">
            <a href="<?= base_url()?>/adherent/modifierTontine/<?= $tontine['id']?> " class="btn btn-warning">Modifier</a>
            <a onclick="return confirm('voulez vous vraiment suprimer la tontine <?= $tontine['label']?> ')" href="<?= base_url()?>/adherent/suprimerTontine/<?= $tontine['id']?>" class="btn btn-danger">Suprimer</a>
            <a href="<?= base_url()?>/adherent/tontine/<?= $tontine['id']?>" class="btn btn-info">Participants</a>
        </td>
    </tr>
          <?php endforeach; ?>
     <?php 
    endif;
    ?>  
    
</table>