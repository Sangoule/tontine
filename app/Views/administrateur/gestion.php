<h1>Bienvenue <?= session()->get('prenom') .' ' .session()->get('nom')?></h1>
<p class="fs-5 col-md-8">
   liste de utilisateurs
</p>
<table class="table">
    <tr>
        <th>Id</th>
        <th>Prenom</th>
        <th>Nom</th>
        <th>login</th>
        <th>profil</th>
        <th>réinitialiser</th>
    </tr>
    <?php 
    if(!$liste):
    ?>
    <tr>
        <td colspan="5" class="table-danger text-center">Aucune tontine gérée pour l'instant </td>
    </tr>
    <?php //si au moins une tontine est gérée
        else :
        foreach($liste as $Adherent):
            ?>
           <tr>
        <td><?= $Adherent['id']?></td>
        <td><?= $Adherent['nom'] ?></td>
        <td><?= $Adherent['prenom']?></td>
        <td><?= $Adherent['login']?></td>
        <td> <?= $Adherent['profil']?>  </td>
        <td><a href="<?= base_url()?>/admin/reinitialiser/<?= $Adherent['id']?> " class="btn btn-warning">Réinitialiser</a></td>
    </tr>
          <?php endforeach; ?>
     <?php 
    endif;
    ?>  
    
</table>
