<?php


class Route{

    public static $lesRoutes;




    public function __Construct()
    {
        self::$lesRoutes = $this->getLesRoutes();
    }



    //toutes les routes dispo
    // crea coll de Routes + add
    public static function getLesRoutes()
    {
        $collection = new RouteCollection();

        //nameRoute, controle, methode
        $collection->add('index', 'ControleurEasyCooking', 'index');
        $collection->add('inscription', 'ControleurUtilisateur', 'inscription');
        $collection->add('connexion', 'ControleurUtilisateur', 'connexion');
        $collection->add('deconnexion', 'ControleurUtilisateur', 'deconnexion');
        $collection->add('fiche-recette', 'ControleurRecette', 'showRecette');
        $collection->add('commentaire', 'ControleurCommentaire', 'addCommentaire');


        return $collection;
    }


}
?>
