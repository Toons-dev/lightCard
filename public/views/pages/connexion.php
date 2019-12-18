<?php 
// Page de connexion d'un utilisateur
ob_start(); ?>

<div class="row">
    <div class="col-12 col-md-6">
    <h1>Créez votre compte</h1>
        <?php if (!$formValid): ?>
        <?= $errors; ?>
        
        <?= $formulaireHtml; ?>

        <?php else: ?>
        <p>Votre compte n'a pas été créé.</p>
        <a class="connect" href="<?= url('connexion') ?>">Enregistrez-vous ici</a>
        <?php endif; ?>
    </div>

        <div style="height: 500px;" class="row align-items-center justify-content-center col-12 col-md-6 ">
                <h2 style="text-align: center;">Si vous avez déjà un compte, <a class="lien" href="<?= url('login') ?>">connectez vous.</a>
        </div>

</div>


<?php $content = ob_get_clean() ?> <?php view('template', compact('content')); ?>