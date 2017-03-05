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
      $row = $sth->fetch(PDO::FETCH_ASSOC);
      if ($row) {
          $this->id = $row['id'];
          $this->pseudo = $row['pseudo'];
          $this->mdp = $row['password'];
          $this->nom = $row['nom'];
          $this->prenom = $row['prenom'];
          $this->mail = $row['mail'];
          $this->groupe = new Groupe($row['fk_groupe_id']);
      }
  }

  /**
  *  GETTER - SETTER
  */
  public function getId()
  {
      return $this->id;
  }

  public function getPseudo()
  {
      return $this->pseudo;
  }

  public function getMdp()
  {
      return $this->mdp;
  }

  public function getNom()
  {
      return $this->nom;
  }

  public function getPrenom()
  {
      return $this->prenom;
  }

  public function getMail()
  {
      return $this->mail;
  }

  public function getGroupe()
  {
      return $this->groupe;
  }

  public function setId($id)
  {
      $this->id = $id;
  }

  public function setPseudo($pseudo)
  {
      $this->pseudo = $pseudo;
  }

  public function setMdp($mdp)
  {
      $this->mdp = $mdp;
  }

  public function setNom($nom)
  {
      $this->nom = $nom;
  }

  public function setPrenom($prenom)
  {
      $this->prenom = $prenom;
  }

  public function setMail($mail)
  {
      $this->mail = $mail;
  }

  public function setGroupe($groupe)
  {
      $this->groupe = $groupe;
  }

}

 ?>
