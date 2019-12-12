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
                <a href="<?= BASE_URL; ?>">
                    <img src="<?= img_url('logoBlancLong.png'); ?>" style="width: 140px;" alt="Logo LightCards">
                </a>
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
                            <li class="nav-item">
                            <a class="astyle nav-link" href="<?= url('connexion') ?>">Connexion</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="astyle nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Catégorie</a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="astyle dropdown-item" href="#">Action</a>
                                    <a class="astyle dropdown-item" href="#">Another action</a>
                                <div class="dropdown-divider"></div>
                                    <a class="astyle dropdown-item" href="#">Something else here</a>
                                </div>
                            </li>
                        </ul>
                        <form class="form-inline my-2 my-lg-0">
                            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
                        </form>
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
            <div class="container">
            <p>LightCards 2019 &copy; </p>
            </div>
        </footer>
        <script src="<?= js_url('jquery-3.4.1.min.js'); ?>"></script>
        <script src="<?= js_url('bootstrap.min.js'); ?>"></script>
        <script src="<?= js_url('script.js'); ?>"></script>
    </body>
</html>
