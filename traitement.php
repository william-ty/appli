<?php
    require "vendor/autoload.php";

    session_start();

    use App\Manager\ProductManager;
    use App\Service\MessageService;
    
    $manager = new ProductManager(); 
    
    // require_once "ProductManager.php";
    // $manager = new ProductManager(); 
    // session_start();
    // require_once "MessageService.php";

    if(isset($_GET['action'])){

        switch($_GET['action']){
                // ajout d'un produit choisi en session (dans le panier)
            // case "incart": 
                // // on récupère le bon produit dans la base de données
                // $product = $manager->getOneById($_GET['id']);
                // // on créé une ligne de panier avec :
                // // - le produit complet
                // // - la quantité à 1 (pour l'instant)
                // // - et un total égal au prix du produit vu que la quantité est à 1
                // $order = [
                //     "product"   => $product,
                //     "qtt"       => 1,
                //     "total"     => $product->getPrice()
                // ];
                // // on insère la ligne panier dans le panier en session
                // $_SESSION['cart'][] = $order;
                // // un petit message de succès avec un lien pour aller au panier 
                // MessageService::setMessage("success",
                //     "Produit ajouté au panier - <a href='recap.php'>Voir mon panier</a>"
                // );
                // // on redirige vers la liste des produits
                // header("Location:index.php");
                // die;
            //ajout de produit
            // case "add": 
            //     if(isset($_POST['submit'])){

            //         $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING);
            //         $price = filter_input(INPUT_POST, "price", FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
            //         $qtt = filter_input(INPUT_POST, "qtt", FILTER_VALIDATE_INT);
            
            //         if($name && $price){
                        
  
            //             $manager->insert($name, $price);    //ajout en base de données
            //             MessageService::setMessage("success", "Produit ajouté avec succès !!");
            //         }
            //         else MessageService::setMessage("error", "Formulaire mal rempli, réessayez !");
            //     }
            //     else MessageService::setMessage("error", "Vous n'avez pas soumis le formulaire...");
            //     header("Location:form.php");
            //     die;

            //supprimer un produit avec son index
            case "delete":
                if(isset($_SESSION['cart'][$_GET['index']])){
                    $indexProduit = $_GET['index'];
                    unset($_SESSION['cart'][$indexProduit]);
                    MessageService::setMessage("success", "Produit supprimé avec succès !!");
                }
                else MessageService::setMessage("error", "Le produit demandé n'existe pas...");
                break;

            //vider la session
            case "clear": 
                if(!empty($_SESSION['cart'])){
                    unset($_SESSION['cart']);
                    MessageService::setMessage("success", "Liste des produits effacée !!");
                }
                break;
            // case "suppr":
            // // supprimer un produit
            //     if(isset($_GET['id'])){

            //         $manager->delete($_GET['id']);
            //         MessageService::setMessage("success", "Produit supprimé avec succès !!");
            //     } else {
            //         MessageService::setMessage("error", "Mauvaise requête !!");
            //     }
            //     header("Location:form.php");
            //     die;
            // break;
        }//fin du switch
        //dans le cas où l'action n'a redirigé nulle part
        header("Location:recap.php");
        die;
    }
    //on redirige vers index dans ces deux cas de figure : 
    // - soit on est arrivé ici sans $_GET['action']
    // - soit on a une $_GET['action'] qui ne correspond à aucune action prévue
    header("Location:index.php");    
    