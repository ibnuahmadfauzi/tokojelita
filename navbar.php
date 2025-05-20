<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Jelita - Collaborative Filtering</title>

    <!-- mengganti favicon -->
    <link rel="icon" href="assets/images/favicon/favicon.png" type="image/x-icon">

    <!-- memanggil file bootstrap -->
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css">

    <!-- memanggil font awesome -->
    <link rel="stylesheet" href="assets/fontawesome/css/all.css">

    <!-- memanggil file css -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body class="bg-light">


    <nav class="navbar navbar-expand-lg border-bottom">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php"><i class="fa-solid fa-bag-shopping"></i> <span>TokoJelita</span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <div class="w-100 d-flex justify-content-center">
                    <form class="d-flex w-50 border rounded-3" role="search" action="produk.php">
                        <input class="form-control form-control-sm border-0 me-2" name="keyword" type="search" placeholder="Search" aria-label="Search" />
                        <button class="btn btn-sm border-0" type="submit">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                    </form>
                </div>
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#"><i class="fa-solid fa-user"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#"><i class="fa-solid fa-cart-shopping"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#"><i class="fa-solid fa-right-from-bracket"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>