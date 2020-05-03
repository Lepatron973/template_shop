<?php
    namespace Admin\Controller;
    use App\Entity\HomeEntity ;
    use App\Entity\ProductEntity ;
   // define("ADMIN_DIR", PATH.'/'.basename(dirname(__DIR__)));
    $root_dir = $root_dir == NULL ? dirname(dirname(__DIR__)) : $root_dir;
    define("DIR", $root_dir);
    
    include DIR.'/src/Entity/HomeEntity.php';
    include DIR.'/src/Entity/ProductEntity.php';
    
    
    /**
     * Cette classe permet de personnaliser l'interface, il modifie les données de la page Home
     */
    
    class AdminController{
        
        /**
         * Fonction principale de la classe AdminController
         * 
         */
        static function Admin(Array $post=[]){
            
            
            switch($post["action"]){

                case 'add/edit':
                    $post = $post['edit'];
                    //$post = self::associativeArrayFormat($post);
                    foreach( $post as $key => $value){
                        if (\substr($key,0,2) == "id") {
                        $post[$key] =  \intval($value);
                        }
                    }
                    $managers = self::loadFunction($post);
                    var_dump($post);
                break;
                
            
                case 'delete':
                    var_dump($post['delete']['id_slider']);
                    $post['delete']['id_slider'] = \intval($post['delete']['id_slider']);
                    $managers = self::loadFunction($post['delete']);
                break;
            
            
                case 'getManager':
                    $managers = self::loadFunction($post);
                    echo json_encode($managers);
                break;
                
                
                default:
                    $managers = self::loadFunction($post);
                    require_once DIR.'/admin/templates/base_admin.php';
                break;
                
            }
            
        }
          
        
        private function loadFunction(array $post): Array
        {
            switch ($post['class']) {
                case 'add_slider':
                    
                    $homeManager = new HomeEntity();
                    self::addSlider($post,$homeManager);
                break;
                case 'add_product':
                    $productManager = new ProductEntity();
                    self::addProduct($post,$productManager);
                break;
                case 'edit_slider':
                    
                    $homeManager = new HomeEntity();
                    
                    self::editSlider($post,$homeManager);
                break;
                case 'delete_slider':
                    
                    $homeManager = new HomeEntity();
                    
                    self::deleteSlider($post,$homeManager);
                break;
                
                default:
                
                break;
            }
            // "productManager" => new ProductEntity()
            
            return ["homeManager" => new HomeEntity()];
        }

        public function associativeArrayFormat($array){
            if (\gettype($array) == "array") {
                $array = \implode($array);
            }
            $array = \explode(':',$array);
            $arrayFormated = [];
            $i=0;
            
           while($i < count($array)){
                $arrayFormated[$array[$i]] = $array[$i+1];
                
                $i+=2;
            }
            return $arrayFormated;
        }
    
        public function addSlider(array $post,HomeEntity $hm)
        {
            $hm->insertSlider($post);
        }
        
        public function editSlider(array $post, HomeEntity $hm)
        {
            $hm->updateSlider($post);
        }
        public function deleteSlider(array $post, HomeEntity $hm)
        {
            
            $hm->deleteSlider($post['id_slider']);
        }
        public function addArticle()
        {
            
        }
        
        public function editArticle()
        {
            
        }
        
        private function addProduct(array $post,ProductEntity $pd):void
        {
            $pd->insertProduct($post);
        }
   

        public function editProduct()
        {

        }
    }