<?php

class Router
{

    private $ctrl;
    private $view;


    public function routeReq()
    {
        try 
        {
            // chargement automatique des classes 
            spl_autoload_register(function($class){
                require_once('models/'.$class.'.php');
            });

            $url='';

            if(isset($_GET['url']))
            {
                $url = explode('/', filter_var($_GET['url'], FILTER_SANITIZE_URL));
            

            $controller = ucfirst(strtolower($url[0]));
            $controllerClass = "controller".$controller;
            $controllerFile = "controllers/".$controllerClass.".php";

// LE CONTROLLER EST INCLUS SELON L'ACTION DE L'UTILISATEUR 
            if(file_exists($controllerFile))
            {
                require_once($controllerFile);
                $this->_ctrl = new $controllerClass($url);
            }
            else
                throw new Exception('page introuvable');
        }
            else

                require_once('controllers/controllerAccueil.php');
                $this-> _ctrl = new ControllerAccueil($url);
        }

        // GESTION DES ERREURS
        catch(Exception $e)
        {
    
    }
    }
}