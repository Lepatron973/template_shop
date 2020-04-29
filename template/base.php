<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> 
    <link rel="stylesheet" href="public/css/style.css">
    <link rel="stylesheet" href="public/css/header.css">
    <link rel="stylesheet" href="public/css/<?= $view ?>.css">
    <title>{{$title_site}}</title>
</head>
<body>
    <a class="d-none" href="https://icons8.com/icon/83804/menu-carré">Menu carré icon by Icons8</a>
    <!--incursion header-->
    <?php require_once __DIR__.'/views/header.php' ?>

    <div class="content">
        <?= $content ?>
    </div>
     <!--incursion footer-->
    <?php require_once __DIR__.'/views/footer.php' ?>
    
    <!--script section-->
    <script src="https://kit.fontawesome.com/8b165d18c8.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="public/js/header.js"></script>
    <script src="public/js/<?=$view?>.js"></script>
</body>
</html>