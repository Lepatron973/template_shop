<?php
namespace App\AbstractClass;

/**
 * classe abstraite permettant le lien à la bdd
 */

abstract class EntityController{
    protected $bdd_name = "shop_template";
    protected $bdd_user = "speedy";
    protected $bdd_password = "jeremy973";

    // fonction permettant la connexion à la bdd
    protected function connexion():object
    {
        $pdo = new \PDO('mysql:host=localhost;dbname='.$this->bdd_name,$this->bdd_user,$this->bdd_password);
        return $pdo;
    }
    /**
     * @var string $table
     */
    public function findAll(string $table):array
    {
        
        $pdo = $this->connexion();
        $req = $pdo->prepare("SELECT * FROM $table");
        
       
           if($req->execute() && $req->rowCount() != 0){
               $value = $req->fetchAll();
               
           }else{
               $value = array();
           }
           return $value;
           //code...
       
    }
    
}
