<?php  ob_start();
    $dPage['req'] = 'count';
    $dPage['category'] = $_GET["category"] != NULL ?  $_GET["category"] : 'none' ;
    $dPage['order'] = $_GET["order"];
$homeController->setPage("shop");
 ?>
<div id="shop" class="container">
    <section class="banner_shop col-12">
        <h3 class="text-center">Title banner</h3>
        <p class="text-center">Lorem ipsum, dolor sit amet consectetur adipisicing elit. 
            Mollitia doloremque quaerat, vero ipsam ad ut soluta illum eaque, 
            at neque, quidem architecto! Mollitia repellendus nihil quas nobis eligendi blanditiis optio?
        </p>
    </section>

    
    <section class="content_shop">
        <ul class="nav_shop d-flex m-lg-3 border-top border-bottom">
            <div class="col-lg-9  col-8 d-flex">
                <li class="col-lg-3 d-lg-block d-none">
                    produit trouvé (<?= $shopController->paginate($dPage)['nbProduct'] ?>)
                </li>
                <li class="col-lg-9  col-12 d-lg-flex  ">
                   <div class="col-lg-6 col-6 ">
                        <select name="tri" id="tri">
                            <option value="defaut">trie par</option>
                            <?php  foreach ($shopController->category() as $value) { 
                                $selected = $_GET['category'] == $value['category'] ? "selected": "none";
                            ?>
                            <option value="category=<?= $value['category'] ?>" <?= $selected ?> ><?= $value['category'] ?></option>
                            <?php } ?>
                        </select>
                   </div>
                    <div class=" col-lg-6 col-12 ">
                        <div class="form-check form-check-inline">
                            <input type="checkbox" class="form-check-input check" name="prix_croissant"  value="order=price_product ASC">
                            <label for="prix_croissant" class="form-check-label">prix croissant</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="checkbox" class="form-check-input check" name="prix_decroissant" value="order=price_product DESC">
                            <label for="prix_decroissant" class="form-check-label">prix décroissant</label>
                        </div>
                    </div>
                </li>        
            </div>
            <div class="col-lg-3 col-4 d-flex  ">
                <li>
                    <?php 
                        for ($i=1; $i <= $shopController->paginate($dPage)['nb_page'] ; $i++) {  ?>
                        <a href="?path=shop&p=<?=$i . "&category=".$dPage['category']?>"><button class="btn btn-light"><?= $i ?></button></a>
                    <?php } ?>
                </li>
            </div>
        </ul>

        <!--start section product -->
        <section class="product_section d-flex flex-wrap">
           <?php
            $page = $_GET["p"] != NULL ?  $_GET["p"] : 1 ;
            $dPage['currentPage'] = $page;
            $dPage['req'] = 'page';
            $product = $shopController->paginate($dPage);
            //var_dump($product);
            foreach ($product as $value) { ?>
            <div class="product col-lg-3 col-md-4 col-6">
                <img src="<?= $value["image_product"] ?>" alt="">
                <h5><?= $value["name_product"] ?></h5>
                <p class="product_desc">
                <?= $value["description_product"] ?>
                </p>
                <p class="product_price">
                <?= $value["price_product"] ?>€
                </p>
            </div>
           <?php  } ?>
        </section>
        <!--end section product -->

        <ul class="nav_shop d-flex m-3 border-top border-bottom">
            <?php $dPage['req'] = 'count'; ?>
            <div class="col-8 d-flex">
                <li class="col-6">produit trouvé (<?= $shopController->paginate($dPage)['nbProduct'] ?>)</li>
                <li class="col-12 d-flex">
                   <div>
                    <select name="tri" id="tri">
                        <option value="defaut">trie par</option>
                        <?php  foreach ($shopController->category() as $value) { 
                            $selected = $_GET['category'] == $value['category'] ? "selected": "none";
                        ?>
                        <option value="category=<?= $value['category'] ?>" <?= $selected ?> ><?= $value['category'] ?></option>
                        <?php } ?>
                    </select>
                   </div>
                </li>
                
            </div>
            <div class="col-4 d-flex justify-content-end">
                <li>
                    <?php 
                        for ($i=1; $i <= $shopController->paginate($dPage)['nb_page'] ; $i++) {  ?>
                        <a href="?path=shop&p=<?=$i . "&category=".$dPage['category']?>"><button class="btn btn-light"><?= $i ?></button></a>
                    <?php } ?>
                </li>
            </div>
        </ul>
    </section>
</div>
<?php $content = ob_get_clean();  require_once DIR.'/template/base.php'; ?>