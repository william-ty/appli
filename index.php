<?php
    // Ceci est le front controller !
    // c'est le seul fichier de dialogue avec l'utilisateur
    require "vendor/autoload.php";

    use App\Service\RouterService;

    session_start();

    /*
        $response est le retour du controleur necessaire à la requete du client
        [
            "view" => la vue a afficher au client,
            "data" => les données pour remplir la vue
        ]
    */
    $response = RouterService::handleRequest($_GET);

//-------------CHARGEMENT DE LA REPONSE AU CLIENT------//
    include "template/store/".$response["view"];

