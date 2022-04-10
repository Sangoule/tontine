
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title><?= $titre ?></title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/starter-template/">

    

    <!-- Bootstrap core CSS -->
	<?= link_tag("css/bootstrap.min.css") ?>

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="starter-template.css" rel="stylesheet">
  </head>
  <body>
    
<div class="col-lg-8 mx-auto p-3 py-md-5">


  <main>
    
    <div class="row g-5">
    <div class="col-12">
    <h1 class="mb-3">Créer un compte</h1>
    <?php if(isset($validation)):?>
     <div class="row alert alert-danger">
       <?= $validation->listErrors();?>
     </div>    
     <?php endif;?>
     <?php if(session()->get('success')):?>
        <div class="alert-success alert" role="alert">
            <?= session()->get('success')?>
        </div>
    <?php endif ?>
      
        <form method="post" class="needs-validation" >
          <div class="row g-3">
            <div class="col-sm-6">
              <label for="label" class="form-label">Label</label>
              <?= form_input(['name'=>'label','class'=>"form-control",'placeholder'=>"Saisir le label",'value'=>set_value("label")]) ?>
            </div>
            <div class="col-sm-6">
              <label for="label" class="form-label">Periodicite</label>
              <?= form_dropdown('periodicite',$periodicite,set_value("periodicite"),['class'=>"form-control"]) ?>
            </div>
            <div class="col-sm-6">
              <label for="dateDeb" class="form-label">Date de debut</label>
              <?= form_input(['name'=>'dateDeb','class'=>"form-control",'placeholder'=>"jj/mm/AAAA",'value'=>set_value("dateDeb")]) ?>
            </div>
            <div class="col-sm-6">
              <label for="nbEcheance" class="form-label">Nombre Echeance</label>
              <?= form_dropdown('nbEcheance',$nbEcheance,set_value("nbEcheance"),['class'=>"form-control"]) ?>
            </div>           
          <hr class="my-4">
          <?= form_submit(['name'=>'ajouter','class'=>"w-100 btn btn-primary btn-lg",'value'=>"Ajouter"]) ?>
        </form>
      </div>
      </div>
 
    </main>
  
</div>


