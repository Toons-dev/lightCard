<?php 
    class FicheController {

        public function one($id) {
            $fiche = fiche::findOne($id);
            $otherFiche = fiche::findOther($fiche[f_cat_id]);

            view('fiche.allByid', compact('fiche', 'otherFiche'));
        }
    }