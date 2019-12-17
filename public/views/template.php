<?php // Page de template, mise en place des header, nav, footer ?>
<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <title><?= isset($title) ? $title : WEBSITE_TITLE ?></title>

        <!-- Bootstrap core CSS -->
        <link href="<?= css_url('bootstrap.min.css'); ?>" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Libre+Baskerville|Roboto+Mono&display=swap" rel="stylesheet">
        <link href="<?= css_url('style.css'); ?>" rel="stylesheet">
    </head>
    <body>
        <header>
                <div style="padding-right: 30px; padding-left: 10px;" class="row justify-content-between">
                    <a href="<?= BASE_URL; ?>">
                        <img class="titreHome" src="<?= img_url('logoBlancLong.png'); ?>" style="width: 140px;" alt="Logo LightCards">
                    </a>
                </div>
            <div class="menu d-flex justify-content-end">
                <nav class="navbar navbar-expand-lg">

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon">+</span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item active">
                                <a class="astyle nav-link" href="<?= url('explorer') ?>">Explorer<span class="sr-only">(current)</span></a>
                            </li>
                            <?php if(!isset($_SESSION['usr_connexion'])):  ?>
                            <li class="nav-item">
                                <a class="astyle nav-link" href="<?= url('connexion') ?>">Inscription</a>
                            </li>
                            <?php endif; ?>

                            <li class="nav-item dropdown">
                                <a class="astyle nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Catégorie</a>
                                <div class="dropdown-menu" style="background-color: black; border:1px solid white;" aria-labelledby="navbarDropdown">
                                    <?php 
                                    $categories = Categorie::findAll();
                                    foreach($categories as $categorie): ?>
                                    <a class="dropdown-item" style="color:grey;" href="<?= url('categorie/'.$categorie['cat_id']) ?>"><?= $categorie['cat_name'] ?></a>
                                    <?php endforeach; ?>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="<?= url('categories') ?>">Toutes les catégories</a>
                                </div>
                            </li>
                        </ul>
                        <form action="<?= url('search') ?>" method="get" class="form-inline my-2 my-lg-0">
                            <input name="search" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
                        </form>
                        <?php if(isset($_SESSION['usr_connexion'])): ?>
                            <a class="connect" href="<?= url('userhome') ?>">Compte</a>
                            <a class="connect" href="<?= url('logout') ?>">Me Déconnecter</a>
                        <?php else : ?>
                            <a class="connect" href="<?= url('login') ?>">Connexion</a> 
                        <?php endif; ?>
                    </div>
                </nav>
            </div>
        </header>

        <main role="main">
        <div class="album py-5">
            <div class="container">
                <?php
                    // contenu de la page
                    echo $content; 
                ?>
            </div>
        </div>
        </main>

        <footer>
            <div class="row">
                <div class="col-12 col-md-5">
                    <h6>LightCards 2019 &copy; </h6>
                    <h6 style="color: grey">All rights reserved</h6>
                </div>
                <div class="col-12 col-md-7">
                    <h6>Suivez-nous sur les réseaux sociaux</h6>
                    <a class="lien" href="https://www.facebook.com/">Facebook</a>
                    <a class="lien" href="https://www.behance.net/">Behance</a>
                    <a class="lien" href="https://www.instagram.com/?hl=fr">Instagram</a>
                    <a class="lien" href="https://www.twitter.com/">Twitter</a>
                </div>
            </div>
        </footer>
        <script src="<?= js_url('jquery-3.4.1.min.js'); ?>"></script>
        <script src="<?= js_url('bootstrap.min.js'); ?>"></script>
        <script src="<?= js_url('script.js'); ?>"></script>
    </body>
</html>
