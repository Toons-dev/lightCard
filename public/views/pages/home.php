<?php $title = 'Accueil'; ?>
<?php 
// Page d'accueil du site, slogan. 
ob_start(); ?>

<h1 style="margin-bottom: 150px;"><?= $data ?></h1>

<?php $content = ob_get_clean() ?> <?php view('template', compact('content')); ?>