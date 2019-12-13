<?php 
    class ExempleController {

        public function all() {
            // appel a la BDD 
            $genres = Genre::findAll();

            view('exemple.all', compact('genres'));
        }

        public function show($id) {
            
            view('exemple.all');
        }

    }