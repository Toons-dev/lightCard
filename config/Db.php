<?php

class Db {

    private const DB_HOST = 'localhost';
    private const DB_PORT = '3306';
    private const DB_NAME = 'video_games';
    private const DB_USER = 'root';
    private const DB_PWD  = 'root';

    public function __construct() { 

    }

    protected static function getDb() {
        try {
            // Essaie de faire ce script...
            $bdd = new PDO('mysql:host='.self::DB_HOST.';dbname='.self::DB_NAME.';charset=utf8;port='.self::DB_PORT, self::DB_USER, self::DB_PWD);
        }
        catch (Exception $e) {
            // Sinon, capture l'erreur et affiche la
            die('Erreur : ' . $e->getMessage());
        }

        return $bdd;
    }

    /**
     * Permet d'enregistrer (INSERT) des données en base de données.
     * @param string    $table  Nom de la table dans lequel faire un INSERT
     * @param array     $data   Array contenant en clé les noms des champs de la table, en valeurs les values à enregistrer
     * 
     * @return int      Id de l'enregistrement.
     * 
     * Exemple :
     * $table = "Category";
     * $data = [
     *      'title'         => "Nouvelle catégorie",
     *      'description'   => 'Ma nouvelle catégorie.',
     * ];
     */
    protected static function dbCreate(string $table, array $data) {

        $bdd = self::getDb();

        // Construction de la requête au format : INSERT INTO $table($data.keys) VALUES(:$data.keys) 
        $req  = "INSERT INTO " . $table;
        $req .= " (`".implode("`, `", array_keys($data))."`)";
        $req .= " VALUES (:".implode(", :", array_keys($data)).") ";

        $response = $bdd->prepare($req);

        $response->execute($data);

        return $bdd->lastInsertId();
    }

    /**
     * Permet de supprimer (DELETE) des données en base de données.
     * @param string    $table  Nom de la table dans lequel faire un DELETE
     * @param array     $data   Array contenant en clé la PK de la table, en value la valeur à donner.
     * 
     * @return void
     * 
     * Exemple: 
     * $table = "Movie";
     * $data = [ 'id' => 3 ];
     */
    protected static function dbDelete(string $table, array $data) {

        $bdd = self::getDb();

        // Construction de la requête au format : INSERT INTO $table($data.keys) VALUES(:$data.keys) 
        $req  = "DELETE FROM " . $table . " WHERE " . array_keys($data)[0] . " = :" . array_keys($data)[0];

        $response = $bdd->prepare($req);

        $delete = $response->execute($data);

        return $delete;
    }


    /**
     * Permet de mettre à jour (UPDATE) des données en base de données.
     * @param string    $table  Nom de la table dans lequel faire un UPDATE
     * @param array     $data   Array contenant en clé les noms des champs de la table, en valeurs les values à enregistrer.
     * 
     * @return int      Id de l'élément modifié.
     * 
     * OBLIGATOIRE : Passer un champ 'id' dans le tableau 'data'.
     * 
     * Exemple :
     * $table = "Category";
     * $data = [
     *      'id'            => 4,
     *      'title'         => "Nouveau titre de catégorie",
     *      'description'   => 'Ma nouvelle catégorie.',
     * ];
     */
    protected static function dbUpdate(string $table, array $data, array $idField ) {

        $bdd = self::getDb();

        $req  = "UPDATE " . $table . " SET ";

        $whereIdString = '';

        /**
         * Set du WHERE
         */

        foreach($idField as $key => $value) {

            $whereIdString = " WHERE `" . $key . "` = :" . $key;

        }
        //$whereIdString = ($idField !== null) ? " WHERE `" . $idField . "` = :" . $idField : " WHERE id = :id";

        /**
         * Set des key = :value
         */
        foreach($data as $key => $value) {

                $req .= "`" . $key . "` = :" . $key . ", ";

        }

        $req = substr($req, 0, -2);
        $req .= $whereIdString;

        $response = $bdd->prepare($req);

        $response->execute(array_merge($data, $idField));

        return $bdd->lastInsertId();
    }

}