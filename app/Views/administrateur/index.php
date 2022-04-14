<h1>Bienvenue <?= session()->get('prenom') .' ' .session()->get('nom')?></h1>
<p class="fs-5 col-md-8">
    vous pouvez voir les statistiques: <br>
    nombre de participants et nombre de tontines.
</p>

<hr>

<div class="row">
    <div class="card text-white bg-info col-4" >
        <div class="card-header">le nombre de participants</div>
            <div class="card-body">
                <h4 class="card-title">Il y'a <?= $nbA ?> participants</h4>
            </div>
        </div>
    </div>
    <br>
    <hr>
    <div class="card text-white bg-success col-4" >
        <div class="card-header">le nombre de tontines</div>
            <div class="card-body">
                <h4 class="card-title">Il y'a <?= $nbB ?> tontines</h4>
            </div>
        </div>
    </div>
</div>