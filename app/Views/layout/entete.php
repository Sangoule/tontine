<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title><?= $titre ?></title>

    <!-- Bootstrap core CSS -->
	<?= link_tag("css/bootstrap.min.css") ?>
    <!-- Favicons -->
    <link rel="apple-touch-icon" href="/docs/5.1/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
    <link rel="icon" href="/docs/5.1/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="/docs/5.1/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
    <link rel="manifest" href="/docs/5.1/assets/img/favicons/manifest.json">
    <link rel="mask-icon" href="/docs/5.1/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
    <link rel="icon" href="/docs/5.1/assets/img/favicons/favicon.ico">
    <meta name="theme-color" content="#7952b3">


    <style>
      
       #footer{
            display: block;
            
            background-color: #000022;
            height: 100px;
            width:100%;
            position: absolute;
            bottom: 0;
        }

        #footer p{
            text-align: center;
            padding-top: 30px;
            color: rgb(220, 219, 231);
            font-weight: bold;
            margin-left: 10px;
            margin-right: 10px;
        }
      .form-signin {
          width: 100%;
          max-width: 330px;
          padding: 15px;
          margin: auto;
        }

        .form-signin .checkbox {
          font-weight: 400;
        }

        .form-signin .form-floating:focus-within {
          z-index: 2;
        }

        .form-signin input[type="email"] {
          margin-bottom: -1px;
          border-bottom-right-radius: 0;
          border-bottom-left-radius: 0;
        }

        .form-signin input[type="password"] {
          margin-bottom: 10px;
          border-top-left-radius: 0;
          border-top-right-radius: 0;
        }
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
  <nav class="navbar d-flex flex-wrap navbar-expand-lg navbar-light bg-light ">
  <div class="container-fluid">
      <a href="<?= base_url() ?>" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
        <?= img('img/logo1.png'); ?>
      </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor03">
    <?php if(session()->get("profil")=="adherent"): ?>
    <ul class="nav nav-pills">
        <li class="nav-item me-sm-2"><a href="<?= base_url() ?>/adherent" class="nav-link <?= $menuActif=="adherentAcc"?"active":"" ?>" aria-current="page">Accueil</a></li>
        <li class="nav-item"><a href="<?= base_url() ?>/adherent/adhesion" class="nav-link <?= $menuActif=="adhesion"?"active":"" ?> ">Adhesion</a></li>
        <li class="nav-item"><a href="<?= base_url() ?>/utilisateur/deconnexion" class="nav-link" >Déconnexion </a></li>
    </ul>
  <?php elseif (session()->get("profil")=="adminitrateur"): ?>
    <ul class="nav nav-pills ">
        <li class="nav-item"><a href="<?= base_url() ?>/administrateur" class="nav-link <?= $menuActif=="administrateurAcc"?"active":"" ?>" aria-current="page">Accueil</a></li>
        <li class="nav-item"><a href="<?= base_url() ?>/adherent/gestion" class="nav-link <?= $menuActif=="gestionUtilisateurs"?"active":"" ?> ">gestion</a></li>
        <li class="nav-item"><a href="<?= base_url() ?>/utilisateur/deconnexion" class="nav-link`" >Déconnexion </a></li>
    </ul>
    <?php else : ?>
      <ul class="nav nav-pills">
        <li class="nav-item"><a href="<?= base_url() ?>" class="nav-link <?= $menuActif=="accueil"?"active":"" ?>" aria-current="page">Accueil</a></li>
        <li class="nav-item"><a href="<?= base_url() ?>/utilisateur/inscription" class="nav-link <?= $menuActif=="inscription"?"active":"" ?> ">Inscription</a></li>
        <li class="nav-item"><a href="<?= base_url() ?>/utilisateur/index" class="nav-link <?= $menuActif=="connexion"?"active":"" ?>" >connexion </a></li>
        <li class="nav-item"><a href="<?= base_url() ?>/utilisateur/presentation" class="nav-link <?= $menuActif=="presentation"?"active":"" ?>">About</a></li>
      </ul>
      <?php endif ?>
    </div>
  </div>
</nav>
    <!-- fir -->
<div class="col-lg-8 mx-auto p-3 py-md-5">
<!-- <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
      <a href="<?= base_url() ?>" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
        <?= img('img/logo.png'); ?>
      </a>
<?php if(session()->get("profil")=="adherent"): ?>
    <ul class="nav nav-pills">
        <li class="nav-item"><a href="<?= base_url() ?>/adherent" class="nav-link <?= $menuActif=="adherentAcc"?"active":"" ?>" aria-current="page">Accueil</a></li>
        <li class="nav-item"><a href="<?= base_url() ?>/adherent/adhesion" class="nav-link <?= $menuActif=="adhesion"?"active":"" ?> ">Adhesion</a></li>
        <li class="nav-item"><a href="<?= base_url() ?>/utilisateur/deconnexion" class="nav-link" >Déconnexion </a></li>
    </ul>
  <?php elseif (session()->get("profil")=="adminitrateur"): ?>
    <ul class="nav nav-pills">
        <li class="nav-item"><a href="<?= base_url() ?>/administrateur" class="nav-link <?= $menuActif=="administrateurAcc"?"active":"" ?>" aria-current="page">Accueil</a></li>
        <li class="nav-item"><a href="<?= base_url() ?>/adherent/gestion" class="nav-link <?= $menuActif=="gestionUtilisateurs"?"active":"" ?> ">gestion</a></li>
        <li class="nav-item"><a href="<?= base_url() ?>/utilisateur/deconnexion" class="nav-link`" >Déconnexion </a></li>
    </ul>
    <?php else : ?>
      <ul class="nav nav-pills">
        <li class="nav-item"><a href="<?= base_url() ?>" class="nav-link <?= $menuActif=="accueil"?"active":"" ?>" aria-current="page">Accueil</a></li>
        <li class="nav-item"><a href="<?= base_url() ?>/utilisateur/inscription" class="nav-link <?= $menuActif=="inscription"?"active":"" ?> ">Inscription</a></li>
        <li class="nav-item"><a href="<?= base_url() ?>/utilisateur/index" class="nav-link <?= $menuActif=="connexion"?"active":"" ?>" >connexion </a></li>
        <li class="nav-item"><a href="<?= base_url() ?>/utilisateur/presentation" class="nav-link <?= $menuActif=="presentation"?"active":"" ?>">About</a></li>
      </ul>
      <?php endif ?>
</header> -->

  <main class="<?= $menuActif=="connexion"?"form-signin text-center":"" ?>">