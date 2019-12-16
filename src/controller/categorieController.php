<?php 
    class categorieController {

        public function all() {
            // appel a la BDD 
            $categories = categorie::findAll();

            view('categorie.all', compact('genres'));
        }

        public function one($id) {
            // appel à la BDD
            $categorie = categorie::findOne();
            
            view('categorie.one', compact('categorie'));
        }

    }