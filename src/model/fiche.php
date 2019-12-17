<?php

/**
 * Nous allons utiliser des méthodes issues de Db, nous disons que Article
 * est une classe enfant, elle hérite de la classe Db 
 */
class Fiche extends Db {

    /**
     * Proprietés 
     */
    protected $id;

    /**
     * Constantes
     * Nous pouvons aussi définir des constantes. Ici, il s'agit du nom de la table. Ainsi, s'il venait à changer, nous n'aurons plus qu'à le changer à cet endroit.
     */
    const TABLE_NAME = "fiche";
    const PRIMARY_KEY = "f_id";

    /**
     * Méthodes magiques
     */
    public function __construct( ) {

        /**
         * Pour appeler une méthode non statique de la classe DANS la classe, on utilise $this.
         */
    }

     /**
     * CRUD Methods
     */
    public static function save($data) {

        $nouvelId = Db::dbCreate(self::TABLE_NAME, $data);

        return $nouvelId;
    }

    public static function update($data, $id) {

        Db::dbUpdate(self::TABLE_NAME, 
                        $data, 
                        [self::PRIMARY_KEY => $id]);

        return;
    }

    public static function delete($id) {

        Db::dbDelete(self::TABLE_NAME, [self::PRIMARY_KEY => $id ]);
        
        return;
    }

    public static function findAll() {

        $bdd = Db::getDb();

        $query = $bdd->prepare('SELECT *
                                FROM '. self::TABLE_NAME.'
                                INNER JOIN categorie ON cat_id = f_cat_id' );

        // je l'execute 
        $query->execute();

        // je retourne la liste d'articles
        return $query->fetchAll(PDO::FETCH_ASSOC);       
    }

    public static function showRandom() {

        $bdd = Db::getDb();

        $query = $bdd->prepare('SELECT *
                                FROM '. self::TABLE_NAME.'
                                INNER JOIN categorie ON cat_id = f_cat_id 
                                ORDER BY RAND()
                                LIMIT 9 ');


        // je l'execute 
        $query->execute();

        // je retourne la liste d'articles
        return $query->fetchAll(PDO::FETCH_ASSOC);       
    }




    public static function findOne(int $id) {

        $bdd = Db::getDb();

        $query = $bdd->prepare('SELECT *
                            FROM '. self::TABLE_NAME .'
                            INNER JOIN categorie ON cat_id = f_cat_id  
                            WHERE '.self::PRIMARY_KEY.' = :id');

        // je l'execute 
        $query->execute([
            'id' => $id
        ]);

        // je retourne la liste d'articles
        return $query->fetch(PDO::FETCH_ASSOC);

    }

    public static function findAllById($id) {

        $bdd = Db::getDb();

        $query = $bdd->prepare('SELECT *
                            FROM fiche 
                            INNER JOIN categorie ON cat_id = f_cat_id
                            WHERE f_cat_id = :id');

        // je l'execute 
        $query->execute([
            'id' => $id
        ]);

        // je retourne la liste d'articles
        return $query->fetchAll(PDO::FETCH_ASSOC);       
    }

    public static function findAllByUserId($id) {

        $bdd = Db::getDb();

        $query = $bdd->prepare('SELECT *
                            FROM fiche 
                            INNER JOIN categorie ON cat_id = f_cat_id
                            WHERE f_usr_id = :id');
        // je l'execute 
        $query->execute([
            'id' => $id
        ]);

        // je retourne la liste d'articles
        return $query->fetchAll(PDO::FETCH_ASSOC);

    }

    public static function findAllLike() {

        $bdd = Db::getDb();

        $query = $bdd->prepare('SELECT *
                            FROM fiche WHERE f_statut = 1');
        // je l'execute 
        $query->execute();

        // je retourne la liste d'articles
        return $query->fetchAll(PDO::FETCH_ASSOC);

    }
  
    function getTitreByName($titre){
        
        $db = Db::getDb();
    
        $query = $db->prepare('SELECT * 
                                FROM fiche
                                INNER JOIN categorie ON fiche.f_cat_id = categorie.cat_id
                                WHERE f_titre LIKE :titre ');
    
        $query->execute([
            'titre' => $titre.'%'
        ]);
    
        $fiche = $query->fetchAll(PDO::FETCH_ASSOC);
    
        return $fiche;
    }
    

    public static function convertId($id) {

        $bdd = Db::getDb();

        $query = $bdd->prepare('SELECT cat_name
                                FROM categorie WHERE cat_id = :id');
        // je l'execute 
        $query->execute([
            'id' => $id
        ]);

        // je retourne la liste d'articles
        return $query->fetch(PDO::FETCH_ASSOC);

    }


} 