<?php

  class CommentaireRepot
  {
      /**
      * retourne tout les commentaires a partir d'un id recette
      */
      public static function getAllByIdRecette($id)
      {
          $db = BDD::getInstance();

          $liste = array();
          $sql = 'SELECT id FROM commentaire WHERE fk_recette_id=?';

          $sth = $db->prepare($sql);
          $sth->execute(array($id));
          $rows = $sth->fetchAll(PDO::FETCH_ASSOC);
          foreach ($rows as $row) {
              $liste[] = new Commentaire($row['id']);
          }
          return $liste;
      }
  }
