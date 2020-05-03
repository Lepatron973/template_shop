<?php
    namespace Admin;
    use Admin\Controller\AdminController;
    require_once $root_dir."/admin/controller/AdminController.php";
    
class RouterAdmin{
    private $url;
    private $post;
    public function serveRoute(){
        
        switch ($this->getUrl()) {
    
            case 'shop':
                ShopController::Shop();
                break;
            case 'detail':
                ShopController::Detail();
                break;
            case 'admin':
                AdminController::Admin($this->getPost());
                break;
            
            default:
                # code...
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