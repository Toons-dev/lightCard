<?php ob_start(); ?>

<h1><?= $categorie['cat_name'] ?></h1>

<div class="row">
    <?php foreach($fiches as $fiche): ?>
        <div class="col-12 col-md-6 col-lg-4 fiche">
            <img src="<?= $fiche['f_media'] ?>" alt="" style="width: 100%;">
                <div class="text">
                    <h2><?= $fiche['f_titre'] ?></h2>
                    <p><?= $fiche['f_categorie'] ?></p>
                    <p><?= resume($fiche['f_texte']) ?></p>
                    <p><?= $fiche['f_date'] ?></p>
                    <p><?= $fiche['f_link'] ?></p>
                </div>
        </div>
    <?php endforeach; ?>
    </div>


<?php $content = ob_get_clean() ?> 
<?php view('template', compact('content')); ?>