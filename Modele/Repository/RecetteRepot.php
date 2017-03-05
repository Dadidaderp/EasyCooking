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
          $sql = 'SELECT id FROM recette ORDER BY id DESC LIMIT '.$nb;

          $sth = $db->query($sql);
          $rows = $sth->fetchAll(PDO::FETCH_ASSOC);
          foreach ($rows as $row) {
              $liste[] = new Recette($row['id']);
          }
          return $liste;
      }
  }
