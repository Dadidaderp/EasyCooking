<?php

class Recette
{
    private $id;
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
        $row = $sth->fetch(PDO::FETCH_ASSOC);
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

    public function getDesc()
    {
        return $this->desc;
    }

    public function getImg()
    {
        return $this->img;
    }

    public function getNb()
    {
        return $this->nb;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function getLstCommentaire()
    {
        return $this->lstCommentaire;
    }

    public function getLstIngredient()
    {
        return $this->lstIngredient;
    }

    public function getLstType()
    {
        return $this->lstType;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    public function setDesc($desc)
    {
        $this->desc = $desc;
    }

    public function setImg($img)
    {
        $this->img = $img;
    }

    public function setNb($nb)
    {
        $this->nb = $nb;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function setLstCommentaire($lstCommentaire)
    {
        $this->lstCommentaire = $lstCommentaire;
    }

    public function setLstIngredient($lstIngredient)
    {
        $this->lstIngredient = $lstIngredient;
    }

    public function setLstType($lstType)
    {
        $this->lstType = $lstType;
    }
}
