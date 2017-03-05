<?php

  class ControleurEasyCooking
  {
      /*
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
  }
