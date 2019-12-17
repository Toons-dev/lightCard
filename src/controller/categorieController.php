<?php 
    class categorieController {

        public function all() {
            // appel a la BDD 
            $categories = Categorie::findAll();

            view('categorie.all', compact('categories'));
        }

        public function one($id) {
            
            // appel à la BDD
            $categorie = categorie::findOne($id);

            // appel à la BDD
            $categorie = Categorie::findOne($id);
            $fiches = Fiche::findAllById($id);
            view('categorie.one', compact('categorie', 'fiches'));
        }

    }