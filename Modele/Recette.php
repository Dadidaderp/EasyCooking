<?php

Class Recette {

  private $id:
  private $nom;
  private $desc;
  private $img;
  private $nb;
  private $status;
  private $lstCommentaire;
  private $lstIngredient;
  private $lstType;

  private $utilisateur;

  public function __construct($id)
  {
      $db = BDD::getInstance();

      $sql = 'SELECT * FROM recette WHERE id=?';

      $sth = $db->prepare($sql);
      $sth->execute(array($id));
      $row = $sth->fetchOne(PDO::FETCH_ASSOC);
      if ($row) {
          $this->id = $row['id'];
          $this->nom = $row['nom'];
          $this->description = $row['description'];
          $this->utilisateur = new Utilisateur($row['fk_utilisateur_id']);
          $this->lstCommentaire = CommentaireRepot::getAllByIdRecette($row['id']);
          $this->lstIngredient = RecetteIngredientRepot::getAllByIdRecette($row['id']);
          $this->lstType = TypeRepot::getAllByIdRecette($row['id']);

      }

}

 ?>
