<?php


class Kernel
{
    protected $contenu; // qui recevra name route

    protected $lesRoutes; // recoit la liste de route


    public function __Construct()
    {
        //la vari $lesRoutes recoit la liste de route
        $this->lesRoutes = Route::getLesRoutes();

        //appel de la fonction init qui renvoi la page dans contenu
        $this->initPageCourant();

        //$init = 5;
       // var_dump($init);
    }



    public function run()
    {
        // info recoit la route select
        // un array 'controleur'=> ControleurJeu & 'action' => l'action recu depuis la liste
        $info = $this->lesRoutes->getRoute($this->contenu);
        //var_dump($info);

        //controleur recoit le controleur  de la route
        //donc, instancie ce controleur
        $controleur = new $info['controleur']; // soit new ControleurJeu
        //$controleur = new ControleurJeu();

        // 	appel de la fonction du controleur definit dans la route
        //ex $controleur->index() ; choixcritere etc
        $controleur->{$info['action'] }();

       //var_dump($info['action']);
    }




    /*
     * initialisation de la page
     */
    public function initPageCourant()
    {


        //si y'a un P on le recup
        if (isset($_GET['p'])) {
            $this->contenu =  $_GET['p'];
        } else {
            //sinon index
            $this->contenu = 'index';
        }
    }


    public function getContenu()
    {
        return $this->contenu;
    }
}
