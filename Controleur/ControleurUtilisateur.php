<?php

/**
  * Controleur pour les utilisateurs
  */
class ControleurUtilisateur
{
    /**
     * Méthode qui s'occupe des inscriptions
     */
    public function inscription()
    {
        $ihm = new Ihm("inscription.php");
        $err = '';
        // On récupère les infos du formulaire d'inscription
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Appel de la méthode pour sauvegarde les données en base
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

    /**
     * Méthode qui s'occupe des connexions
     */
    public function connexion()
    {
        $ihm = new Ihm("connexion.php");
        $err = '';
        // recupere les infos
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // appels méthode identification avec le mail et le mdp
            $retour = UtilisateurRepot::identification($_POST['mail'], $_POST['password']);
          // si mdp faux, on affiche message erreur
          if ($retour == false) {
                $err = "Mot de passe incorrect";
            } else {
                // on cree une session et redirection sur index
                $_SESSION['utilisateur'] = serialize($retour);
                header('Location: ?p=index');
                exit();
            }
        }
        $ihm->genererIHM(array("erreur" => $err));
    }

    /**
     * Méthode qui s'occupe des deconnexions
     */
    public function deconnexion()
    {
        // on detruit la session
        session_destroy();
        // redirection sur index
        header('Location: ?p=index');
        exit();
    }
}
