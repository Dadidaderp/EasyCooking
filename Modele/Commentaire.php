<?php

  class Commentaire {

  private $commentaire;
  private $date;
  private $utilisateur;

  public function __construct($id)
  {
      $db = BDD::getInstance();

      $sql = 'SELECT * FROM commentaire WHERE id=?';

      $sth = $db->prepare($sql);
      $sth->execute(array($id));
      $row = $sth->fetchOne(PDO::FETCH_ASSOC);
      if ($row) {
          $this->id = $row['id'];
          $this->date = $row['date'];
          $this->utilisateur = new Utilisateur($row['fk_utilisateur_id']);
      }
  }
}

 ?>
