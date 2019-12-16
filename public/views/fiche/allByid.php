<?php ob_start(); ?>

        <div class="row col-12 fiche">

            <div class="col-6">
                <img src="<?= $fiche['f_media'] ?>" alt="" style="width:100%;">
            </div>
            
            <div class="col-6 text">
                <h2><?= $fiche['f_titre'] ?></h2>
                <p><?= $fiche['f_categorie'] ?></p>
                <p><?= resume($fiche['f_texte']) ?></p>
                <p><?= $fiche['f_date'] ?></p>
                <p><?= $fiche['f_link'] ?></p>
                
            </div>



        </div>

<?php $content = ob_get_clean() ?> 
<?php view('template', compact('content')); ?>