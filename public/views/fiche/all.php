<?php 
// Page de présentation de toutes les lightCards
ob_start(); 
?>

<h1>Bienvenue !</h1>

<?php $content = ob_get_clean() ?> 
<?php view('template', compact('content')); ?>