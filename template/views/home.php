<?php ob_start(); $homeController->setPage('home');?>
<div class="home">
    <!-- start section caroussel -->
    <section id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
       <ol class="carousel-indicators">
       <?php $i=0; foreach($homeManager->slider as $slider){ $indicatorActive = $i == 0 ? "active" : ""; ?>
           <li data-target="#carouselExampleIndicators" data-slide-to="<?= $i ?>" class="<?= $indicatorActive?>"></li>
        <?php $i++; }?>
       </ol>
       <div class="carousel-inner">
            <?php $i=0; foreach($homeManager->slider as $slider){ $sliderActive = $i == 0 ? "active" : ""; ?>
           <div class="carousel-item <?= $sliderActive?>">
               <img class="d-block w-100" src="<?= $slider['image_slider'] ?>" alt="<?= $slider['title_slider'] ?>">
           </div>
            <?php $i++; }?>
       </div>
           <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
               <span class="carousel-control-prev-icon" aria-hidden="true"></span>
               <span class="sr-only">Previous</span>
           </a>
           <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
               <span class="carousel-control-next-icon" aria-hidden="true"></span>
               <span class="sr-only">Next</span>
           </a>
    </section>
    <!-- end section caroussel -->

    <!-- start first article -->
    <section class="first_banner container">
        <?php foreach($homeManager->banner as $banner){ if($banner['section'] == 'first_banner') {?>
        <h3 class="text-center"><?= $banner['title_banner'] ?></h3>
        <div class="article_1">
            <article class="overflow-auto d-lg-flex justify-content-between p-4">
                <img class="col-lg-4" src="<?= $banner['image_banner'] ?>" alt="<?= $banner['image_title_banner'] ?>">
                <p class=" col-lg-8"> 
                    <?= $banner['description_banner'] ?>
                </p>
            </article>
            <article></article>
        </div>
        <?php } } ?>
    </section>
    <!-- end first article -->

    <!-- start second article -->
    <section class="second_banner container">
        <h3 class="text-center"><?= $banner['title_banner'] ?></h3>
        <div class="d-flex flex-wrap justify-content-center mb-3">
    <?php foreach($homeManager->banner as $banner){ if($banner['section'] == 'second_banner') {?>
            <div class="card col-lg-4 col-sm-8">
                <div class="card-header"><img src="<?= $banner['image_banner'] ?>" alt="<?= $banner['image_title_banner'] ?>" class="card-img-top"></div>
                <div class="card-body">
                    <h5 class="card-title"><?= $banner['subtitle_banner'] ?></h5>
                    <p class="card-text">
                        <?= $banner['description_banner'] ?>
                    </p>
                </div>
            </div>
         <?php } } ?>
        </div>
    </section>
    <!-- end second article -->

</div>
<?php $content= ob_get_clean(); require_once DIR.'/template/base.php'; ?>