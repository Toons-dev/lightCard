<?php 
    class JaimeController {

        public function Jaime($id_fiche) {
            
            $data = Like::noDoubleLike($id_fiche, $_SESSION['usr_connexion']['usr_id']);

            // appel a la BDD 
            if(empty($data)) {
                Like::save([
                    'usr_id' => $_SESSION['usr_connexion']['usr_id'],
                    'f_id' => $id_fiche
                ]);
            } 
            
            redirectTo('userhome');
        }


    }