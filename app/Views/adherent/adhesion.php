<h1>Adherer a une tontine</h1>
<p class="fs-5 col-md-8">
    vous pouvez adherer aux tontines suivantes
</p>
<h2>les tontines disponibles</h2>
<?php if(session()->get('success ajout Adhesion')) : ?>
     <div class="row alert alert-success">
       <?= session()->get('success ajout Adhesion');?>
     </div>
<?php endif; ?>
<table class="table">
    <tr>
        <th>label</th>
        <th>periodicite</th>
        <th>dateDeb</th>
        <th>Nombre d'Echeance</th>
        <th>Action</th>
    </tr>
    <?php 
    if(!$listeTontines):
    ?>
    <tr>
        <td colspan="5" class="table-danger text-center">Aucune tontine gérée pour l'instant </td>
    </tr>
    <?php //si au moins une tontine est gérée
        else :
        foreach($listeTontines as $tontine):
            ?>
           <tr>
        <td><?= $tontine['label']?></td>
        <td><?= $tontine['periodicite']?></td>
        <td><?= date_format(date_create($tontine['dateDeb']),"d M Y") ?></td>
        <td><?= $tontine['nbEcheance']?></td>
        <td>
            <a href="<?= base_url()?>/adherent/adhererTontine/<?= $tontine['id']?> " class="btn btn-warning">adherer</a>
            
        </td>
    </tr>
          <?php endforeach; ?>
     <?php 
    endif;
    ?>  
    
</table>