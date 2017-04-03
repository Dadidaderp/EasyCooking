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
          // requete preparer
          $sql = 'SELECT id FROM commentaire WHERE fk_recette_id=?';

          // preparation de la requete
          $sth = $db->prepare($sql);
          // execute la requete
          $sth->execute(array($id));
          $rows = $sth->fetchAll(PDO::FETCH_ASSOC);
          foreach ($rows as $row) {
              $liste[] = new Commentaire($row['id']);
          }
          return $liste;
      }

      public static function save($commentaire, $recetteId)
      {
          $db = BDD::getInstance();

          $date = new Datetime();
          $user = unserialize($_SESSION['utilisateur']);
          // 1 = groupe utilisateur
          // requete preparer
          $sql = 'INSERT INTO commentaire VALUES(0, ?, ?, ?, ?)';
          // prepapration de la requete
          $sth = $db->prepare($sql);
          // execution de la requete
          $sth->execute(array(nl2br($commentaire), $date->format('Y-m-d h:i:s'), $user->getId(), $recetteId));
          return new Utilisateur($db->lastInsertId());
      }
  }
