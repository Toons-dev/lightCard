<?php 
// Page de connexion d'un utilisateur
ob_start(); ?>

<div class="row">
    <div class="col-12 col-md-6">
    <h1>Vous n'avez pas de compte ?</h1>
        <?php if (!$formValid): ?>
        <?= $errors; ?>
        
        <?= $formulaireHtml; ?>

        <?php else: ?>
        <p>Votre demande à bien été prise en compte.</p>
        <?php endif; ?>
    </div>

        <div style="height: 500px;" class="row align-items-center justify-content-center col-12 col-md-6 ">
                <h2>Biensûr que si ! <br><br> <a class="lien" href="<?= url('login') ?>"> Connectez vous </a></h2>
        </div>

</div>


<?php $content = ob_get_clean() ?> <?php view('template', compact('content')); ?>