<?php
    // Ceci est le front controller !
    // c'est le seul fichier de dialogue avec l'utilisateur
    require "vendor/autoload.php";
    require "config.php";

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
    //démarre une tamporisation de sortie - output buffer
    ob_start(); //tamporisation de sortie - output buffer
    
    //tous les affichages à partir de ob_start() se stockent dans un tampon de sortie
    include TEMPLATE_DIR.$response["view"]; // "template/".$response["view"];

    //ici, je récupère ce qu'il y a dans le tampon et le met dans une variable
    //(au lieu de l'afficher directement)
    $page = ob_get_contents();

    //je vide le tampon, qui ne me sert plus à rien depuis qu'on a stocké dans une variable
    //le contenu de celui-ci
    ob_end_clean();

    include "template/layout.php";

