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

        public function pagination($displayPage)
        {
            $perPage = 8;
            $category = $displayPage['category'];
            $order = $displayPage['order'];
            //$order = $displayPage['order'];
            if ($order != 'none' && $order != NULL && $category != "none") {
                $sql = $displayPage['req'] == "count" ? "SELECT COUNT(*) AS nbProduct FROM product ORDER BY $order " : "
                SELECT * FROM product WHERE category ='" .$category . "' ORDER BY $order  LIMIT ".(($displayPage['currentPage']-1))*$perPage.",$perPage"; 
            }elseif($order != 'none' && $order != NULL){
                $sql = $displayPage['req'] == "count" ? "SELECT COUNT(*) AS nbProduct FROM product ORDER BY $order " : "
                SELECT * FROM product ORDER BY $order  LIMIT ".(($displayPage['currentPage']-1))*$perPage.",$perPage"; 
            }
            elseif($displayPage['category'] != 'none'){
                $sql = $displayPage['req'] == "count" ? "SELECT COUNT(*) AS nbProduct FROM product WHERE category ='".$displayPage['category'] ."' " : "
                SELECT * FROM product WHERE category ='" .$category . "'  LIMIT ".(($displayPage['currentPage']-1))*$perPage.",$perPage"; 
            }
            else{
                $sql = $displayPage['req'] == "count" ? "SELECT COUNT(*) AS nbProduct FROM product " : "
                SELECT * FROM product LIMIT ".(($displayPage['currentPage']-1))*$perPage.",$perPage"; 
            }
            $req = $this->pdo->prepare($sql);
            if(!$req->execute()){
                echo "Erreur PDO:<br> 
                Code d'erreur: ". $req->errorInfo()[1]."<br>
                Message d'erreur: ".$req->errorInfo()[2]; 
            };
            
            if ($displayPage['req'] == 'count') {
                $product = $req->fetch(\PDO::FETCH_ASSOC);
                $product['nb_page']= \ceil($product['nbProduct'] /$perPage );
                
            }else{
                $product = $req->fetchAll(); 
            }
            return $product;
            

        }
        
        public function getCategory(){
            
            $sql = "SELECT DISTINCT category  FROM product";
            $req = $this->pdo->query($sql);
            return $product = $req->fetchAll();
        }
    }