<?php 
    ob_start();$var="e"; 
    $homeController->setPage('detail');
?>
    <div class="detail mt-5 pt-3">
        <div class="container-lg container-md container-fluid d-lg-flex d-md-flex" id="section-1">
            <div class="col-lg-6 col-md-6 col-12">
                <img class="col-12" src="https://i1.wp.com/www.yanaswag.ml/wp-content/uploads/2020/04/Blanc-noir-hommes-sweats-capuche-ensemble-mode-2019-automne-marque-surv-tement-de-sport-hommes-ensemble.jpg?fit=800%2C800&ssl=1" alt="">
                <div class="col-12 gallery">
                    <img class="col-lg-3 col-md-4 col-sm-2 col-3" src="https://i1.wp.com/www.yanaswag.ml/wp-content/uploads/2020/04/Blanc-noir-hommes-sweats-capuche-ensemble-mode-2019-automne-marque-surv-tement-de-sport-hommes-ensemble.jpg?fit=800%2C800&ssl=1" alt="">
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <h2 class="name m-2"><?= $var ?> name product</h2>
                <h4 class="price m-3"><?= $var ?>14€</h4>
                <p class="variation">
                    <?= $var ?>
                </p>
                <ul class="liste-variation">
                    <?= $var ?>
                </ul>
                <p class="taille">
                    <?= $var ?>
                </p>
                <ul class="liste-taille">
                    <?= $var ?>
                </ul>
            </div>
        </div>
        <div class="container-lg container-md container-fluid mt-4 pt-3 " id="section-2">
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">DESCRIPTION</a>
                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">AVIS</a>
                    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Contact</a>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active mt-4 pt-3" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    <h4>Description</h4>
                    <p class="text-description mt-4 pt-3"><?= $var ?> la description</p>
                </div>
                <div class="tab-pane fade mt-4 pt-3" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                <h4>Avis</h4>
                    <p class="text-description mt-4 pt-3"><?= $var ?> les avis</p>
                </div>
                <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">c</div>
            </div>
        </div>
    </div>
<?php $content = ob_get_clean(); require_once DIR.'/template/base.php'; ?>