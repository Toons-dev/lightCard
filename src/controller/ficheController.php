<?php 
    class FicheController {

        public function one($id) {
            $fiche = Fiche::findOne($id);
            $otherFiche = Fiche::findOther($fiche['f_cat_id']);

            view('fiche.allByid', compact('fiche', 'otherFiche'));
        }

        public function deleteFiche($id) {

            Fiche::delete($id);
            $_SESSION['delete'] = true;
            redirectTo('userhome');
        }

    }