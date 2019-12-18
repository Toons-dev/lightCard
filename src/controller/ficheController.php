<?php 
    class FicheController {

        public function one($id) {
            $fiche = Fiche::findOne($id);
            $otherFiche = Fiche::findOther($fiche['f_cat_id']);
            $like = Like::countLike($id);
            $lik = count($like);

            view('fiche.allByid', compact('fiche', 'otherFiche', 'lik'));
        }

        public function deleteFiche($id) {

            Fiche::delete($id);
            $_SESSION['delete'] = true;
            redirectTo('userhome');
        }

        public function dislikeFiche($id) {

            Fiche::dislike($id);
            redirectTo('userhome');
        }


    }