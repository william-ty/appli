<?php
    $products = $response["data"];
?>

    <h1>Produits en stock</h1>

    <p>
        <a href="?ctrl=admin&action=add">Ajouter un produit</a>
    </p>
            <table>
                <?php
                    echo "<thead>",
                            "<tr>",
                                "<td>REFERENCE</td>
                                <td>NOM</td>
                                <td>PRIX</td>",
                            "</tr>",
                        "</thead>",
                        "<tbody>";
                            foreach($products as $product){
                                echo "<tr>",
                                    "<td>".$product->getId()."</td>",
                                    "<td style='font-weight: bold'>".$product->getName()."</td>",
                                    "<td>".$product->getPrice(true)."€</td>",
                                    "<td><a href='?ctrl=admin&action=delete&id=".$product->getId()."'>Supprimer du stock</a></td>",
                                    "</tr>";
                            }
                        "</tbody>";
                ?>
            </table>
