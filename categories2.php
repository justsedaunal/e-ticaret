<?php
require_once './wievs/header.php';
?>

<section class="container mt-3">
    <a href="categoryadd.php">

        <button type="button" class="btn btn-dark my-5 col-md-12">Yeni Kategori Ekle</button>

    </a>
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
                    $categories = $db->prepare("SELECT * FROM category");
                    $categories->execute();
                    $count = 0;

                    while ($take = $categories->fetch(PDO::FETCH_ASSOC)) {
                        $count++

                        ?>
                        <tr>
                            <th scope="row"><?= $count ?> </th>
                            <td> <?= $take['category_name'] ?> </td>
                            <td>
                                <button type="button" class="btn btn-primary">Güncelle</button>
                                <button type="button" class="btn btn-danger">Sil</button>
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

