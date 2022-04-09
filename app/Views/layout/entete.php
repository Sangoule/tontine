<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Starter Template · Bootstrap v5.1</title>

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
<header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
      <a href="<?= base_url() ?>" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
        <?= img('img/logo.png'); ?>
      </a>

      <ul class="nav nav-pills">
        <li class="nav-item"><a href="<?= base_url() ?>" class="nav-link active" aria-current="page">Accueil</a></li>
        <li class="nav-item"><a href="<?= base_url() ?>/utilisateur/index" class="nav-link">Inscription</a></li>
        <li class="nav-item"><a href="<?= base_url() ?>/utilisateur/inscription" class="nav-link">connexion </a></li>
        <li class="nav-item"><a href="<?= base_url() ?>/utilisateur/presentation" class="nav-link">About</a></li>
      </ul>
    </header>

  <main>