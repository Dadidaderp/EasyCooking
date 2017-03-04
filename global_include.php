<?php

//ini_set('display_errors', '1');
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

include('Modele/CommentaireRepot.php');
include('Modele/GroupeRepot.php');
include('Modele/IngredientRepot.php');
include('Modele/RecetteRepot.php');
include('Modele/RecetteIngredientRepot.php');
include('Modele/TypeRepot.php');
include('Modele/UtilisateurRepot.php');

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

//***********************
//****     View      ****
//***********************
include('View/menu.php');

//***************************
//**** Classe Controleur  ***
//***************************

include('Controleur/ControleurJeu.php');



?>
