<?php 
// Une fois créer, l'utilisateur peut se connecter ici
ob_start(); 
?>
<div class="row">
    <div class="col-8">
    <h1>Connectez vous à votre espace</h1>
        <?php if (!$formValid): ?>
        <?= $errors; ?>
        <!-- formulaire -->
        <?= $formulaireHtml; ?>

        <?php else: ?>
        <p>Le couple email / mot de passe est incorrect, recommencez ou veillez d'abord à vous inscrire.</p>
        <a class="connect" href="<?= url('connexion') ?>">Inscrivez vous ici</a>
        <?php endif; ?>
    </div>
</div>


<?php $content = ob_get_clean() ?> <?php view('template', compact('content')); ?>