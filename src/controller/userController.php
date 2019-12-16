<?php 
    class UserController {

        public function connexion() {

            $form = new Form($_POST);
    
            $form->input('text', "nom", "Nom")->required()
                ->input('text', "prenom", "Prénom")->required()
                ->input('text', "email", "E-mail")->required()
                ->input('password', "password", "Mot de passe")->required()
                ->input('password', "password2", "Confirmation")->required()
                ->submit('enregistrer');
    
            $formulaireHtml = $form->getForm();
    
            $formValid  = false;
            $errors     = false; 
    
            // si le formulaire est validé 
            if($data = $form->valid()){
    
                // formulaire valide
                $formValid = true;

                $userExist = Controle::findOneByMail($_POST['email']);
                // Enregistrement des données
                if($_POST['password'] == $_POST['password2'] && !isset($userExist)) {

                    Controle::save([
                        'usr_lastname' => $_POST['nom'],
                        'usr_firstname' => $_POST['prenom'],
                        'usr_email' => $_POST['email'],
                        'usr_password' => $_POST['password']
                                    ]);
                } else {
                    $errors = 'mauvais mot de passe';
                }
                
    
            } else {
                // affichage des erreurs 
                $errors =  $form->displayErrors();
            }
    
            
            // vue de la page contact 
            view('pages.connexion', compact('formulaireHtml', 'errors', 'formValid'));
        }

        public function login() {
            $form1 = new Form($_POST);
    
            $form1->input('text', "email", "E-mail")->required()
                ->input('password', "password", "Password")->required()
                ->submit('enregistrer');
    
            $formulaireHtml = $form1->getForm();
    
            $formValid  = false;
            $errors     = false; 
    
            // si le formulaire est validé 
            if($data = $form1->valid()){
    
                // formulaire valide
                $formValid = true;
    
                // Enregistrement des données
                $userData = Controle::connect($_POST['email'], $_POST['password']);

                if($userData) {
                    redirectTo('userhome');
                } else {
                    $errors = 'Identifiants incorrectes';
                }
            } else {
                // affichage des erreurs 
                $errors =  $form1->displayErrors();
            }
            // vue de la page login 
            view('user.login', compact('formulaireHtml', 'errors', 'formValid'));
        }

        public function logOut() {
            Controle::logout();
            redirectTo('');
        }

        public function home() {

            if(!isset($_SESSION['usr_connexion'])){
                redirectTo('');
            }

            view('user.userHome');
        }

    }