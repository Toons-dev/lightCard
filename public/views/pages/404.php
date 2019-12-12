<?php ob_start(); ?>

<h1>Page 404</h1>

<p>
    La page demandée est indisponible
</p>


<?php $content = ob_get_clean() ?> 
<?php view('template', compact('content')); ?>