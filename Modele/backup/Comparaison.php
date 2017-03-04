<?php

class Comparaison {
	


	public function __construct($id = 0) 
	{
		
	}
	
	
	public static function getElemDeCompa($echelle)
	{
		$db = BDD::getInstance();
		
		$sql = 'SELECT idDeCompa , LibelleDeCompa, ImageDecompa,  (elemdecompa.TailleDeCompa * mesure.valeur) as tailleReel
        		FROM elemdecompa 
				JOIN mesure ON elemdecompa.UniteDeCompa = mesure.id
				';
		
		$sth = $db->query($sql);
		$rowElDeCompa = $sth->fetchAll(PDO::FETCH_ASSOC);
		
		$sth->closeCursor();
				
		$tableauG = array(array()) ;
		
		$i = 0;		
		$per = 5;
		$nbres = 0;

			do
			{
			
		
				foreach ($rowElDeCompa as $elem1)
				{
					$Taille = $elem1['tailleReel'];
			
						foreach ($rowElDeCompa as $elem2)
						{
							if($elem1['idDeCompa'] == $elem2['idDeCompa'])
							{
							continue;
							}
							
							if ( ($Taille / $elem2['tailleReel']) <  $echelle + (($echelle/100) * $per)
							&&($Taille / $elem2['tailleReel']) > $echelle - (($echelle/100) * $per) )
							{
								
								$y = 0;
								$nbres++;
				
									if($elem1['tailleReel'] > $elem2['tailleReel'])
									{
									$tableauG[$i][$y] = $elem1 ;
									$tableauG[$i][$y+1] = $elem2 ;
									}
									
									else 
									{
									$tableauG[$i][$y] = $elem2 ;
									$tableauG[$i][$y+1] = $elem1 ;
									}
							$i++;	
							}
						}
		
			}
		$per = $per + 5;
	
	}while ($nbres == 0 && $per < 16);	
	
	
	if($nbres == 0)
	{
		//echo "out";
		$tableauG = self::outOfCompare($echelle);
	}

	
	return $tableauG;
		
}
	
	

    public static function outOfCompare($echelle) {
        $db = BDD::getInstance();
     
        $sqlmax = '
			SELECT idDeCompa , LibelleDeCompa, ImageDecompa, (elemdecompa.TailleDeCompa * mesure.valeur) as tailleMax
			FROM elemdecompa
			JOIN mesure ON elemdecompa.UniteDeCompa = mesure.id
			WHERE elemdecompa.TailleDeCompa * mesure.valeur =
				(SELECT max(elemdecompa.TailleDeCompa * mesure.valeur) as mv
				FROM elemdeCompa
				JOIN mesure ON elemdecompa.UniteDeCompa = mesure.id)';
        

        $sthmax = $db->query($sqlmax);
  
  
        $rowmax = $sthmax->fetch(PDO::FETCH_ASSOC);
        
        
        
        $sqlmin = '
			SELECT idDeCompa , LibelleDeCompa, ImageDecompa, (elemdecompa.TailleDeCompa * mesure.valeur) as tailleMin
			FROM elemdecompa
			JOIN mesure ON elemdecompa.UniteDeCompa = mesure.id    
			WHERE elemdecompa.TailleDeCompa * mesure.valeur =  
				(SELECT min(elemdecompa.TailleDeCompa * mesure.valeur) as mv
				FROM elemdeCompa       
				JOIN mesure ON elemdecompa.UniteDeCompa = mesure.id)';
              
        $sthmin = $db->query($sqlmin);
        $rowmin = $sthmin->fetch(PDO::FETCH_ASSOC);
        
        
        $tablminmax = array();
        
        $tablminmax[0] = $rowmax;
        $tablminmax[1] = $rowmin;
        
        $tabfina = array();
        
		$tabfina[0] = $tablminmax;

        	return $tabfina;
      
    }
    
    

    
    /**
     * GETTER
     */
    public function getId() {
    	return $this->id;
    }
    
    public function getLibelle() {
    	return $this->ima1;
    }
    
    public function getImage() {
    	return $this->ima2;
    }
    
    public function getImageDet() {
    	return $this->texte;
    }
    
   

}

?>