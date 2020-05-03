<?php
    namespace Admin\Controller;
    use App\Entity\HomeEntity ;
    use App\Entity\ProductEntity ;
    $root_dir = dirname(dirname(__DIR__));
    define('DIR',$root_dir);
    
    include $root_dir.'/src/Entity/HomeEntity.php';
    include $root_dir.'/src/Entity/ProductEntity.php';
     
    class Managers{
        
        static function loadManagers(){
             echo json_encode([
                "homeManager" => new HomeEntity(),
                "productManager" => new ProductEntity()
                ]);
        }
    }

    Managers::loadManagers();