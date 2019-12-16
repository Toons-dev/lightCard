<?php 
    class categorieController {

        public function all() {
            // appel a la BDD 
            $categories = categorie::findAll();

            view('categorie.all', compact('genres'));
        }

        public function one($id) {

            $categorie = categorie::findOne();
            view('categorie.one');
        }

    }