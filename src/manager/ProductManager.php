<?php

    namespace App\Manager;

    use App\Core\DAO;
    use App\Entity\Product;

    /**
     * Gestionnaire de produits en base de données
     */
    class ProductManager extends DAO
    {
        protected $pdo;

        public function __construct(){
            $this->pdo = new \PDO(
                "mysql:host=localhost:3306;dbname=appli",
                "root",
                "",
                [
                    \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION, //les erreurs venant de MySQL seront des Exception
                    \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC //on récupère les données de MySQL dans un tableau associatif
                    //ex : ['name' => 'Biscuit', 'price' => 25.5]
                ]
            );
        }

        /**
         * Récupère tous les produits de la base de données
         * 
         * @return $products - tableau d'objets Product correspondants
         */
        public function getAll(){
            
            $sql = "SELECT id, name, price FROM product";//select tous les produits
            $statement = $this->pdo->query($sql);//on prépare la requête
            $results = $statement->fetchAll();//on récupère tous les enregistrements

            $products = [];//on initialise le tableau final qui va contenir les produits
            foreach($results as $result){//pour chaque résultat trouvé en base de données
                $products[] = new Product(//on instancie un objet Product
                    $result["id"],
                    $result["name"], 
                    $result["price"]
                );
            }
            return $products;
        }
        public function getOneById($id) :Product { 
            
            $sql = "SELECT id, name, price FROM product WHERE id = :id";
            $statement = $this->pdo->prepare($sql);

            $statement->execute([
                "id" => $id
            ]);

            $result = $statement->fetch();

            return new Product(
                $result['id'],
                $result['name'],
                $result['price']
            );

        }

        public function delete($id){

            $sql = "DELETE FROM product WHERE id = :id";
            $statement = $this->pdo->prepare($sql);
            
            $statement->execute([
                "id" => $id
            ]);

        }
        /**
         * Insère un nouveau produit dans la base de données
         * 
         * @return bool le résultat de l'insertion en base (bon ou pas bon)
         */
        public function insert($name, $price){
            $sql = "INSERT INTO product (name, price) VALUES (:name, :price)";
            $statement = $this->pdo->prepare($sql);
            
            return $statement->execute([
                "name"  => $name,
                "price" => $price,
            ]);
        }
    }