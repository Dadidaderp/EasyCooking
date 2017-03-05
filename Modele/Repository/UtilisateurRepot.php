<?php

  class UtilisateurRepot
  {
      public static function save($pseudo, $nom, $prenom, $mail, $password)
      {
          $db = BDD::getInstance();

          $liste = array();
        // 1 = groupe utilisateur
        $sql = 'INSERT INTO utilisateur VALUES(0, ?, ?, ?, ?, ?, 1)';

          $sth = $db->prepare($sql);
          $sth->execute(array($pseudo, sha1($password), $nom, $prenom, $mail));
          return new Utilisateur($db->lastInsertId());
      }

      public static function identification($email, $password)
      {
          $db = BDD::getInstance();

          $liste = array();
          $sql = 'SELECT id FROM utilisateur WHERE mail=? AND password=?';
          $sth = $db->prepare($sql);
          $sth->execute(array($email, sha1($password)));
          $row = $sth->fetch(PDO::FETCH_ASSOC);
          if ($row) {
              return new Utilisateur($row['id']);
          } else {
              return false;
          }
      }
  }
