<?php 
    class FicheController {

        public function one($id) {
            $fiche = fiche::findOne($id);
            view('fiche.allByid', compact('fiche'));
        }
        
    }