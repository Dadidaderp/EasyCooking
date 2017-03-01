<?php

//ini_set('display_errors', '1');
header('Content-Type: text/html; charset=utf-8');
header('x-ua-compatible: ie=edge'); //int mode compa d'ie
session_start();


//***************************
//****      MODELE        ***
//***************************

include('Modele/Element.php');
include('Modele/Comparaison.php');

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
//include('View/menu.php')

//***************************
//**** Classe Controleur  ***
//***************************

include('Controleur/ControleurJeu.php');



?>
