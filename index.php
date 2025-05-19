<?php require('config/conn.php'); ?>

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
    <div class="container">
        <h5 class="mt-4 fw-semibold">Kategori</h5>
    </div>
    <div class="kategori-container container mt-3 d-flex justify-content-center flex-wrap align-items-stretch">
        <?php
        $sql = "SELECT * FROM kategori";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
        ?>
                <a href="#" class="text-decoration-none m-2">
                    <div class="card" style="width: 150px;">
                        <div class="card-body text-center">
                            <img src="assets/images/kategori/<?php echo $row['icon']; ?>" class="mb-3" style="height: 50px;">
                            <p class="m-0 p-0">
                                <?php echo $row['nama']; ?>
                            </p>
                        </div>
                    </div>
                </a>
        <?php
            }
        } else {
            echo "0 results";
        }
        ?>
    </div>

    <div class="container">
        <h5 class="mt-4 fw-semibold">Produk Populer</h5>
    </div>

    <div class="container-produk-populer container">
        <div class="row">
            <?php
            $sql = "SELECT * FROM produk";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
            ?>
                    <div class="col-sm-3">
                        <div class="card" style="width: 100%;">
                            <img src="<?php echo $row['gambar']; ?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $row['nama']; ?></h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card’s content.</p>
                                <a href="#" class="btn btn-primary">Buka Produk</a>
                            </div>
                        </div>
                    </div>
            <?php
                }
            } else {
                echo "0 results";
            }
            ?>

        </div>
    </div>

    <div class="container">
        <h5 class="mt-4 fw-semibold">Produk Rekomendasi</h5>
    </div>
    <div class="py-4 mb-5">
        <?php
        $pdo = new PDO("mysql:host=localhost;dbname=db_tokojelita", "root", "");

        // ID user aktif (misalnya Ibnu = id 1)
        $userId = 1;

        // Ambil rating user aktif
        $stmt = $pdo->prepare("SELECT produk_id, rating FROM user_produk_rating WHERE user_id = ?");
        $stmt->execute([$userId]);
        $activeRatings = $stmt->fetchAll(PDO::FETCH_KEY_PAIR);

        // Ambil semua user lain
        $stmt = $pdo->query("SELECT DISTINCT user_id FROM user_produk_rating WHERE user_id != $userId");
        $otherUsers = $stmt->fetchAll(PDO::FETCH_COLUMN);

        // Fungsi cosine similarity
        function cosineSimilarity($a, $b)
        {
            $dot = 0;
            $normA = 0;
            $normB = 0;

            foreach ($a as $key => $ra) {
                if (isset($b[$key])) {
                    $rb = $b[$key];
                    $dot += $ra * $rb;
                    $normA += $ra * $ra;
                    $normB += $rb * $rb;
                }
            }

            if ($normA == 0 || $normB == 0) return 0;

            return $dot / (sqrt($normA) * sqrt($normB));
        }

        // Hitung similarity tiap user
        $similarities = [];

        foreach ($otherUsers as $uid) {
            $stmt = $pdo->prepare("SELECT produk_id, rating FROM user_produk_rating WHERE user_id = ?");
            $stmt->execute([$uid]);
            $ratings = $stmt->fetchAll(PDO::FETCH_KEY_PAIR);
            $similar = cosineSimilarity($activeRatings, $ratings);
            if ($similar > 0) {
                $similarities[$uid] = $similar;
            }
        }

        // Cari produk yang belum dirating user ini
        $recommendations = [];

        foreach ($similarities as $uid => $similarityScore) {
            $stmt = $pdo->prepare("
        SELECT produk_id, rating FROM user_produk_rating
        WHERE user_id = ? AND produk_id NOT IN (
            SELECT produk_id FROM user_produk_rating WHERE user_id = ?
        )
    ");
            $stmt->execute([$uid, $userId]);
            $data = $stmt->fetchAll(PDO::FETCH_KEY_PAIR);

            foreach ($data as $produkId => $rating) {
                if (!isset($recommendations[$produkId])) {
                    $recommendations[$produkId] = 0;
                }
                $recommendations[$produkId] += $similarityScore * $rating;
            }
        }

        // Tampilkan rekomendasi
        arsort($recommendations);

        if (count($recommendations) == 0) {
            echo "<li>Tidak ada rekomendasi saat ini.</li>";
        } else {
        ?>
            <div class="container">
                <div class="row">
                    <?php
                    foreach ($recommendations as $produkId => $skor) {
                        $stmt = $pdo->prepare("SELECT nama FROM produk WHERE id = ?");
                        $stmt->execute([$produkId]);
                        $nama = $stmt->fetchColumn();
                    ?>
                        <div class="col-sm-3">
                            <div class="card" style="width: 100%;">
                                <img src="#" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $nama; ?></h5>
                                    <p class="card-text"><?php echo round($skor, 2); ?></p>
                                    <a href="#" class="btn btn-primary">Buka Produk</a>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        <?php
        }
        echo "</ul>";
        ?>
    </div>



    <!-- copyright -->
    <div class="p-2">
        <p class="m-0 p-0 text-center">&copy; Copyright - <?php echo date("Y"); ?></p>
    </div>

    <!-- memanggil file bootstrap -->
    <script src="assets/bootstrap/js/bootstrap.js"></script>

    <!-- memanggil file fontawesome -->
    <script src="assets/fontawesome/js/all.js"></script>
</body>

</html>