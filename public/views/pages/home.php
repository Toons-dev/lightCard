<?php $title = 'Accueil'; ?>
<?php ob_start(); ?>

<h1><?= $data ?></h1>

<?php $content = ob_get_clean() ?> <?php view('template', compact('content')); ?>