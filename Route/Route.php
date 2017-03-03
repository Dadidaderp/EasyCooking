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
        $collection->add('index', 'ControleurJeu', 'index');
        $collection->add('menu', 'ControleurJeu', 'menu');
        $collection->add('inscription', 'ControleurJeu', 'inscription');
        $collection->add('choix-critere', 'ControleurJeu', 'choixCritere');
        $collection->add('choix-element', 'ControleurJeu', 'choixElement');
        $collection->add('detail-element', 'ControleurJeu', 'detailElement');
        $collection->add('detail-compare', 'ControleurJeu', 'comparer');
        $collection->add('help', 'ControleurJeu', 'help');
        $collection->add('test', 'ControleurJeu', 'limite');

        return $collection;
    }


}
?>
