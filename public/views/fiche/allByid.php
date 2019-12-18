<?php 
// Page de présentation de toutes les lightcards selon l'id
ob_start(); ?>

        <div class="row col-12 fiche">
            <div class="col-12 col-md-6">
                <img src="<?= $fiche['f_media'] ?>" alt="" style="width:100%;">
            </div>
            
            <div class="col-12 col-md-6 text">
                <h2><?= $fiche['f_titre'] ?></h2>
                <p><?= $fiche['cat_name'] ?></p>
                <p><?= $fiche['f_texte'] ?></p>
                <p><?= $fiche['f_date'] ?></p>
                <a class="lienExt" href="<?= $fiche['f_link'] ?>"><?= resume($fiche['f_link'], 20) ?></a><br>
                <?php if(isset($_SESSION['usr_connexion'])): ?>
                    <a class="lienFav" href="<?= url('like/'.$fiche['f_id']) ?>">Ajouter aux favoris</a>
                <?php endif; ?>
            </div>
        </div>

        <h2>A découvrir aussi</h2>

        <div class="row col-12">
            <?php foreach($otherFiche as $other): ?>   
            <div class="col-6 fiche">
                <div class="row">
                    <div class="col-6">
                        <img src="<?= $other['f_media'] ?>" alt="" style="width:100%;">
                    </div>
                    <div class="col-6">
                        <h5><?= $other['f_titre'] ?></h5>
                        <p><?= $other['cat_name'] ?></p>    
                        <a class="lien" href="<?= url('fiche/'.$other['f_id']) ?>">Découvrir</a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        

<?php $content = ob_get_clean() ?> 
<?php view('template', compact('content')); ?>