<h1>Detail  <?= $maTontine['label']?></h1>
<a class="btn btn-success" href="<?= base_url().'/adherent'?>"> Revenir à la liste</a>
<hr>

<div class="card md-3">
    <div class="card-header">
        Description <?= $maTontine['label'] ?>
    </div>
    <div class="card-body">
        <p class="card-title">
            Debut : <?= date_format(date_create($maTontine['dateDeb']), "d/m/Y") ?>
        </p>
        <p>
            Nombre d'echeance prevu : <?= $maTontine['nbEcheance'] ?> échéances
            <?php if (!$echeances) : ?>
                <a href="<?= base_url() ?>/adherent/genererEcheance/<?= $maTontine['id'] ?>" class="btn btn-success">Générer</a>
            <?php endif; ?>
        </p>
        <p>
            <?php foreach ($echeances as $echeance) : ?>
                <span class="badge rouded-pill bg-primary"> <?= date_format(date_create($echeance['date']), "d/m/Y") ?></span>
            <?php endforeach; ?>
        </p>
        <?php if (session()->get('successAjEcheance')) : ?>
            <div class="alert-success alert" role="alert">
                <?= session()->get('successAjEcheance') ?>
            </div>
        <?php endif ?>
    </div>
</div>
<div class="card ">
    <div class="card-header">
        les participants 
    </div>
    <div class="card-body">
        <?php if(!$participants) : ?>
            <p>Aucun participant pour l'instant</p>
        <?php else: ?>
            <ul class="list-group">
            <?php foreach($participants as $participants) :?>
                    <li class="list-group-item">
                        <h5><?= $participants['prenom']." ".$participants['nom'] ?></h5>
                        <p>Cotisation <?= $participants['montant']?> CFA</p>
                    </li>

            <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </div>
</div>