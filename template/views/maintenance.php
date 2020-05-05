<?php 
    ob_start();$var="e"; 
    $homeController->setPage('maintenance');
?>
    <div class="maintenance">
        <div class="d-flex justify-content-center">
            <img src="https://sarl-rjs.fr/images/maintenance.gif" alt="">
            <h1 class="align-self-center text-light">Page encours de programmation</h1>
            <img src="https://sarl-rjs.fr/images/maintenance.gif" alt="">
        </div>
        <p class="container mt-4 pt-3 text-light jumbotron bg-dark">
            Ce site est le projet actuel sur lequel je travail c'est la raison pour laquelle vous tomber sur cette page
            Je me ferai un plaisir de vous faire le tour du propriétaire mais je suis au charbon en ce moment <span>&#128527;</span>.
            Le site est quotidiennement mis à jour par l'intérmédiaire 
            de <strong><a href="https://github.com/Lepatron973/template_shop.git" class='git-link'>Mon github <i class="fab fa-github"></i></a></strong> n'hésité pas à y faire un tour.
            Sur ce je vous laisse et je retourne sur le chantier <span>&#128516;</span>! À bientôt!
        </p>
        
    </div>
<?php $content = ob_get_clean(); require_once DIR.'/template/base.php'; ?>