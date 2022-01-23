<?php

$title = 'Ürün Ekle';

require_once './wievs/header.php';


?>

<!--<section class="container mt-3">-->
<!--    <div class="row">-->
<!--        <div class="col-12">-->
<!--            <form method="post" action="operation.php" enctype="multipart/form-data">-->
<!--                <div class="mb-3">-->
<!--                    <label>Ürün Adı</label>-->
<!--                    <input type="text" class="form-control" name="product_name">-->
<!---->
<!--                </div>-->
<!--                <div class="mb-3">-->
<!--                    <label>Ürün Açıklaması</label>-->
<!--                    <input type="text" class="form-control" name="product_description">-->
<!---->
<!--                </div>-->
<!--                <div class="mb-3">-->
<!--                    <label for="formFileMultiple" class="form-label">Ürün Fotoğrafı</label>-->
<!--                    <input class="form-control" type="file" id="formFileMultiple" multiple name="product_picture">-->
<!--                </div>-->
<!--                <div class="mb-3">-->
<!--                    <label>Ürün Fiyatı</label>-->
<!--                    <input type="text" class="form-control" name="product_price">-->
<!---->
<!--                </div>-->
<!--                <div class="col-md-3">-->
<!--                    <label for="validationDefault04" class="form-label">Kategoriler</label>-->
<!---->
<!--                    <select class="form-select" aria-label="Default select example" name="category_id">-->
<!---->
<!--                        --><?php
//                        $kategoriler = $db->prepare("SELECT * FROM category");
//                        $kategoriler->execute();
//
//                        while ($take = $kategoriler->fetch(PDO::FETCH_ASSOC)) {
//
//                            ?>
<!--                            <option value="--><? //= $take ['category_id'] ?><!-- "> --><? //= $take['category_name'] ?>
<!--                            </option>-->
<!---->
<!---->
<!--                        --><?php //} ?>
<!--                    </select>-->
<!---->
<!--                    <button type="submit" class="btn btn-primary mt-4" name="product_add">Ekle</button>-->
<!---->
<!--            </form>-->
<!---->
<!--        </div>-->
<!---->
<!--    </div>-->
<!---->
<!--</section>-->

<section class="container mt-3">

    <div class="row">

        <div class="col-12">
            <form method="post" enctype="multipart/form-data" action="operation.php">


                <div class="mb-3">
                    <label>Ürün Adı</label>
                    <input type="text" class="form-control" placeholder="Ürün Adı" name="name">
                </div>
                <div class="mb-3">
                    <label>Ürün Açıklaması</label>
                    <input type="text" class="form-control" placeholder="Ürün Açıklaması" name="description">
                </div>
                <div class="mb-3">
                    <label class="form-label">Ürün Fiyat</label>
                    <input type="text" class="form-control" placeholder="Ürün Fiyatını Dolar Cinsinden Giriniz"
                           name="price">
                </div>

                <div class="mb-3">
                    <label for="formFile" class="form-label">Ürün Fotoğrafı</label>
                    <input class="form-control" type="file" id="formFile" name="image">
                </div>


                <div class="col-12 ">
                    <label for="validationDefault04" class="form-label ">Kategoriler</label>

                    <select class="form-select mt-1" id="validationDefault04" name="category_id">
                        <option selected>Kategori Seçiniz</option>
                        <?php
                        $kategoriler = $db->prepare('SELECT * FROM category');
                        $kategoriler->execute();
                        while ($take = $kategoriler->fetch(PDO::FETCH_ASSOC)) {

                            ?>
                            <option value="<?= $take['category_id'] ?>"><?= $take['category_name'] ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>

                <button type="submit" class="buttons btn btn-dark my-5 col-md-12 col-sm-12 col-lg-12 col-xs-12"
                        name="submit"> Ekle
                </button>


            </form>
        </div>
    </div>
</section>


<?php require_once './wievs/footer.php'; ?>
