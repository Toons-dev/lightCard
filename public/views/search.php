<?php ob_start(); ?>

<h1>Toutes nos lightCards, à portée de clic.</h1>

    <div class="row">
    <?php foreach($fiches as $fiche): ?>
        <div class="col-12 col-md-6 col-lg-4 fiche">
            <img src="<?= $fiche['f_media'] ?>" alt="" style="width: 100%;">
                <div class="text">
                    <h2><?= $fiche['f_titre'] ?></h2>
                    <p><?= $fiche['cat_name'] ?></p>
                    <p><?= resume($fiche['f_texte']) ?></p>
                    <p><?= $fiche['f_date'] ?></p>
                    <p><?= resume($fiche['f_link'], 20); ?></p>
                    <a class="lien" href="<?= url('fiche/'.$fiche['f_id']) ?>">Découvrir</a>
                    <?php if(isset($_SESSION['usr_connexion'])): ?>
                        <a class="lienFav" href="<?= url('like/'.$fiche['f_id']) ?>">Favoris</a>
                    <?php endif; ?>
                </div>
        </div>
    <?php endforeach; ?>
    </div>




<?php $content = ob_get_clean() ?> 
<?php view('template', compact('content')); ?>