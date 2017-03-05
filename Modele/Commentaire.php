<?php

  class Commentaire {

  private $commentaire;
  private $date;
  private $utilisateur;

  public function __construct($idUtilisateur, $idRecette)
  {
      $db = BDD::getInstance();

      $sql = 'SELECT * FROM commentaire WHERE fk_recette_id=? AND fk_utilisateur_id=?';

      $sth = $db->prepare($sql);
      $sth->execute(array($idRecette, $idUtilisateur));
      $row = $sth->fetch(PDO::FETCH_ASSOC);
      if ($row) {
          $this->commentaire = $row['commentaire'];
          $this->date = $row['date'];
          $this->utilisateur = new Utilisateur($row['fk_utilisateur_id']);
      }
  }

  /**
  *  GETTER - SETTER
  */
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

 ?>
