<?php

  class TypeRepot {

    /**
    * retourne tout les type a partir d'un id recette
    */
    public static function getAllByIdRecette($id)
    {
        $db = BDD::getInstance();

        $liste = array();
        $sql = 'SELECT fk_type_id FROM recette_type WHERE fk_recette_id=?';

        $sth = $db->prepare($sql);
        $sth->execute(array($id));
        $rows = $sth->fetchAll(PDO::FETCH_ASSOC);
        foreach ($rows as $row) {
            $liste[] = new Type($row['fk_type_id']);
        }
        return $liste;
    }

    /**
    * retourne tout les type 
    */
    public static function getAll()
    {
        $db = BDD::getInstance();

        $liste = array();
        $sql = 'SELECT id FROM type';

        $sth = $db->prepare($sql);
        $sth->execute();
        $rows = $sth->fetchAll(PDO::FETCH_ASSOC);
        foreach ($rows as $row) {
            $liste[] = new Type($row['id']);
        }
        return $liste;
    }
}

 ?>
