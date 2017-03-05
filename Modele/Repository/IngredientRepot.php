<?php

class IngredientRepot {

     /**
    * retourne tout les ingredient 
    */
    public static function getAll()
    {
        $db = BDD::getInstance();

        $liste = array();
        $sql = 'SELECT id FROM ingredient';

        $sth = $db->prepare($sql);
        $sth->execute();
        $rows = $sth->fetchAll(PDO::FETCH_ASSOC);
        foreach ($rows as $row) {
            $liste[] = new Ingredient($row['id']);
        }
        return $liste;
    }
}

 ?>
