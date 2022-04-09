
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Starter Template · Bootstrap v5.1</title>

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
    <h1>Entrer votre login et le mot de passe</h1>
    
    <form>
       

        <div class="form-floating">
          <input type="text" name="login" class="form-control" id="login" placeholder="Entrer le login">
          <label for="login">login</label>
        </div>
        <div class="form-floating">
          <input type="password" name="password" class="form-control" id="MotPasse" placeholder="Entrer le mot de passe">
          <label for="MotPasse">Mot de passe</label>
        </div>
        <button class="w-100 btn btn-lg btn-primary" type="submit">Se connecter</button>
       
   </form>

  </main>
  
</div>


<?= script_tag("js/bootstrap.bundle.min.js") ?>

      
  </body>
</html>
