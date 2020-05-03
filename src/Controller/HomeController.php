<?php
    namespace App\Controller;
    use App\Entity\HomeEntity;
    require_once DIR.'/src/Entity/HomeEntity.php';
    class HomeController{

        static function Home(){
            global $view;
            $homeManager = new HomeEntity();
            $view = "home";
            
            require_once DIR.'/template/views/home.php';
        }
    }