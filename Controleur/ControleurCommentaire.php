<?php

/**
 * Controleur pour les commentaires
 */
class ControleurCommentaire
{
    public function addCommentaire()
    {
        $ihm = new Ihm('recette.php');
        // recup des infos
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // sauvegarde du commentaire
            $retour = CommentaireRepot::save($_POST['commentaire'], $_POST['id']);
            if ($retour == false) {
                $err = "erreur";
            } else {
                $_SESSION['utilisateur'] = serialize($retour);
                header('Location: ?p=recette&id='.$_POST['id']);
                exit();
            }
        }
    }
}
