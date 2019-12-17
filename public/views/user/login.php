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
        <p>Votre demande à bien été prise en compte.</p>
        <?php endif; ?>
    </div>
</div>


<?php $content = ob_get_clean() ?> <?php view('template', compact('content')); ?>