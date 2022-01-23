<?php

$title = 'Ana Sayfa';


require_once './wievs/header.php';

include "kurcekme.php";
?>

<!--<section class="container">-->
<!---->
<!---->
<!--    <div class="row g-0">-->
<!---->
<!--        --><?php
//        $products = $db->prepare("SELECT category.*,products.* From products inner join category on category.category_id=products.product_id");
//        $products->execute();
//        $control = $products->rowCount();
//
//        if ($control > 0) {
//
//        while ($take = $products->fetch(PDO::FETCH_ASSOC)) {
//
//        $price = intval($take['product_price'] * $USD);
//        $total = number_format($price, 2, ',', '.');
//        ?>
<!--        <div class="col-12 col-md-6 col-lg-4">-->
<!--            <div class="card mt-5" style="width: 18rem;">-->
<!--                <img src=" --><?//= $take['product_picture'] ?><!-- " class="card-img-top" height="180" width="286" alt="...">-->
<!--                <div class="card-body">-->
<!--                    <h5 class="card-title"> --><?//= $take['product_name'] ?><!-- - - --><?//= $take['category_name'] ?><!-- </h5>-->
<!--                    <p class="card-text">--><?//= $take['product_description'] ?><!--</p>-->
<!--                    <a href="#" class="btn btn-primary">--><?//= $total ?><!-- TL</a>-->
<!--                </div>-->
<!--            </div>-->
<!--       -->
<!---->
<!--        </div>-->
<!---->
<!--    </div>-->
<!--</section>-->


<section class="container ">

    <div class="row g-3  ">

        <?php


        $products = $db->prepare('SELECT category.*,products.* FROM products inner join category on category.category_id=products.category_id ');
        $products->execute();
        $control = $products->rowCount();
        if ($control > 0) {
            while ($take = $products->fetch(PDO::FETCH_ASSOC)) {

                $price = intval($take['product_price'] * $USD);

                $total = number_format($price, 2, ',', '.');
                ?>

                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 d-flex justify-content-center  ">
                    <div class="card mt-3  " style="width: 18rem;">
                        <img src="<?= $take['product_picture'] ?>" class="card-img-top" height="180" width="286"
                             alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?= $take['product_name'] ?> - </h5>
                            <h5 class="card-text text-primary"> <?= $take['category_name'] ?> </h5>
                            <p class="card-text"><?= $take['product_description'] ?></p>
                            <a href="#" class="btn btn-primary"> <?= $total ?> TL</a>
                        </div>
                    </div>
                </div>
            <?php }
        } else {
            echo 'hiçbir ürün bulunmadı';
        } ?>

    </div>
</section>



<?php require_once './wievs/footer.php'; ?>

