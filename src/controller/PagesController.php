<?php

// PagesController.php

class PagesController {

    /* Page d'acceuil  */ 
    public function home() {

        // données à récuperer de mon model 
        $data = 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro nobis similique sunt nostrum! Assumenda perferendis itaque sint maiores ea totam nobis esse temporibus! Consectetur necessitatibus eligendi consequuntur at eum veritatis?';

        view('pages.home', compact('data'));
    }

    public function about() {

        view('pages.about');
    }

    public function contact() {

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
        view('pages.contact', compact('formulaireHtml', 'errors', 'formValid'));
    }
    
    public function page404() {

        view('pages.404');

    }

}