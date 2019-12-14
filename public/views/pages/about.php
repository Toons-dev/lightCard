<?php ob_start(); ?>

<h1>Toutes nos lightCards, à portée de clic.</h1>

    <div class="row">
    <?php foreach($fiches as $fiche): ?>
        <div class="fiche">
            <h1><?= $fiche[f_titre] ?></h1>
            <p><?= $fiche[f_categorie] ?></p>
            <p><?= $fiche[f_texte] ?></p>
            <p><?= $fiche[f_date] ?></p>
            <p><?= $fiche[f_link] ?></p>
        </div>
    <?php endforeach; ?>
    </div>




<?php $content = ob_get_clean() ?> 
<?php view('template', compact('content')); ?>