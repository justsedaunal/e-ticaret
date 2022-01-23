<?php

$title = 'Kategori Güncelle';

require_once './wievs/header.php';

$categoryId = $_GET['category_id'];
$categories = $db->prepare("SELECT * FROM category where category_id=:category_id");
$categories->execute(array('category_id' => $categoryId));

$take = $categories->fetch(PDO::FETCH_ASSOC);
$count = 0;

?>


<section class="container ">
    <div class="row">
        <div class="col-12">

            <form method="post" action="operation.php">
                <div class=" mt-3 mb-3 ">
                    <label class="mb-3">Kategori Adı</label>
                    <input type="text" class="form-control" name="category_name"
                           value="<?= $take['category_name'] ?>">
                </div>
                <input type="hidden" name="category_id" value="<?= $categoryId ?>"
                >


                <button type="submit" class="btn btn-primary" name="categoryUpdate">Güncelle</button>
            </form>
        </div>
    </div>

</section>


<?php require_once './wievs/footer.php'; ?>
