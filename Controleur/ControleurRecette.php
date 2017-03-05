<?php

/**
  * Controleur pour les recettes
  */
class ControleurRecette
{
    public function showRecette()
    {
        $ihm = new Ihm('recette.php');
        if (!isset($_GET['id'])) {
            header('Location: ?p=index');
            exit();
        }

        $recette = new Recette($_GET['id']);

        $ihm->genererIHM(array('recette' => $recette));
    }

    public function creation()
    {
        $ihm = new Ihm('create_recette.php');
        $err = '';
        // SI pas connecte
        if (!isset($_SESSION['utilisateur'])) {
            header('Location: ?p=index');
            exit();
        }


         if ($_SERVER['REQUEST_METHOD'] === 'POST') {
             //Traitement pour la partie recetteIngredient
             $ingredients = array();
             foreach($_POST as $key => $val){
                 if(preg_match('/^recette_quantite_[0-9]+/', $key)){
                     $id = str_replace('recette_quantite_', '', $key);
                     $ingredients[] = array('id_ingredient' => $id, 'quantite' => $val, 'unite' => $_POST['recette_unite_'.$id]);
                 } 
            }
            $user = unserialize($_SESSION['utilisateur']);
            $retour = RecetteRepot::save($_POST['nom'], $_POST['description'], $_FILES['image'], $_POST['nb'], $_POST['type'], $ingredients, $user);
            if ($retour == false) {
                $err = "erreur";
            } else {
               $err = "Recette créée, un admin doit la valider";
               header('Location: ?p=creation-recette');
               exit();
            }
        }
         

        $listeType = TypeRepot::getAll();
        $listeIngredient = IngredientRepot::getAll();
        

        $ihm->genererIHM(array('listeType' => $listeType, 'listeIngredient' => $listeIngredient, "erreur" => $err));
    }



    public function validation()
    {
        $ihm = new Ihm('recette_liste.php');
        $err = '';
        // SI pas connecte
        if (!isset($_SESSION['utilisateur'])) {
            header('Location: ?p=index');
            exit();
        }

        $user = unserialize($_SESSION['utilisateur']);
        // SI pas admin
        if ($user->getGroupe()->getId() == 1) {
            header('Location: ?p=index');
            exit();
        }

        if(isset($_GET['visible']) && isset($_GET['id_recette'])){
            RecetteRepot::visible($_GET['id_recette'], $_GET['visible']);
            header('Location: ?p=validation-recette');
            exit();
        }

        $listeRecette = RecetteRepot::getAll();
        

        $ihm->genererIHM(array('listeRecette' => $listeRecette));
    }
}
