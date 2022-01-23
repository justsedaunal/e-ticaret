<?php
include 'connection.php';


/******************* Kategori Ekleme Operasyonu ************/

if (isset($_POST['categoryAdd'])) {

    $categoryName = $_POST ['name'];

    $category = $db->prepare("INSERT into category set category_name=:category_name");
    $category->execute(array('category_name' => $categoryName));

    header('Location:categories.php');
    exit();


}

/******************* Kategori Güncelleme Operasyonu ************/

if (isset($_POST['categoryUpdate'])) {
    $categoryName = $_POST['category_name'];
    $categoryId = $_POST['category_id'];

    $category = $db->prepare('UPDATE category set category_name=:category_name where category_id=:category_id');
    $category->execute(array('category_name' => $categoryName, 'category_id' => $categoryId));

    header('Location:categories.php');
    exit();
}


/******************* Kategori Silme Operasyonu ************/

if ($_GET['action'] == "categoryDeleted") {

    $category_id = $_GET['categoryId'];


    $products = $db->prepare('SELECT * FROM products where category_id=:category_id');
    $products->execute(array('category_id' => $category_id));
    $control = $products->rowCount();

    if ($control > 0) {

        while ($take = $products->fetch(PDO::FETCH_ASSOC)) {

            unlink($take['product_picture']);

            $productDelete = $db->prepare('DELETE FROM products where category_id=:category_id');
            $productDelete->execute(array('category_id' => $category_id));
        }


    }

    $categoryDelete = $db->prepare('DELETE FROM category where category_id=:category_id');
    $categoryDelete->execute(array('category_id' => $category_id));

    header('Location:categories.php');
    exit();


}


/******************* Ürün Ekleme Operasyonu ************/

if (isset($_POST['submit'])) {
    $productName = $_POST['name'];

    $price = str_replace(',', '.', $_POST['price']);

    $description = $_POST['description'];

    $category_id = $_POST['category_id'];//indexte nasıl giriliyor?name gibi bir değer değil sonuçta


    // print_r ($_FILES);

    $uploads_dir = "uploads/";

    @$tmp_name = $_FILES ['image']['tmp_name'];

    @$name = $_FILES ['image']['name'];

    $uniqueName = rand(100, 10000);

    $dir_path = substr($uploads_dir, 0) . "" . $uniqueName . $name;

    @move_uploaded_file($tmp_name, "$uploads_dir/$uniqueName$name");

    // echo $dir_path;


    $product = $db->prepare("INSERT into products set product_name=:product_name,
                                    product_price=:product_price,
                                    product_description=:product_description,
                                    product_picture=:product_picture,
                                    category_id=:category_id");
    $q = $product->execute(array('product_name' => $productName,
        'product_price' => $price,
        'product_description' => $description,
        'product_picture' => $dir_path,
        'category_id' => $category_id));

    header('Location:products.php');
    exit();


}


/******************* Ürün Güncelleme Operasyonu ************/

if (isset($_POST['product_update'])) {
    $productName = $_POST['product_name'];
    $productPrice = $_POST['product_price'];
    $productDescription = $_POST['product_description'];
    $categoryId = $_POST['category_id'];
    $productId = $_POST['product_id'];
    $imagePath = $_POST['image_path'];


    if (!empty($_FILES['product_picture']['name'])) {

        unlink($imagePath);//unlink : dosyaları siler

        $uploads_dir = "uploads/";

        @$tmp_name = $_FILES ['product_picture']['tmp_name'];

        @$name = $_FILES ['product_picture']['name'];

        $uniqueName = rand(100, 10000);

        $dir_path = substr($uploads_dir, 0) . "" . $uniqueName . $name;

        @move_uploaded_file($tmp_name, "$uploads_dir/$uniqueName$name");
    } else {
        $dir_path = $imagePath;
    }


    $product = $db->prepare("UPDATE products set product_name=:product_name,
                                    product_price=:product_price,
                                    product_description=:product_description,
                                    product_picture=:product_picture,
                                    category_id=:category_id where product_id=:id");
    $q = $product->execute(array('product_name' => $productName,
        'product_price' => $productPrice,
        'product_description' => $productDescription,
        'product_picture' => $dir_path,
        'category_id' => $categoryId,
        'id' => $productId));

    header('Location:products.php');
    exit();


}


/******************* Ürün Silme Operasyonu ************/

if (isset($_GET['action'])) {

    if ($_GET['action'] == "productDeleted") {

        $product_id = $_GET['product_id'];


        $products = $db->prepare('SELECT * FROM products where product_id=:product_id');
        $products->execute(array('product_id' => $product_id));
        $control = $products->rowCount();

        if ($control > 0) {

            $take = $products->fetch(PDO::FETCH_ASSOC);

            unlink($take['product_picture']);


            $productDelete = $db->prepare('DELETE FROM products where product_id=:product_id');
            $productDelete->execute(array('product_id' => $product_id));

        }


        header('Location:products.php');
        exit();


    }


}





