<?php
    namespace App\Entity;

    require_once DIR.'/src/Class/EntityController.php';
 
    use App\AbstractClass\EntityController;

    class ProductEntity extends EntityController{

        private $id_product;
        private $name_product;
        private $image_product;
        private $description_product;
        private $price_product;
        private $category;

        public function __construct()
        {
            $this->pdo = $this->connexion();
        }

        public function insertProduct(array $post):void
        {
            $sql = 
            "INSERT INTO product (name_product,image_product,description_product,price_product,category)
             VALUES (:name,:image,:description,:price,:category)
            ";
            $req = $this->pdo->prepare($sql);
            $req->bindValue(':name',$post['name_product'],\PDO::PARAM_STR);
            $req->bindValue(':image',$post['image_product'],\PDO::PARAM_STR);
            $req->bindValue(':description',$post['description_product'],\PDO::PARAM_STR);
            $req->bindValue(':price',$post['price_product'],\PDO::PARAM_STR);
            $req->bindValue(':category' ,$post['category'],\PDO::PARAM_STR);
            if(!$req->execute()){
                echo "Erreur PDO:<br> 
                      Code d'erreur: ". $req->errorInfo()[1]."<br>
                     Message d'erreur: ".$req->errorInfo()[2]; 
            }else{
                echo 'success';
            }

        }
    }