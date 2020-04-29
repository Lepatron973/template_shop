<?php


define("DIR", dirname(__FILE__));
define("PATH",$_SERVER['SERVER_NAME'].'/'.basename(DIR));
require_once DIR."/src/router.php";


use App\Router;

$router = new Router();

$path = isset($_GET['path']) ? $_GET['path'] : 'home';
$post = isset($_POST) ? $_POST : NULL;
if($_POST['path'])
    $path = $_POST['path'];
$router->setPost($post);

$router->setUrl($path);


$router->serveRoute();