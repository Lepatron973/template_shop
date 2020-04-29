<?php
    namespace Admin\Controller;
    use App\Entity\HomeEntity ;
    include DIR.'/src/Entity/HomeEntity.php';
    
    
    /**
     * Cette classe permet de personnaliser l'interface, il modifie les données de la page Home
     */
    
    class AdminController{
        static function Admin($post=null){
            
            $homeManager = new HomeEntity();
            var_dump($homeManager->slider);
            if($post != null){
                self::HomeSet($post,$homeManager);
            }
            require_once DIR.'/admin/templates/base_admin.php';

        }

        private function HomeSet($post,$hm){
            $hm->insertSlider($post['image_banner']);
        }
    }