<?php

$title = 'Ürün Güncelle';

require_once './wievs/header.php';

$productId = $_GET['product_id'];
$product = $db->prepare("SELECT * FROM products where product_id=:product_id ");
$product->execute(array('product_id' => $productId));

$take = $product->fetch(PDO::FETCH_ASSOC);
//$count = 0;


?>

<!--<section class="container">-->
<!--    <div class="row">-->
<!--        <div class="col-12">-->
<!--            <form method="post" action="operation.php" enctype="multipart/form-data">-->
<!--                <div class="form-group mt-2">-->
<!--                    <label class="mb-3 mt-2">Ürün Adı</label>-->
<!--                    <input type="text" class="form-control" name="name"-->
<!--                           value=" --><? //= $take['product_name'] ?><!-- ">-->
<!---->
<!--                </div>-->
<!--                <div class="form-group mt-2">-->
<!--                    <label for="exampleInputEmail1" class="mb-3 mt-2">Ürün Açıklaması</label>-->
<!--                    <input type="email" class="form-control" name="product_description"-->
<!--                           value=" --><? //= $take['product_description'] ?><!-- ">-->
<!---->
<!--                </div>-->
<!--                <div class="form-group mt-2">-->
<!--                    <label for="exampleInputEmail1" class="mb-3 mt-2">Ürün Fiyatı</label>-->
<!--                    <input type="text" class="form-control" name="product_price"-->
<!--                           value=" --><? //= $take['product_price'] ?><!-- ">-->
<!---->
<!--                </div>-->
<!--                <div class="form-group mt-2">-->
<!--                    <label for="exampleInputEmail1" class="mb-3 mt-2">Ürün Fotoğrafı</label>-->
<!--                    <input type="file" class="form-control" name="product_image "-->
<!--                           value=" --><? //= $take['product_picture'] ?><!-- ">-->
<!---->
<!--                </div>-->
<!--                <div class="form-group mt-2">-->
<!--                    <label for="exampleInputEmail1" class="mb-3 mt-2">Kategori Adı</label>-->
<!--                    <select class="form-select" id="validationDefault04" name="category_id">-->
<!--                        --><?php
//
//                        $kategoriler = $db->prepare("SELECT * From category");
//                        $kategoriler->execute();
//                        while ($take = $kategoriler->fetch(PDO::FETCH_ASSOC)) {
//
//                            ?>
<!---->
<!---->
<!--                            <option --><? //= $take['category_name'] == $take ['category_id'] ? 'selected' : '' ?>
<!--                                    value="--><? //= $take['category_id'] ?><!--">--><? //= $take['category_name'] ?>
<!---->
<!--                            </option>-->
<!---->
<!--                        --><?php //} ?>
<!--                    </select>-->
<!--                </div>-->
<!---->
<!--                <input type="hidden" name="product_id" value="--><? //= $productId ?><!--">-->
<!---->
<!--                <input type="hidden" name="image_path" value="--><? //= $take['product_picture'] ?><!--">-->
<!---->
<!--                <button type="button" class="buttons btn btn-dark my-5 col-md-12 col-sm-12 col-lg-12 col-xs-12"-->
<!--                        name="product_update">Güncelle-->
<!--                </button>-->
<!--            </form>-->
<!--        </div>-->
<!--    </div>-->
<!--</section>-->


<div class="container">

    <form method="post" action="operation.php" enctype="multipart/form-data">
        <div class="mb-3">
            <label>Ürün Adı</label>
            <input type="text" class="form-control" name="product_name"
                   value="<?= $take['product_name'] ?>">

        </div>
        <div class="mb-3">
            <label class="form-label">Ürün Açıklaması</label>
            <input type="text" class="form-control" name="product_description"
                   value="<?= $take['product_description'] ?>">

        </div>
        <div class="mb-3">
            <label class="form-label">Ürün Fiyatı</label>
            <input type="text" class="form-control" name="product_price"
                   value="<?= $take['product_price'] ?>">
        </div>
        <div class="mb-3">
            <label class="form-label">Ürün Fotoğrafı</label>
            <input type="file" class="form-control" name="product_picture"
        </div>
        <div class="col-12 mt-3">
            <label for="validationDefault04" class="form-label">Kategoriler</label>
            <select class="form-select col-md-12 col-lg-12" id="validationDefault04" name="category_id">

                <?php
                $kategoriler = $db->prepare('SELECT * FROM category ');
                $kategoriler->execute();
                while ($takeCategory = $kategoriler->fetch(PDO::FETCH_ASSOC)) {
                    ?>

                    <option  <?= $take['category_id'] == $takeCategory ['category_id'] ? 'selected' : '' ?>
                            value="<?= $takeCategory['category_id'] ?>">
                        <?= $takeCategory['category_name'] ?>
                    </option>
                    <?php
                }
                ?>
            </select>
        </div>
        <input type="hidden" name="product_id" value="<?= $productId ?>">
        <input type="hidden" name="image_path" value="<?= $take['product_picture'] ?>">

        <button type="submit" class="buttons btn btn-dark my-5 col-md-12 col-sm-12 col-lg-12 col-xs-12"
                name="product_update">Güncelle
        </button>

<!--        <button type="submit" class="btn btn-primary mt-4" name="product_update">Güncelle</button>-->
    </form>
</div>


<?php require_once './wievs/footer.php'; ?>
