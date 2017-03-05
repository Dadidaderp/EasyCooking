<?php

  class RecetteIngredientRepot {

  /**
    * retourne tout les RecetteIngredient a partir d'un id recette
    */
    public static function getAllByIdRecette($id)
    {
        $db = BDD::getInstance();

        $liste = array();
        // requete preparer
        $sql = 'SELECT fk_recette_id, fk_ingredient_id FROM recette_ingredient WHERE fk_recette_id=?';

        //prepare la requete
        $sth = $db->prepare($sql);
        // execute la requete
        $sth->execute(array($id));
        $rows = $sth->fetchAll(PDO::FETCH_ASSOC);
        foreach ($rows as $row) {
            $liste[] = new RecetteIngredient($row['fk_recette_id'], $row['fk_ingredient_id']);
        }
        return $liste;
    }
}

 ?>
