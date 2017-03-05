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
          $sql = 'SELECT fk_utilisateur_id FROM commentaire WHERE fk_recette_id=?';

          $sth = $db->prepare($sql);
          $sth->execute(array($id));
          $rows = $sth->fetchAll(PDO::FETCH_ASSOC);
          foreach ($rows as $row) {
              $liste[] = new Commentaire($row['fk_utilisateur_id'], $id);
          }
          return $liste;
      }

      public static function save($commentaire, $recetteId)
      {
          $db = BDD::getInstance();

          $date = new Datetime();
          $user = unserialize($_SESSION['utilisateur']);
//print_r($user->getId());exit;
        // 1 = groupe utilisateur
        $sql = 'INSERT INTO commentaire VALUES(?, ?, ?, ?)';
          $sth = $db->prepare($sql);
          $sth->execute(array($user->getId(), $recetteId, nl2br($commentaire), $date->format('Y-m-d h:i:s')));
          return new Utilisateur($db->lastInsertId());
      }
  }
