<?php 
    namespace App\Controller;

    use App\Entity\ProductEntity;
    require DIR.'/src/Entity/ProductEntity.php';

    class ShopController
    {
        static function Shop()
        {
            $homeController = new HomeController();     
            $shopController = new ShopController();
            require_once DIR.'/template/views/shop.php';
        }

        public function paginate($displayPage){
            $ProductManager = new ProductEntity();
            return $ProductManager->pagination($displayPage);
        }

        public function category(){
            $ProductManager = new ProductEntity();
            return $ProductManager->getCategory();
        }

        
    }
    