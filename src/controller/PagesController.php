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
        
        view('pages.about', compact('fiches'));  
    }

    public function connexion() {

        $form = new Form($_POST);

        $form->input("select", 'civilite', 'Civilité', [1=>'M', 2=>'Mme', 3=>'Mlle'])->required()
            ->input('text', "nom", "Nom")->required()
            ->input('text', "prenom", "Prénom")->required()
            ->input('text', "email", "E-mail")->required()
            ->input('textarea', "message", "Message")->required()
            ->submit('enregistrer');

        $formulaireHtml = $form->getForm();

        $formValid  = false;
        $errors     = false; 

        // si le formulaire est validé 
        if($data = $form->valid()){

            // formulaire valide
            $formValid = true;

            // Enregistrement des données

        } else {
            // affichage des erreurs 
            $errors =  $form->displayErrors();
        }

        // vue de la page contact 
        view('pages.connexion', compact('formulaireHtml', 'errors', 'formValid'));
    }
    // En cas d'erreur d'url
    public function page404() {

        view('pages.404');

    }

}