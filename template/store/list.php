<?php
// on récupère les données à afficher depuis la réponse du contrôleur
// $response["data"]
    $products = $response["data"];
?>      
<!-- afficher la liste de tous les produits en base (en utilisant 
$manager->getAll()
et permettre via un simple lien de le mettre dans le panier
<a href="traitement.php?action=incart&id=?">Ajouter au panier</a>
ou ? est égal à l'id du produit dans la bdd -->

<div id="wrappy">
<?php

    foreach($products as $product){
        echo "<div class='products' style='display:flex; flex-direction: column'>",
                "<p style='font-weight: bold'>",
                    "<a href='?ctrl=store&action=voir&id=".$product->getId()."'>",
                        $product->getName(),
                    "</a>",
                "</p>",
                "<p>",
                    $product->getPrice(true),
                "€</p>",
                "<a href='traitement.php?action=incart&id=".$product->getId()."'>Ajouter au panier</a>",
            "</div>";
    }

?>
</div>