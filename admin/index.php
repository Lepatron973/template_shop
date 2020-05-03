<?php
    use Admin\RouterAdmin;
    $root_dir = dirname(__DIR__);
    require_once $root_dir."/admin/RouterAdmin.php";
$path = basename(dirname(__DIR__));

$router = new RouterAdmin();

$path = isset($_GET['path']) ? $_GET['path'] : 'admin';
$post = isset($_POST) ? $_POST : NULL;
if($_POST['path'])
    $path = $_POST['path'];
$router->setPost($post);

$router->setUrl($path);


$router->serveRoute();
