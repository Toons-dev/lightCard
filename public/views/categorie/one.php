<?php 
// Page d'affichage d'une catégorie selon son ID
ob_start(); ?>

<h1><?= $categorie['cat_name'] ?></h1>

<div class="row">
    <?php foreach($fiches as $fiche): ?>
        <div class="col-12 col-md-6 col-lg-4 fiche">
            <a href="<?= url('fiche/'.$fiche['f_id']) ?>"> <img src="<?= $fiche['f_media'] ?>" alt="" style="width: 100%;"> </a>
                <div class="text">
                    <h2><?= $fiche['f_titre'] ?></h2>
                    <p><?= $fiche['cat_name'] ?></p>
                    <p><?= resume($fiche['f_texte']) ?></p>
                    <p><?= $fiche['f_date'] ?></p>
                    <a class="lienExt" href="<?= $fiche['f_link'] ?>"><?= resume($fiche['f_link'], 20) ?></a><br>
                    <a class="lien" href="<?= url('fiche/'.$fiche['f_id']) ?>">Découvrir</a><br>
                    <?php if(isset($_SESSION['usr_connexion'])): ?>
                        <a class="lienFav" href="<?= url('like/'.$fiche['f_id']) ?>">Ajouter aux Favoris</a>
                    <?php endif; ?>
                </div>
        </div>
    <?php endforeach; ?>
</div>


<?php $content = ob_get_clean() ?> 
<?php view('template', compact('content')); ?>