<?php

    $cart = App\Service\CartHandlerService::getCart();

    if($cart->isEmpty()){
        echo "<p>Aucun produit en session...</p>";
    }else{
        echo "<table id='recap'>",
                "<thead>",
                    "<tr>",
                        "<th>#</th>",
                        "<th>Nom</th>",
                        "<th>Prix</th>",
                        "<th>Quantité</th>",
                        "<th>Total</th>",
                    "</tr>",
                "</thead>",
                "<tbody>";
        $totalGeneral = 0;
        foreach($cart->getLines() as $index => $line){
            echo "<tr>",
                    "<td class='text-center'>
                        <a href='?ctrl=cart&action=remove&index=$index'>&times;</a>
                    </td>",
                    "<td>" . $line['product']->getName() . "</td>",
                    "<td class='text-right'>" . $line['product']->getPrice(true) . "&nbsp;€</td>",
                    "<td class='text-center'>" . $line['quantity'] . "</td>",
                    "<td class='text-right'>" . number_format($line['total'], 2, ",", "&nbsp;") . "&nbsp;€</td>",
                "</tr>";
            $totalGeneral += $line['total'];
        }
        echo "<tr>",
                "<td colspan=4>Total général : </td>",
                "<td class='text-right'><strong>".number_format($totalGeneral, 2, ",", "&nbsp;")."&nbsp;€</strong></td>",
            "</tr>",
        "</tbody>",
        "</table>";

        echo "<a href='traitement.php?action=clear'>Vider le panier</a>";
    }
?>