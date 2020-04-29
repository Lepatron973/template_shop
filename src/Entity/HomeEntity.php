<?php
    namespace App\Entity;

   require_once DIR.'/src/Class/EntityController.php';

    use App\AbstractClass\EntityController;

    class HomeEntity extends EntityController{
        public $slider;
        public $first_banner;
        public $second_banner;

        public function __construct()
        {
            $this->pdo = $this->connexion();
            $this->slider = $this->findAll('slider');
        }

        public function setSlider(array $slider):void
        {
            $this->slider = $slider;
            
        }

        public function insertSlider($value){
            $sql = "INSERT INTO slider (image_slider) VALUES (:image)";
            $req = $this->pdo->prepare($sql);
            $req->bindValue(':image',$value,\PDO::PARAM_STR);
            if(!$req->execute()){
                echo "error";
            };
            var_dump($value);
        }
        
    }