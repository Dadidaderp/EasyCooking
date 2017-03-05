<?php

ini_set('display_errors', '1');
header('Content-Type: text/html; charset=utf-8');
header('x-ua-compatible: ie=edge'); //int mode compa d'ie
session_start();


//***************************
//****      MODELE        ***
//***************************

include('Modele/Commentaire.php');
include('Modele/Groupe.php');
include('Modele/Ingredient.php');
include('Modele/Recette.php');
include('Modele/RecetteIngredient.php');
include('Modele/Type.php');
include('Modele/Utilisateur.php');

//***************************
//****   REPOT MODELE     ***
//***************************

include('Modele/Repository/CommentaireRepot.php');
include('Modele/Repository/GroupeRepot.php');
include('Modele/Repository/IngredientRepot.php');
include('Modele/Repository/RecetteRepot.php');
include('Modele/Repository/RecetteIngredientRepot.php');
include('Modele/Repository/TypeRepot.php');
include('Modele/Repository/UtilisateurRepot.php');

//***************************
//**** Classe Routing     ***
//***************************
include('Framework/RouteCollection.php');
include('Route/Route.php');


//***********************************
//**** Configuration && structure ***
//***********************************
include('Framework/Configuration.php');
include('Framework/BDD.php');
include('Framework/Kernel.php');
include('Framework/Ihm.php');

//***************************
//**** Classe Controleur  ***
//***************************

include('Controleur/ControleurRecette.php');
include('Controleur/ControleurUtilisateur.php');
include('Controleur/ControleurEasyCooking.php');
include('Controleur/ControleurCommentaire.php');






?>
