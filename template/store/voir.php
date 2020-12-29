<?php
    $product = $response["data"];
?>
    <p>
        <a href="?ctrl=store">&larr; Retour à la liste</a>
    </p>
    <article>
        <h1><?= $product->getName()?></h1>
        <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore beatae numquam cumque dolores voluptas, explicabo aliquam tenetur eius odit, earum dolorum eum ab, expedita in mollitia nemo a sed corporis?
        </p>
        <p>
            <?= $product->getPrice(true)?>&nbsp;€
        </p>
        <p>
            <a href="?ctrl=cart&action=incart&id=<?= $product->getId() ?>'">Ajouter au panier</a>
        </p>
    </article>


    <!-- var_dump($response["data"]); -->