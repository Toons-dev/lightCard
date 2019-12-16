<?php ob_start(); ?>
    <h1>Bonjour</h1>
    <a href="<?= url('logout') ?>">Me déconnecter</a>
   

<?php $content = ob_get_clean() ?> <?php view('template', compact('content')); ?>