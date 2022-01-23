<?php
$title = 'Kategori Ekle';

require_once './wievs/header.php';
?>

<section class="container">

    <div class="row">
        <div class="col-12">
            <form method="post" action="operation.php">
                <div class="mb-3 mt-2 ">
                    <label class="mb-4 mt-4">Kategori Adı</label>
                    <input type="text" class="form-control" name="name">
                </div>

                <button type="submit" class="buttons btn btn-dark my-4 col-md-12 col-sm-12 col-lg-12 col-xs-12"
                        name="categoryAdd"> Ekle
                </button>

            </form>
        </div>
    </div>

</section>


<?php require_once './wievs/footer.php'; ?>

