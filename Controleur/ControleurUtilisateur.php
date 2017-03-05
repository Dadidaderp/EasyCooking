<?php

class ControleurUtilisateur
{
    public function inscription()
    {
        $ihm = new Ihm("inscription.php");
        $err = '';
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $retour = UtilisateurRepot::save($_POST['pseudo'], $_POST['nom'], $_POST['prenom'], $_POST['mail'], $_POST['password']);
            if ($retour == false) {
                $err = "erreur";
            } else {
                $_SESSION['utilisateur'] = serialize($retour);
                header('Location: ?p=index');
                exit();
            }
        }
        $ihm->genererIHM(array("erreur" => $err));
    }

    public function connexion()
    {
        $ihm = new Ihm("connexion.php");
        $err = '';
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $retour = UtilisateurRepot::identification($_POST['mail'], $_POST['password']);
            if ($retour == false) {
                $err = "Mot de passe incorrect";
            } else {
                $_SESSION['utilisateur'] = serialize($retour);
                header('Location: ?p=index');
                exit();
            }
        }
        $ihm->genererIHM(array("erreur" => $err));
    }

    public function deconnexion()
    {
        session_destroy();
        header('Location: ?p=index');
        exit();
    }
}
