<?php

  class RecetteIngredientRepot {

  /**
    * retourne tout les RecetteIngredient a partir d'un id recette
    */
    public static function getAllByIdRecette($id)
    {
        $db = BDD::getInstance();

        $liste = array();
        $sql = 'SELECT fk_recette_id FROM recette_ingredient WHERE fk_recette_id=?';

        $sth = $db->prepare($sql);
        $sth->execute(array($id));
        $rows = $sth->fetchAll(PDO::FETCH_ASSOC);
        foreach ($rows as $row) {
            $liste[] = new RecetteIngredient($row['fk_recette_id']);
        }
        return $liste;
    }
}

 ?>
