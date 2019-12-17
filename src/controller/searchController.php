<?php 
    class searchController {

        public function search() {
            // appel a la BDD 

            echo $_GET['search'];
            $fiches = Fiche::getTitreByName($_GET['search']);

            view('search', compact('fiches'));
        }

    }