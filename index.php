<?php
    session_start();    
    require_once "MessageService.php";//j'intègre le code présent dans MessageService.php ici
    require_once "ProductManager.php";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Oxygen&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="style.css">
        <title>Boutique</title>
    </head>
    <body>
        <?php 
            include "menu.php";
            include "messages.php";
        ?>
        <div id="wrappy">
        <?php
        $manager = new ProductManager();


        // $manager->getAll();
        foreach($manager->getAll() as $product){
            echo "<div class='products' style='display:flex; flex-direction: column'>",
                 "<p style='font-weight: bold'>".$product->getName()."</p>",
                 "<p>".$product->getPrice(true)."€</p>",
                 "<a href='traitement.php?action=incart&id=".$product->getId()."'>Ajouter au panier</a>",
                 "</div>";
        }

        // var_dump($manager->getAll());
        
        // echo "<a href='traitement.php?action=incart&id=?''>Ajouter au panier</a>";
        
        ?>

        </div>
        <!-- afficher la liste de tous les produits en base (en utilisant 
        $manager->getAll()
        et permettre via un simple lien de le mettre dans le panier
        <a href="traitement.php?action=incart&id=?">Ajouter au panier</a>
        ou ? est égal à l'id du produit dans la bdd -->
        
    </body>
</html>
