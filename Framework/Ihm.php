<?php

/**
 * Classe qui genere les view
 */
Class Ihm {

    protected $contenu;
    protected $page;

    // constr avec la page pass� en parametre depuis le controleur
    public function __Construct($pageP)
    {
        $this->contenu = $pageP;

       // var_dump($page);

        	if (isset($_GET['p']))
        	{
            $this->page = $_GET['p'];
        	}


       		 else
        	{
            $this->page = 'index';
        	}
    }



    public function genererIHM($donnees = array())
    {

        // Rend les elem du tableau $donnees accessibles dans la vue
        //transforeme la cle d'un array en variable
        //verifie nom de variable correcte
        extract($donnees);
       // var_dump($donnees);
        // contenu a recu la page , donc app de getPage  , include de la page
         include($this->getPage($this->contenu));

    }




    public function getPage($pageP)
    {
        // $file recoi l'adresse
        $file = 'View/' . $pageP;
        return $file;
    }




    public function getUrl($url)
    {
        //Construction de l'URL  appel� dans les vues avec les infos de config
        return Configuration::$APPLICATION_URL . $url;
    }

}

?>
