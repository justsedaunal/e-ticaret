<?php
include 'connection.php';

?>
<!doctype html>
<html lang="tr">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title><?= $title ?></title>
    <style>
        .buttons {
            width: 100%;
        }

    </style>
</head>
<body>
<header class="container">

    <nav class="navbar navbar-expand-lg navbar-light bg-light ">
        <div class="container-fluid ">
            <a class="navbar-brand " href="index.php">Ana Sayfa</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarNav">
                <ul class="navbar-nav ms-auto text-center">
                    <li class="nav-item">
                        <a class="nav-link " href="categories.php">Kategoriler</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="categoryadd.php">Kategori Ekle</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="products.php">Ürünler</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="productadd.php">Ürün Ekle</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>