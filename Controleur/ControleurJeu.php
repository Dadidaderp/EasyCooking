<?php

class ControleurJeu  {

    
    /*
     * app depuis Kernel si pas de P
     * N index() -- consruit objet IHM avec en para la vue vue/index.php , puis app de sa fonc genererIHM
     */
    public function index() 
    {
    	// crea IHM avec la page lié a la route
        $ihm = new Ihm('index.php');
        
        
        //appel de la FN de ihm.php
        $ihm->genererIHM();
    }

    
  
    /*
     * FN choixCritere() -- consruit objet IHM avec en para la vue vue/choixCritere.php 
     * , puis app de sa fonc genererIHM
     */
    
    public function choixCritere() 
    {
        $ihm = new Ihm('choixCritere.php');
        
        $ihm->genererIHM();
    }
    

  
    public function choixElement()
    {
    	
        $ihm = new Ihm('choixElement.php');
        
        $element    = new Element;
        //var_dump($element);
        $tabElement = $element->getAllByType($_GET['type']);
        
        $ihm->genererIHM(array('tabElement' => $tabElement, 'type' => $_GET['type']));
    }
    
    
    
    
    
    
    public function detailElement() {
        $ihm = new Ihm('detailElement.php');
        
        $element    = new Element($_GET['id']);
       // var_dump($element);
        $ihm->genererIHM(array('element' => $element));
    }
    
    
    public function help() 
    {
    	$ihm = new Ihm('help.php');
    
    	$ihm->genererIHM();
    }
    
    public function limite()
    {
    	$ihm = new Ihm('test.php');
    
    	$ihm->genererIHM();
    }
    
    public function helpCri() {
    	$ihm = new Ihm('helpCri.php');
    
    	//$element    = new Element($_GET['id']);
    
    	//$ihm->genererIHM(array('element' => $element));
    	$ihm->genererIHM();
    }
    
    
    
    
    
    
    public function comparer() 
    {
        $ihm = new Ihm('detailCompare.php');
        
        $tab = explode(',', $_GET['listeElement']);
        
        	//On regarde si dans la variable listeElement, il y a bien 2 elements
       	 if(count($tab) == 2)
       	 	{
            $element        = new Element;
            //var_dump($_GET['listeElement']);
            $comparaison = new Comparaison;
            
            $tabElement     = $element->compare($tab[0], $tab[1], $_GET['type']);  //return tabresultat
           
           $tabComper = Comparaison::getElemDeCompa($tabElement['echelle']);

           $ihm->genererIHM(array('tabElement' => $tabElement, 'type' => $_GET['type'] , 'tabComper' => $tabComper));         
        	}
        	
        else
        	{
        	echo "else";
            $ihm->genererIHM(array('tabElement' => array('error' => true)));
            var_dump($_GET['listeElement']);
        	}
        
    }
    

}
