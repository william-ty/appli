<?php
    require "vendor/autoload.php";

    session_start();

// require_once "Product.php";
//     session_start();
//     require_once "MessageService.php";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Oxygen&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="public/css/style.css">
        <title>Récapitulatif des produits</title>
    </head>
    <body>
        <?php 
            include "menu.php";
            include "messages.php";
        ?>
    </body>
</html>