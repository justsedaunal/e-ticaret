<?php

$title = 'Kategoriler';

require_once './wievs/header.php';

$categories = $db->prepare("SELECT * FROM category");
$categories->execute();
$count = 0;

?>

<section class="container ">
    <div class="row">
        <div class="col-xs-12">


            <a href="categoryadd.php">

                <button type="button" class="buttons btn btn-dark my-5 col-md-12 col-sm-12 col-lg-12 col-xs-12">Yeni
                    Kategori Ekle
                </button>

            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="table responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Kategori Adı</th>
                        <th scope="col">İşlemler</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php

                    while ($take = $categories->fetch(PDO::FETCH_ASSOC)) {
                        $count++

                        ?>
                        <tr>
                            <th scope="row"><?= $count ?> </th>
                            <td> <?= $take['category_name'] ?> </td>
                            <td>
                                <a href="categoryupdate.php?category_id=<?= $take['category_id'] ?>">
                                    <button type="button" class="btn btn-primary col-md-4 col-sm-4 col-lg-2 ">Güncelle
                                    </button>
                                </a>

                                <a href="operation.php?action=categoryDeleted&categoryId=<?= $take['category_id'] ?>">
                                    <button type="button" class="btn btn-danger col-md-2 col-sm-2 col-lg-2">Sil</button>

                                </a>
                            </td>
                        </tr>
                    <?php }

                    ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

</section>

<?php require_once './wievs/footer.php'; ?>

