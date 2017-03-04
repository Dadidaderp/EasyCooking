<?php

  class Type {

  private $id;
  private $nom;

  public function __construct($id)
  {
      $db = BDD::getInstance();

      $sql = 'SELECT * FROM type WHERE id=?';

      $sth = $db->prepare($sql);
      $sth->execute(array($id));
      $row = $sth->fetchOne(PDO::FETCH_ASSOC);
      if ($row) {
          $this->id = $row['id'];
          $this->nom = $row['nom'];
      }
  }
}

 ?>
