<?php
    namespace App\Controller;
    use App\Entity\HomeEntity;
    require_once DIR.'/src/Entity/HomeEntity.php';


    class HomeController{
        private $page;

        static function Home(){
            
            $homeManager = new HomeEntity();
            $homeController = new HomeController();
            
            
            require_once DIR.'/template/views/home.php';
        }

        public function setPage(String $page):void
        {
            $this->page = $page;
        }

        public function getPage():string
        {
            return $this->page;
        }
    }