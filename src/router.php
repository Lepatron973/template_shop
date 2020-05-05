<?php
    namespace App;
    use App\Controller\HomeController;
    use App\Controller\ShopController;
    require_once 'Controller/ShopController.php';
    require 'Controller/HomeController.php';
    
    class Router{
        private $url;
        private $post;
        public function serveRoute(){
            
            switch ($this->getUrl()) {
                case 'home':
                    HomeController::Home();  
                    break;
                // case 'account':
                //     AccountController::Account();  
                //     break;
                case 'shop':
                    ShopController::Shop();
                    break;
                // case 'detail':
                //     ShopController::Detail();
                //     break;
                case 'admin':
                    header("Location: admin");
                    break;
                
                default:
                HomeController::Maintenance();
                    break;
            }
        }
        public function getUrl()
        {
            return $this->$url;
        }
        public function setUrl(string $path='home'):void
        {
            $this->$url = $path;
        }
        
        public function getPost():array
        {
            return $this->post;
        }

        public function setPost(array $post):void
        {
            $this->post = $post;
        }
    }
    