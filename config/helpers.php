<?php
//Fonction permettant de rediriger  l'utilisateur plus facilement
function redirectTo($route) {
    Header('Location: ' . url($route));
}
// Fonction de mise en forme d'un url
function url($route) {
    return BASE_URL . '/'. $route;
}
// Fonction de mise en forme d'une source
function img_url($img) {
    return BASE_URL . '/public/assets/img/' . $img;
}
// Fonction de mise en forme d'une source
function css_url($css) {
    return BASE_URL . '/public/assets/css/' . $css;
}
// Fonction de mise en forme d'une source 
function js_url($js) {
    return BASE_URL . '/public/assets/js/' . $js;
}
// Fonction de mise en forme d'un url
function public_url($url) {
    return BASE_URL . '/public/' . $url;
}
// Permet de rendre 'SLUG' une chaine de caractère
function slugify($text) {
    
    // replace non letter or digits by -
    $text = preg_replace('~[^\pL\d]+~u', '-', $text);

    // transliterate
    $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

    // remove unwanted characters
    $text = preg_replace('~[^-\w]+~', '', $text);

    // trim
    $text = trim($text, '-');

    // remove duplicate -
    $text = preg_replace('~-+~', '-', $text);

    // lowercase
    $text = strtolower($text);

    if (empty($text)) {
        return 'n-a';
    }

    return $text;
}

function view($path, $vars = null, $include = true) {

    // Format : resource.page

    $pathArray = explode('.', $path);

    $url = '';

    foreach($pathArray as $p) {
        $url .= $p . '/';
    }

    $url = substr($url, 0, -1);

    $url .= '.php';

    $fullUrl = 'public/views/' . $url;

    if ($include) {

        if ($vars) { extract($vars); }
        include($fullUrl);
    }

    return $fullUrl;

}
// Création d'une fonction permettant de raccourcir la taille d'une chaine de caractère
function resume($string, $max = 250) {

    if(strlen($string) <= $max) {
        return $string;
    } else {
        return substr($string, 0, $max).'...';
    }

} 
