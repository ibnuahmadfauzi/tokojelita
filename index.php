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

    <!-- elemen navbar -->
    <nav class="navbar navbar-expand-lg border-bottom">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><i class="fa-solid fa-bag-shopping"></i> <span>TokoJelita</span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <div class="w-100 d-flex justify-content-center">
                    <form class="d-flex w-50 border rounded-3" role="search">
                        <input class="form-control form-control-sm border-0 me-2" type="search" placeholder="Search" aria-label="Search" />
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

    <!-- elemen advertisement -->
    <div class="advertisement-container container mt-3">
        <h3 class="p-0 m-0 text-center">advertisement</h3>
    </div>

    <!-- elemen kategori -->
    <div class="kategori-container container mt-3 d-flex justify-content-center flex-wrap align-items-stretch">
        <a href="#" class="text-decoration-none">
            <div class="box-kategori p-2 rounded-2">
                <div class="d-flex justify-content-center">
                    <i class="fa-solid fa-certificate mb-2 d-block"></i>
                </div>
                <span class="d-block">Sneakers</span>
            </div>
        </a>

        <a href="#" class="text-decoration-none">
            <div class="box-kategori p-2 rounded-2">
                <div class="d-flex justify-content-center">
                    <i class="fa-solid fa-certificate mb-2 d-block"></i>
                </div>
                <span class="d-block">Sandal</span>
            </div>
        </a>

        <a href="#" class="text-decoration-none">
            <div class="box-kategori p-2 rounded-2">
                <div class="d-flex justify-content-center">
                    <i class="fa-solid fa-certificate mb-2 d-block"></i>
                </div>
                <span class="d-block">Celana jeans</span>
            </div>
        </a>

        <a href="#" class="text-decoration-none">
            <div class="box-kategori p-2 rounded-2">
                <div class="d-flex justify-content-center">
                    <i class="fa-solid fa-certificate mb-2 d-block"></i>
                </div>
                <span class="d-block">Celana chinos</span>
            </div>
        </a>

        <a href="#" class="text-decoration-none">
            <div class="box-kategori p-2 rounded-2">
                <div class="d-flex justify-content-center">
                    <i class="fa-solid fa-certificate mb-2 d-block"></i>
                </div>
                <span class="d-block">Celana bahan / formal</span>
            </div>
        </a>

        <a href="#" class="text-decoration-none">
            <div class="box-kategori p-2 rounded-2">
                <div class="d-flex justify-content-center">
                    <i class="fa-solid fa-certificate mb-2 d-block"></i>
                </div>
                <span class="d-block">Celana pendek</span>
            </div>
        </a>

        <a href="#" class="text-decoration-none">
            <div class="box-kategori p-2 rounded-2">
                <div class="d-flex justify-content-center">
                    <i class="fa-solid fa-certificate mb-2 d-block"></i>
                </div>
                <span class="d-block">Kaos</span>
            </div>
        </a>

        <a href="#" class="text-decoration-none">
            <div class="box-kategori p-2 rounded-2">
                <div class="d-flex justify-content-center">
                    <i class="fa-solid fa-certificate mb-2 d-block"></i>
                </div>
                <span class="d-block">Kemeja lengan panjang</span>
            </div>
        </a>

        <a href="#" class="text-decoration-none">
            <div class="box-kategori p-2 rounded-2">
                <div class="d-flex justify-content-center">
                    <i class="fa-solid fa-certificate mb-2 d-block"></i>
                </div>
                <span class="d-block">Blouse</span>
            </div>
        </a>

        <a href="#" class="text-decoration-none">
            <div class="box-kategori p-2 rounded-2">
                <div class="d-flex justify-content-center">
                    <i class="fa-solid fa-certificate mb-2 d-block"></i>
                </div>
                <span class="d-block">Sweater</span>
            </div>
        </a>

        <a href="#" class="text-decoration-none">
            <div class="box-kategori p-2 rounded-2">
                <div class="d-flex justify-content-center">
                    <i class="fa-solid fa-certificate mb-2 d-block"></i>
                </div>
                <span class="d-block">Hoodie</span>
            </div>
        </a>

        <a href="#" class="text-decoration-none">
            <div class="box-kategori p-2 rounded-2">
                <div class="d-flex justify-content-center">
                    <i class="fa-solid fa-certificate mb-2 d-block"></i>
                </div>
                <span class="d-block">Jaket</span>
            </div>
        </a>

        <a href="#" class="text-decoration-none">
            <div class="box-kategori p-2 rounded-2">
                <div class="d-flex justify-content-center">
                    <i class="fa-solid fa-certificate mb-2 d-block"></i>
                </div>
                <span class="d-block">Cardigan</span>
            </div>
        </a>

        <a href="#" class="text-decoration-none">
            <div class="box-kategori p-2 rounded-2">
                <div class="d-flex justify-content-center">
                    <i class="fa-solid fa-certificate mb-2 d-block"></i>
                </div>
                <span class="d-block">Tank top</span>
            </div>
        </a>

        <a href="#" class="text-decoration-none">
            <div class="box-kategori p-2 rounded-2">
                <div class="d-flex justify-content-center">
                    <i class="fa-solid fa-certificate mb-2 d-block"></i>
                </div>
                <span class="d-block">Crop top</span>
            </div>
        </a>

        <a href="#" class="text-decoration-none">
            <div class="box-kategori p-2 rounded-2">
                <div class="d-flex justify-content-center">
                    <i class="fa-solid fa-certificate mb-2 d-block"></i>
                </div>
                <span class="d-block">Jas / blazer</span>
            </div>
        </a>

        <a href="#" class="text-decoration-none">
            <div class="box-kategori p-2 rounded-2">
                <div class="d-flex justify-content-center">
                    <i class="fa-solid fa-certificate mb-2 d-block"></i>
                </div>
                <span class="d-block">Tote bag</span>
            </div>
        </a>

        <a href="#" class="text-decoration-none">
            <div class="box-kategori p-2 rounded-2">
                <div class="d-flex justify-content-center">
                    <i class="fa-solid fa-certificate mb-2 d-block"></i>
                </div>
                <span class="d-block">Handbag</span>
            </div>
        </a>
    </div>

    <!-- memanggil file bootstrap -->
    <script src="assets/bootstrap/js/bootstrap.js"></script>

    <!-- memanggil file fontawesome -->
    <script src="assets/fontawesome/js/all.js"></script>
</body>

</html>