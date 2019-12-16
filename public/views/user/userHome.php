<?php ob_start(); ?>
    <div class="row justify-content-between">
        <h1>Bonjour <?= $_SESSION['usr_connexion']['usr_firstname'] ?>,</h1>
    </div>
    
    <h2>Vous pouvez gérer vos propres fiches</h2>
    <div class="fiche row">
        <?php foreach($fiches as $fiche): ?>
            <div class="col-12 col-md-6 col-lg-4 fiche">
                <img src="<?= $fiche['f_media'] ?>" alt="" style="width: 100%;">
                    <div class="text">
                        <h2><?= $fiche['f_titre'] ?></h2>
                        <p><?= $fiche['f_categorie'] ?></p>
                        <p><?= resume($fiche['f_texte']) ?></p>
                        <p><?= $fiche['f_date'] ?></p>
                        <p><?= $fiche['f_link'] ?></p>
                        <a class="lien" href="<?= url('fiche/'.$fiche['f_id']) ?>">Découvrir</a>
                    </div>
            </div>
        <?php endforeach; ?>
    </div>

    <h2>Créer une nouvelle fiche</h2>
    <div class="fiche">
        <?php if (!$formValid): ?>
        <?= $errors; ?>
        <!-- formulaire -->
        <?= $formulaireHtml; ?>

        <?php else: ?>
        <p>Votre fiche à bien été prise en compte</p>
        <?php endif; ?>
    </div>

    <h2>Ou gérer vos fiches préférées</h2>
    <div class="fiche">
        
    </div>
    
   

<?php $content = ob_get_clean() ?> <?php view('template', compact('content')); ?>