<?php

// PagesController.php

class PagesController {

    // Page d'acceuil lightCards  */ 
    public function home() {

        // J'envoie la variable data à mon model
        $data = 'Bienvenue sur la plateforme Lightcards, Développez et partagez vos connaissances en toute simplicité.';
        view('pages.home', compact('data'));
    }
    // Page d'exploration random
    public function explorer() {
        // J'affiche 9 fiches au hasard
        $fiches = Fiche::findAll();
        $categorieName = Fiche::convertId($fiche['f_cat_id']);
        var_dump($categorieName);
        view('pages.about', compact('fiches'));  
    }

    
    // En cas d'erreur d'url
    public function page404() {

        view('pages.404');

    }

}