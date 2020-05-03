<?php
    namespace App\Entity;

   require_once DIR.'/src/Class/EntityController.php';

    use App\AbstractClass\EntityController;

    class HomeEntity extends EntityController{
        public $slider;
        public $banner;

        public function __construct()
        {
            $this->pdo = $this->connexion();
            $this->slider = $this->findAll('slider');
            $this->banner = $this->findAll('banner');
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

        public function dropSlider($id_slider){
            $sql = "DELETE FROM slider WHERE id_slider = ?";
            $req = $this->pdo->prepare($sql);
            $req->bindValue(1,$id_slider,\PDO::PARAM_INT);
            if(!$req->execute()){
                echo "Erreur PDO:<br> 
                Code d'erreur: ". $req->errorInfo()[1]."<br>
                Message d'erreur: ".$req->errorInfo()[2]; 
            };
        }

        public function insertBanner($post){
            $sql = "INSERT INTO banner (section,title_banner,image_banner, description_banner, subtitle_banner, image_title_banner) VALUES (?,?,?,?,?,?)";
            $req = $this->pdo->prepare($sql);
            $req->bindValue(1,$post['section'],\PDO::PARAM_STR);
            $req->bindValue(2,$post['title_banner'],\PDO::PARAM_STR);
            $req->bindValue(3,$post['image_banner'],\PDO::PARAM_STR);
            $req->bindValue(4,$post['description_banner'],\PDO::PARAM_STR);
            $req->bindValue(5,$post['subtitle_banner'],\PDO::PARAM_STR);
            $req->bindValue(6,$post['image_title_banner'],\PDO::PARAM_STR);
            if(!$req->execute()){
                echo "Erreur PDO:<br> 
                Code d'erreur: ". $req->errorInfo()[1]."<br>
                Message d'erreur: ".$req->errorInfo()[2]; 
            };
            
        }

        public function updateBanner($post):void
        {
            $sql = "UPDATE banner SET section = ?, title_banner = ?, image_banner = ?, description_banner = ?, subtitle_banner = ?, image_title_banner = ? WHERE id_banner = ?";
            $req = $this->pdo->prepare($sql);
            $req->bindValue(1,$post['section'],\PDO::PARAM_STR);
            $req->bindValue(2,$post['title_banner'],\PDO::PARAM_STR);
            $req->bindValue(3,$post['image_banner'],\PDO::PARAM_STR);
            $req->bindValue(4,$post['description_banner'],\PDO::PARAM_STR);
            $req->bindValue(5,$post['subtitle_banner'],\PDO::PARAM_STR);
            $req->bindValue(6,$post['image_title_banner'],\PDO::PARAM_STR);
            $req->bindValue(7,$post['id_banner'],\PDO::PARAM_INT);
            if(!$req->execute()){
                echo "Erreur PDO:<br> 
                Code d'erreur: ". $req->errorInfo()[1]."<br>
                Message d'erreur: ".$req->errorInfo()[2]; 
            };
        }

        public function dropBanner($id_banner){
            $sql = "DELETE FROM banner WHERE id_banner = ?";
            $req = $this->pdo->prepare($sql);
            $req->bindValue(1,$id_banner,\PDO::PARAM_INT);
            if(!$req->execute()){
                echo "Erreur PDO:<br> 
                Code d'erreur: ". $req->errorInfo()[1]."<br>
                Message d'erreur: ".$req->errorInfo()[2]; 
            };
        }
        
    }