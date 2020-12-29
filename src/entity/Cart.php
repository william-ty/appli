<?php

namespace App\Entity;

use App\Entity\Product;

class Cart {
    //modèle de ligne du panier
    private static $lineModel = [
        "product" => "",
        "quantity" => 0,
        "total" => 0
    ];

    private $lines = [];
    private $nbProducts = 0;
    private $total = 0;

    public function addProduct(Product $product) {
        $line = self::$lineModel; //on créé une nouvelle ligne de panier
        $line["product"] = $product;     
        $line["quantity"]++;   
        $line["total"]  = $product->getPrice() * $line["quantity"];

        $this->lines[] = $line;
        $this->nbProducts += $line["quantity"];
        $this->total += $line["total"];
    }

    public function removeProduct($lineIndex) {
        unset($this->lines[$lineIndex]);
    }

    public function getLines() {
        return $this->lines;
    }

    public function getNbProducts() {
        return $this->getNbProducts;
    }

    public function isEmpty() :bool {
        return empty($this->lines);
    }

    public function getTotal($formatted = false) {
        if($formatted){
            return number_format($this->total, 2, ",", "&nbsp;");  
        }
        return $this->total;
    }
}
