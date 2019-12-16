<?php $title = 'Accueil'; ?>
<?php ob_start(); ?>

<h1 style="margin-bottom: 150px;"><?= $data ?></h1>

<?php $content = ob_get_clean() ?> <?php view('template', compact('content')); ?>