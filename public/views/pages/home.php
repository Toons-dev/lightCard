<?php $title = 'Accueil'; ?>
<?php ob_start(); ?>

<h1>Bienvenue !</h1>

<p>
    <?= $data ?>
</p>

<?php $content = ob_get_clean() ?> <?php view('template', compact('content')); ?>