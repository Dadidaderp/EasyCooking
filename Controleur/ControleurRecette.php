<?php

class ControleurRecette
{
    public function showRecette()
    {
        $ihm = new Ihm('recette.php');
        if (!isset($_GET['id'])) {
            header('Location: ?p=index');
        }

        $recette = new Recette($_GET['id']);

        $ihm->genererIHM(array('recette' => $recette));
    }
}
