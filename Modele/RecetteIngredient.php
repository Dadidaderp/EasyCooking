<?php

  class RecetteIngredient {

  private $id;
  private $quantite;
  private $unite;

  private $ingredient;

  public function __construct($id)
  {
      $db = BDD::getInstance();

      $sql = 'SELECT * FROM recette_ingredient WHERE id=?';

      $sth = $db->prepare($sql);
      $sth->execute(array($id));
      $row = $sth->fetchOne(PDO::FETCH_ASSOC);
      if ($row) {
          $this->id = $row['id'];
          $this->quantite = $row['quantite'];
          $this->unite = $row['unite'];
          $this->ingredient = new Ingredient($row['fk_ingredient_id']);
      }
}

 ?>
