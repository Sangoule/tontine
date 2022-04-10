
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
              <label for="firstName" class="form-label">Prénom</label>
              <input type="text" name="prenom" class="form-control" id="firstName" placeholder="Saisir le prénom" value="<?= set_value("prenom")?>" >
              <div class="invalid-feedback">
                le prénom est obligatoire
              </div>
            </div>

            <div class="col-sm-6">
              <label for="lastName" class="form-label">Nom</label>
              <input type="text" name="nom" class="form-control" id="lastName" placeholder="Saisir le nom" value="<?= set_value("prenom")?>" >
              <div class="invalid-feedback">
                le nom est obligatoire
              </div>
            </div>

            <div class="col-12">
              <label for="login" class="form-label">login</label>
              <input type="text" name="login"  class="form-control" id="login" placeholder="Saisir le login" value="<?= set_value("login")?>" >
              <div class="invalid-feedback">
                le login est obligatoire
              </div>
            </div>
            <div class="col-sm-6">
              <label for="motPasse" class="form-label">Mot de passe</label>
              <input type="password" name="motPasse" class="form-control" id="motPasse" placeholder="Saisir le mot de passe" value="" >
              <div class="invalid-feedback">
              le mot de passe est obligatoire
              </div>
            </div>

            <div class="col-sm-6">
              <label for="motPasseConf" class="form-label">Confirmation du mot de passe</label>
              <input type="password" name="motPasseConf" class="form-control" id="motPasseConf" placeholder="Confirmer le mot de passe" value="" >
              <div class="invalid-feedback">
                la Confirmation est obligatoire
              </div>
            </div>
          <hr class="my-4">

          <button class="w-100 btn btn-primary btn-lg" type="submit">S'inscrire</button>
        </form>
      </div>
      </div>
 
    </main>
  
</div>


<?= script_tag("js/bootstrap.bundle.min.js") ?>
<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
(function () {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  var forms = document.querySelectorAll('.needs-validation!')

  // Loop over them and prevent submission
  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      }, false)
    })
})()
</script>
      
  </body>
</html>
