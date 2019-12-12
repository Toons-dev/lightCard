<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <title><?= isset($title) ? $title : WEBSITE_TITLE ?></title>

        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link href="<?= css_url('style.css'); ?>" rel="stylesheet">
    </head>
    <body>
        <header>
            <nav class="navbar navbar-expand-lg navbar-dark">
                <div class="container">
                    <a class="navbar-brand" href="<?= BASE_URL; ?>">
                        <img src="<?= img_url('logoBlacLeft.png'); ?>" style="width: 130px;" alt="">
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarText">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item">
                                <a class="navbutton" href="<?= url('explorer') ?>">Explorer</a>
                            </li>
                            <li class="nav-item">
                                <a class="navbutton" href="<?= url('connexion') ?>">Connexion</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>

        <main role="main">
        <div class="album py-5">
            <div class="container" style="color: white;">
                <?php
                    // contenu de la page
                    echo $content; 
                ?>
            </div>
        </div>
        </main>

        <footer style="background-color: black;">
            <div class="container">
            <p class="float-right">
                
            </p>
            <p>2019 &copy; </p>
            </div>
        </footer>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="<?= js_url('script.js'); ?>"></script>
    </body>
</html>
