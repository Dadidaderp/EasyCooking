<?php

  class Groupe
  {
      private $id;
      private $nom;

      public function __construct($id)
      {
          $db = BDD::getInstance();

          $sql = 'SELECT * FROM groupe WHERE id=?';

          /**
            * Preparation de la requête
            * et execution avec les paramètres
            */  
          $sth = $db->prepare($sql);
          $sth->execute(array($id));
          $row = $sth->fetch(PDO::FETCH_ASSOC);
          if ($row) {
              $this->id = $row['id'];
              $this->nom = $row['name'];
          }
      }

      /**
      *  GETTER - SETTER
      */
      public function getId()
      {
          return $this->id;
      }

      public function getNom()
      {
          return $this->nom;
      }

      public function setId($id)
      {
          $this->desc = $id;
      }

      public function setNom($nom)
      {
          $this->nom = $nom;
      }
  }
