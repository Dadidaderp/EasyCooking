<?php

  class RecetteRepot
  {

    /**
      * retourne les $nb dernières recettes créées
      */
      public static function getLastRecette($nb = 3)
      {
          $db = BDD::getInstance();

          $liste = array();
          $sql = 'SELECT id FROM recette WHERE status=1 ORDER BY id DESC LIMIT '.$nb;

          $sth = $db->query($sql);
          $rows = $sth->fetchAll(PDO::FETCH_ASSOC);
          foreach ($rows as $row) {
              $liste[] = new Recette($row['id']);
          }
          return $liste;
      }

      public static function rechercheByIngredient($listeIngredient){
        $db = BDD::getInstance();

        $liste = array();
        //Construction de la string pour faire la requete
        $in = '';
        // Il faut au minimun un ingredient pour lancer la requete
        if( count($listeIngredient) > 0){
            foreach($listeIngredient as $ingre){
                $in .= $ingre->getId().',';
            }
            $in = substr($in, 0, -1); //SUppression du dernier caractere

            $sql = 'SELECT id, COUNT(*) as nb_ingredient
                    FROM recette r
                    INNER JOIN recette_ingredient ri ON r.id=ri.fk_recette_id
                    WHERE fk_ingredient_id IN ('. $in .')
                    AND status=1
                    GROUP BY id';
            $sth = $db->query($sql);
            $rows = $sth->fetchAll(PDO::FETCH_ASSOC);
            foreach ($rows as $row) {
                if( count($listeIngredient) == $row['nb_ingredient']){
                    $liste[] = new Recette($row['id']);
                }
            }
        }
        return $liste;
      }


      public static function rechercheByNom($nom){
        $db = BDD::getInstance();

        $liste = array();
        $sql = 'SELECT id
                FROM recette r
                WHERE nom LIKE ?
                AND status=1';

        $sth = $db->prepare($sql);
        $sth->execute(array("%".$nom."%"));
        $rows = $sth->fetchAll(PDO::FETCH_ASSOC);
        foreach ($rows as $row) {
            $liste[] = new Recette($row['id']);
        }
        return $liste;
      }


      public static function save($nom, $description, $image, $nb_personne, $types, $ingredients, $user)
      {
        $db = BDD::getInstance();

        $dossier = 'upload/';
        $fichier = basename(date('dmYhis') . $image['name']);
        $url_image = $dossier . $fichier;
        if(move_uploaded_file($image['tmp_name'], $url_image)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
        {
            // 0 = status pas encore validé
            $sql = 'INSERT INTO recette VALUES(0, ?, ?, ?, ?, 0, ?)';

            $sth = $db->prepare($sql);
            $sth->execute(array($nom, $description, $url_image, $nb_personne, $user->getId()));

            $recette = new Recette($db->lastInsertId());

            //Gestion des types
            foreach($types as $type){
                $sql = 'INSERT INTO recette_type VALUES(?, ?)';
                $sth = $db->prepare($sql);
                $sth->execute(array(intval($type), $recette->getId()));
            }
            //Gestion des ingredient
            foreach( $ingredients as $ingredient){
                $sql = 'INSERT INTO recette_ingredient VALUES(?, ?, ?, ?)';
                $sth = $db->prepare($sql);
                $sth->execute(array($recette->getId(), $ingredient['id_ingredient'],  $ingredient['quantite'],  $ingredient['unite']));
            }
            exit();
            return $recette;
        }
        else{
            return false;
        }
     }


     public static function visible($id_recette, $status)
      {
        $db = BDD::getInstance();
        $sql = 'UPDATE recette SET status=? WHERE id=?';

        $sth = $db->prepare($sql);
        return $sth->execute(array($status, $id_recette));
     }


     /**
    * retourne tout les recettes 
    */
    public static function getAll()
    {
        $db = BDD::getInstance();

        $liste = array();
        $sql = 'SELECT id FROM recette';

        $sth = $db->prepare($sql);
        $sth->execute();
        $rows = $sth->fetchAll(PDO::FETCH_ASSOC);
        foreach ($rows as $row) {
            $liste[] = new Recette($row['id']);
        }
        return $liste;
    }
  }
