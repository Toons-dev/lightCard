<?php ob_start(); ?>

<h1>Contact</h1>
<?php if (!$formValid): ?>

    <?= $errors; ?>
    <!-- formulaire -->
    <?= $formulaireHtml; ?>

<?php else: ?>

    <p>Votre demande à bien été prise en compte.</p>

<?php endif; ?>

<?php $content = ob_get_clean() ?> <?php view('template', compact('content')); ?>