<?php
    namespace App\Service;

    abstract class RouterService
    {


        /**
         * prise en charge des parametres d'une requete GET
         * 
         * @param array $params les parametres de l'uri ($params)
         * @return array la reponse correspondante au return d'un controleur
         */
        public static function handleRequest($params){

            /*-----APPEL DU CONTROLEUR-----*/

            // $classname = "App\Controller\StoreController"; // contrôleur par défaut

            $class = ucfirst(DEFAULT_CTRL); // "Store"; // controlleur par défaut

            if(isset($params['ctrl'])){ // ctrl = admin
                $uri_class = ucfirst($params["ctrl"]); // $uri_class = "Admin"
                // on verifie que App\Controller\AdminController existe !
                if(class_exists("App\Controller\\".$uri_class."Controller")){
                    // le controleur à appeler devient celle contenue dans l'uri     
                    $class = $uri_class;
                }
            }

            $classname ="App\Controller\\".$class."Controller";
            $controller = new $classname(); //App\Controller\StoreController

            //------APPEL DE LA METHODE DANS LE CONTROLEUR------//
            $method = DEFAULT_ACTION."Action"; // "indexAction"; // la méthode par défaut

            if(isset($params['action'])){ // action = list
                $uri_method = $params["action"]."Action"; // $uri_method = "listAction"
                // on verifie si la methode listAction est une methode du controleur
                if(method_exists($controller, $uri_method)){
                    // la methode a appeler est celle provenant de l'uri
                    $method = $uri_method;
                }
            }

            //------PRISE EN CHARGE DU PARAMETRE OPTIONNEL $params["id"]-------*/
            $id = null; // pas d'id par defaut
            if(isset($params["id"])){
                $id = $params["id"];
            }

            // StoreController::listAction();
            return $controller->$method($id); // appel de la methode du controleur
        }

        public static function redirect($ctrl = null, $action = null, $id = null){
            
            $ctrl = $ctrl ?? DEFAULT_CTRL; // : "store";
            $action = $action ?? DEFAULT_ACTION; //"index";
            
            // $ctrl = $ctrl ? $ctrl : "store";
            // $action = $action ?? "index";

            header("Location:?ctrl=$ctrl&action=$action&id=$id");
            return;
        }
    }