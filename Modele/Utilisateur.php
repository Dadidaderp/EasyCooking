<?php

Class Utilisateur {

  private $id;
  private $pseudo;
  private $mdp;
  private $nom;
  private $prenom;
  private $mail;
  private $groupe;

  public function __construct($id)
  {
      $db = BDD::getInstance();

      $sql = 'SELECT * FROM utilisateur WHERE id=?';

      $sth = $db->prepare($sql);
      $sth->execute(array($id));
      $row = $sth->fetchOne(PDO::FETCH_ASSOC);
      if ($row) {
          $this->id = $row['id'];
          $this->pseudo = $row['pseudo'];
          $this->mdp = $row['mdp'];
          $this->nom = $row['nom'];
          $this->prenom = $row['prenom'];
          $this->mail = $row['mail'];
          $this->groupe = new Groupe($row['fk_groupe_id']);
      }
  }
}

 ?>
