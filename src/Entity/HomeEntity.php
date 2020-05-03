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

        public function insertSlider($post){
            $sql = "INSERT INTO slider (title_slider,image_slider) VALUES (:title,:image)";
            $req = $this->pdo->prepare($sql);
            $req->bindValue(':title',$post['title_slider'],\PDO::PARAM_STR);
            $req->bindValue(':image',$post['image_slider'],\PDO::PARAM_STR);
            if(!$req->execute()){
                echo "Erreur PDO:<br> 
                Code d'erreur: ". $req->errorInfo()[1]."<br>
                Message d'erreur: ".$req->errorInfo()[2]; 
            };
            
        }

        public function updateSlider($post):void
        {
            $sql = "UPDATE slider SET title_slider = ?, image_slider = ? WHERE id_slider = ?";
            $req = $this->pdo->prepare($sql);
            $req->bindValue(1,$post['title_slider'],\PDO::PARAM_STR);
            $req->bindValue(2,$post['image_slider'],\PDO::PARAM_STR);
            $req->bindValue(3,$post['id_slider'],\PDO::PARAM_INT);
            if(!$req->execute()){
                echo "Erreur PDO:<br> 
                Code d'erreur: ". $req->errorInfo()[1]."<br>
                Message d'erreur: ".$req->errorInfo()[2]; 
            };
        }

        public function deleteSlider($id_slider){
            $sql = "DELETE FROM slider WHERE id_slider = ?";
            $req = $this->pdo->prepare($sql);
            $req->bindValue(1,$id_slider,\PDO::PARAM_INT);
            if(!$req->execute()){
                echo "Erreur PDO:<br> 
                Code d'erreur: ". $req->errorInfo()[1]."<br>
                Message d'erreur: ".$req->errorInfo()[2]; 
            };
        }
        
    }