<?php

  class Commentaire
  {
      private $id;
      private $commentaire;
      private $date;
      private $utilisateur;

      public function __construct($id)
      {
          $db = BDD::getInstance();

      // Requete prépaprer
      $sql = 'SELECT * FROM commentaire WHERE id=?';

      /**
        * Preparation de la requête
        * et execution avec les paramètres
        */
      $sth = $db->prepare($sql);
          $sth->execute(array($id));
          $row = $sth->fetch(PDO::FETCH_ASSOC);
          if ($row) {
              $this->id = $row['id'];
              $this->commentaire = $row['commentaire'];
              $this->date = $row['date'];
              $this->utilisateur = new Utilisateur($row['fk_utilisateur_id']);
          }
      }

  /**
  *  GETTER - SETTER
  */
  public function getId()
  {
      return $this->id;
  }

      public function getCommentaire()
      {
          return $this->commentaire;
      }

      public function getDate()
      {
          return $this->date;
      }

      public function getUtilisateur()
      {
          return $this->utilisateur;
      }

      public function setCommentaire($commentaire)
      {
          $this->commantaire = $commentaire;
      }

      public function setDate($date)
      {
          $this->date = $date;
      }

      public function setUtilisateur($utilisateur)
      {
          $this->utilisateur = $utilisateur;
      }
  }
