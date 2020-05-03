<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <title>admin</title>
</head>
<body>
    
    <h1 class=text-center>Admin page</h1>
    <nav class='d-flex justify-content-center'> 
        <?php require_once 'views/header_admin.php'; ?>
    </nav>
    <?php echo "<pre>";
        //var_dump($managers['homeManager']->slider); 
        echo "</pre>";
        $test= $managers;
        ?>
    <div class="container" id="app">
       <?php print_r(json_encode($test)); ?>
            
    </div>
    <script src="https://kit.fontawesome.com/8b165d18c8.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.0.min.js"></script>
    <script src="script/js/admin.js"></script>
</body>
</html>