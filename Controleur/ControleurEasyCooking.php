<?php

  class ControleurEasyCooking
  {

    /**
    * app depuis Kernel si pas de P
    * N index() -- consruit objet IHM avec en para la vue vue/index.php , puis app de sa fonc genererIHM
    */
    public function index()
    {
        // crea IHM avec la page lie a la route
        $ihm = new Ihm('index.php');

        $liste = RecetteRepot::getLastRecette(); // par défault 3

        //appel de la FN de ihm.php
        $ihm->genererIHM(array('liste' => $liste));
    }


    public function recherche_ingredient()
    {
        // crea IHM avec la page lie a la route
        $ihm = new Ihm('recherche_ingredient.php');

        $listeIngredient = IngredientRepot::getAll();
        $listeIngredientSelected = []; 

        if(isset($_GET['inputListeIngredient'])){
            $tab = explode('__', $_GET['inputListeIngredient']);
            foreach($tab as $ingr){
                if(!empty($ingr)){
                    $newIngre = new Ingredient($ingr);
                    if($newIngre){
                        $listeIngredientSelected[] = $newIngre;
                    }
                }
            }
        }
        $listeRecette = RecetteRepot::rechercheByIngredient($listeIngredientSelected);

        IngredientRepot::getAll();
        
        //appel de la FN de ihm.php
        $ihm->genererIHM(array('listeIngredient' => $listeIngredient, 'listeIngredientSelected' => $listeIngredientSelected, 'listeRecette' => $listeRecette));
    }

    public function recherche_liste()
    {
        // crea IHM avec la page lie a la route
        $ihm = new Ihm('recherche_liste.php');

        $q = '';
        if(isset($_GET['recherche'])){
           $q = $_GET['recherche'];
        }
        $listeRecette = RecetteRepot::rechercheByNom($q);

        IngredientRepot::getAll();
        
        //appel de la FN de ihm.php
        $ihm->genererIHM(array('listeRecette' => $listeRecette, 'q' => $q));
    }

}
