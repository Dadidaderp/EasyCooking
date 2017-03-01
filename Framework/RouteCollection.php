<?php

/**
 * Class qui gere l'ensemble des Routes du site Web
 */
class RouteCollection {

    protected $routes = array();


    public function add($name, $controleur, $action)
    {
        unset($this->routes[$name]);

        $this->routes[$name] = array('controleur' => $controleur,'action' => $action);
    }




    public function getRoute($name)
    {
            return $this->routes[$name];
    }




    public function all() {
        return $this->routes;
    }

}

?>
