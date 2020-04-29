<?php
    namespace App\Controller;
    
    class HomeController{

        static function Home(){
            global $view;
            $view = "home";
            
            require_once DIR.'/template/views/home.php';
        }
    }