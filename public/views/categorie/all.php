<?php
// Page de présentation de toutes les catégories
ob_start(); ?>

<h1>Retrouvez toutes nos catégories</h1>

    <div class="row">
        <?php foreach($categories as $categorie): ?>
            <div class="col-12 col-md-6 fiche">
                <a href="<?= url('categorie/'.$categorie['cat_id']) ?>"> <img src="<?= $categorie['cat_media'] ?>" alt="" style="width: 100%;"></a>
                    <div class="text">
                        <h2><?= $categorie['cat_name'] ?></h2>
                        
                        <a class="lien" href="<?= url('categorie/'.$categorie['cat_id']) ?>">Découvrir</a>
                    </div>
            </div>
        <?php endforeach; ?>
    </div>

<?php $content = ob_get_clean() ?> 
<?php view('template', compact('content')); ?>