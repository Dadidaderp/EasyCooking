<?php

  class RecetteIngredient
  {
      private $quantite;
      private $unite;

      private $ingredient;

      public function __construct($id)
      {
          $db = BDD::getInstance();

          $sql = 'SELECT * FROM recette_ingredient WHERE fk_recette_id=?';

          /**
            * Preparation de la requête
            * et execution avec les paramètres
            */
          $sth = $db->prepare($sql);
          $sth->execute(array($id));
          $row = $sth->fetch(PDO::FETCH_ASSOC);
          if ($row) {
              $this->quantite = $row['quantite'];
              $this->unite = $row['unite'];
              $this->ingredient = new Ingredient($row['fk_ingredient_id']);
          }
      }

      /**
      *  GETTER - SETTER
      */
      public function getId()
      {
          return $this->id;
      }

      public function getQuantite()
      {
          return $this->quantite;
      }

      public function getUnite()
      {
          return $this->unite;
      }

      public function getIngredient()
      {
          return $this->ingredient;
      }

      public function setId($id)
      {
          $this->desc = $id;
      }

      public function setQuantite($quantite)
      {
          $this->quantite = $quantite;
      }

      public function setUnite($unite)
      {
          $this->unite = $unite;
      }

      public function setIngredient($ingredient)
      {
          $this->$ingredient = $ingredient;
      }
  }
