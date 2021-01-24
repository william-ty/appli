<?php

namespace App\Controller;

use App\Manager\ProductManager;
use App\Service\CartHandlerService as CHS;
use App\Service\RouterService as Router;
use App\Service\MessageService as MS;

class CartController
{
    private $manager;

    public function __construct()
    {
        $this->manager = new ProductManager();
    }

    public function indexAction()
    {
        return [
            "view" => "cart/cart.php",
        ];
    }

    public function incartAction($idProduct)
    {

        $manager = new ProductManager();
        $product = $manager->getOnebyId($idProduct);

        $cart = CHS::getCart(); //récupère le panier en session
        $cart->addProduct($product); //ajout du produit commande
        CHS::setCart(($cart)); //on met a jour le panier en session

        MS::setMessage("success", "Produit ajouté au panier !");
        return Router::redirect("cart");
    }

    public function removeAction($lineIndex)
    {

        // $manager = new ProductManager();
        // $product = $manager->delete($lineIndex);

        $cart = CHS::getCart();
        $cart->removeProduct($lineIndex);
        CHS::setCart(($cart));

        MS::setMessage("success", "Produit supprimé du panier !");
        return Router::redirect("cart");
    }

    public function clearAction()
    {

        $cart = CHS::getCart();
        $cart->removeProduct($lineIndex);
        CHS::eraseCart(($cart));

        MS::setMessage("success", "Produit supprimé du panier !");
        return Router::redirect("cart");
    }
}
