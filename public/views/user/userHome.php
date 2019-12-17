<?php 
// Une fois connecté, l'utilisateur a ici accès à son espace personel
ob_start(); ?>
    <div>
        <h1>Bonjour <?= $_SESSION['usr_connexion']['usr_firstname'] ?>,</h1>
    </div>
    
    <?php if(isset($fiches)): ?>
    <h2>Vous pouvez gérer vos publications</h2>
    <div class="row">
        <?php foreach($fiches as $fiche): ?>
            <div class="col-12 col-md-6 col-lg-2 ficheUser">
                    <div class="text">
                        <h6><?= resume($fiche['f_titre'], 30) ?></h6>
                        <p><?= $fiche['cat_name'] ?></p>
                        <p><?= $fiche['f_date'] ?></p>
                        <a class="lien" href="<?= url('fiche/'.$fiche['f_id']) ?>">Aperçu</a>
                        <a class="lien" href="<?= url('fiche/delete'.$fiche['f_id']) ?>">Supprimer</a>
                    </div>
            </div>
        <?php endforeach; ?>
    </div>
    <?php endif; ?>

    <h2>Créer une nouvelle lightCards</h2>
    <div class="row ficheUser">
        <?php if (!$formValid): ?>
        <?= $errors; ?>
        <!-- formulaire -->
        <?= $formulaireHtml; ?>

        <?php else: ?>
        <p>Votre fiche à bien été prise en compte</p>
        <?php endif; ?>
    </div>

    <h2>Ou organiser vos cards préférées</h2>
    <div class="ficheUser">
        
    </div>
    
   

<?php $content = ob_get_clean() ?> <?php view('template', compact('content')); ?>