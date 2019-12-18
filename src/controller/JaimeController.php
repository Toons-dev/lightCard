<?php 
    class JaimeController {

        public function Jaime($id_fiche) {
            // appel a la BDD 
            Like::save([
                'usr_id' => $_SESSION['usr_connexion']['usr_id'],
                'f_id' => $id_fiche
            ]);
            redirectTo('userhome');
        }

    }