<?php

/**
 * Défi de la classe Base qui crée les liens vers la base de données
 * La classe sera appelée a  chaque fois qu'une donnée de la base de données sera nécessaire
 */
class BDD {

    private static $connect = null;
    private static $bdd;

    private function __construct() {
        //Créa liens bdd
        try {
            $pdo = new PDO(Configuration::$DATABASE_TYPE . ':host=' . Configuration::$DATABASE_HOST . ';dbname=' . Configuration::$DATABASE_NAME, Configuration::$DATABASE_LOGIN, Configuration::$DATABASE_PASSWORD);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->exec("SET CHARACTER SET utf8");
            self::$bdd = $pdo;
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    
    
    
    //retrourne instance de bdd
    public static function getInstance() 
    {
        if (is_null(self::$connect))
        {
            self::$connect = new Bdd();
        }
        return self::$bdd;
    }

}

?>