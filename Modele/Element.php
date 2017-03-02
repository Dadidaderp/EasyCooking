<?php


class Element {

    private $id;
    private $libelle;
    private $image;
    private $descriptionHTML;
    private $imagedet;
    private $valeur;
    private $unite;
    private $typeT;



    public function __construct($id = 0)
    {

        if ($id != 0)
        {
        	//var_dump($id);
            $db = BDD::getInstance();
            $sql = '
            	SELECT element.id , element.libelle , element.valeur ,
            	element.image , element.descriptionHTML , element.imagedet,
            	type.T_unite AS tu, mesure.libelle AS ml
                FROM element
            	JOIN mesure ON element.unite = mesure.id
            	JOIN type ON element.type = type.T_id
                WHERE element.id = ' . $id;

            $sth = $db->query($sql);
            $row = $sth->fetch(PDO::FETCH_ASSOC);


           		 //si ya des resultATS , on les recupere
            	if (count($row) > 0)
            	{

            	$this->id = $row['id'];
            	$this->libelle = $row['libelle'];
            	$this->image = $row['image'];
            	$this->descriptionHTML = $row['descriptionHTML'];
            	$this->imagedet = $row['imagedet'];
            	$this->valeur= $row['valeur'];
  				$this->unite= $row['ml'];
  				$this->typeT= $row['tu'];


            		/*
            		else
            		{
            			var_dump($els);
            		$this->unite= '';
            		}
            		*/




            }
        }
    }





    public function getAllByType($type)

    {
        //On regarde si le type est connu, si c'est pas le cas on renvoi un tableau vide
        if (in_array($type, array('age', 'taille', 'poids', 'distance')))
        {
        $db = BDD::getInstance();

            $sql = '
            		SELECT *
            		FROM element
            		WHERE visible = 1 ';

            $sth = $db->query($sql);
            $rows = $sth->fetchAll(PDO::FETCH_ASSOC);

            return $rows;
        }

        else
        {
        return array();
        }
    }




    public function compare($idElement, $idElement2, $type)

    {

        if (in_array($type, array('age', 'taille', 'poids' , 'distance')))
        {

		 $tabResultat    = array('error' => false);
         $valeur         = $this->valeurType($idElement, $type);
         $valeur2        = $this->valeurType($idElement2, $type);


            if ($valeur2 !== false && $valeur !== false)
			{
            $tabVal = array($valeur, $valeur2);

            // On tri le tableau en decroissant
            rsort($tabVal);

            //On calcul l'echelle qui entre les deux elements.
             $echelle = round ($tabVal[0] / $tabVal[1],2);

             $echelle = ceil($echelle);
             $tabResultat['echelle'] = $echelle;

                		//On sort les elements pour mettre dans l'element1 le plus grand element
                		if($valeur != $tabVal[0])
                		{
                    	$tabResultat['element1'] = new Element($idElement2);
                    	$tabResultat['element2'] = new Element($idElement);
                		}

                		else
                		{
                    	$tabResultat['element1'] = new Element($idElement);
                    	$tabResultat['element2'] = new Element($idElement2);
                		}



            	}

            else
            {
                $tabResultat['error'] = true;
            }
        }


        return $tabResultat;
    }



     public function valeurType($idElement, $type)

     {

     $db = BDD::getInstance();



     $sql = '
     		SELECT (element.valeur *mesure.valeur) AS valeur
     		FROM element
     		JOIN type  ON type.T_id = element.type
     		JOIN mesure ON mesure.id = element.unite
     		WHERE type.T_libelle = ' . $db->quote($type) . '
     		AND element.id = ' . $idElement. '';

     $sth = $db->query($sql);
     $row = $sth->fetch(PDO::FETCH_ASSOC);

     //var_dump($db->quote($type));
    // var_dump($type);

     return $row['valeur'];

     }







    /**
     * GETTER
     */
    public function getId() {
        return $this->id;
    }

    public function getLibelle() {
        return $this->libelle;
    }

    public function getImage() {
        return $this->image;
    }

    public function getImageDet() {
    	return $this->imagedet;
    }

    public function getDescriptionHTML() {
        return $this->descriptionHTML;
    }

    public function getValeur() {
    	return $this->valeur;
    }

    public function getUnite() {
    	return $this->unite;
    }

    public function getTypeT() {
    	return $this->typeT;
    }

}

?>
