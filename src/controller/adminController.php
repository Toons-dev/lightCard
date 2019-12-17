<?php 
    class adminController {

        public function all() {
            // appel a la BDD 
            $genres = Genre::findAll();

            view('exemple.all', compact('genres'));
        }

    }