<?php

$title = 'Ürünler';

require_once './wievs/header.php';

$products = $db->prepare("SELECT products.*,category.* FROM products inner join category on products.category_id=category.category_id ");
$products->execute();
$count = 0;


?>

    <section class="container">

        <a href="productadd.php">

            <button type="button" class="btn btn-dark my-5 col-md-12">Yeni Ürün Ekle</button>

        </a>
        <div class="row">
            <div class="col-xs-12 ">
                <div class="table responsive">
                    <table class="table mt-3">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Ürün Adı</th>
                            <th scope="col">Ürün Açıklaması</th>
                            <th scope="col">Ürün Fiyatı</th>
                            <th scope="col">Ürün Fotoğrafı</th>
                            <th scope="col">Kategori Adı</th>
                            <th scope="col">İşlemler</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php

                        while ($take = $products->fetch(PDO::FETCH_ASSOC)) {
                            $count++;
//                            print_r($take);
                            ?>

                            <tr>
                                <th scope="row"> <?= $count ?> </th>
                                <td> <?= $take['product_name'] ?> </td>
                                <td><?= $take['product_description'] ?></td>
                                <td><?= $take['product_price'] ?></td>
                                <td><img src="<?= $take['product_picture'] ?>" alt="" width="94"</td>
                                <td><?= $take['category_name'] ?></td>
                                <td>
                                    <a href="productupdate.php?product_id=<?= $take['product_id'] ?>">
                                        <button type="button" class="btn btn-primary mb-2  col-12">Güncelle</button>
                                    </a>

                                    <a href="operation.php?action=productDeleted&product_id=<?= $take['product_id'] ?>">
                                        <button type="button" class="btn btn-danger col-12 ">Sil</button>
                                    </a>
                                </td>

                            </tr>
                        <?php } ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

<?php require_once './wievs/footer.php'; ?>