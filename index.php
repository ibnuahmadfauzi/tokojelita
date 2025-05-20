<?php require('config/conn.php'); ?>


<!-- elemen navbar -->
<?php include('navbar.php'); ?>

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
            <a href="produk.php?kategori_id=<?php echo $row['id']; ?>" class="text-decoration-none m-2">
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
        $sql = "SELECT * FROM produk ORDER BY terjual DESC LIMIT 8";
        $result = mysqli_query($conn, $sql);

        function formatRupiah($angka)
        {
            return "Rp. " . number_format($angka, 0, ',', '.') . ",-";
        }

        function tampilkanTerjual($angka)
        {
            if ($angka >= 10000) {
                return "10rb+ terjual";
            } elseif ($angka >= 1000) {
                // Ambil ribuan tanpa desimal
                $ribuan = floor($angka / 1000);
                return "{$ribuan}rb terjual";
            } else {
                return "{$angka} terjual";
            }
        }

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
        ?>
                <div class="col-sm-3 pb-2">
                    <div class="card" style="width: 100%;">
                        <img src="<?php echo $row['gambar']; ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row['nama']; ?></h5>
                            <p class="text-danger">
                                <?php echo formatRupiah($row['harga']); ?>
                            </p>
                            <p>
                                <span class="text-secondary">
                                    <?php echo tampilkanTerjual($row['terjual']); ?>
                                </span>
                            </p>
                            <a href="<?php echo $row['link']; ?>" target="_blank" class="btn btn-success btn-sm"><i class="fa-solid fa-arrow-up-right-from-square"></i> Buka Produk</a>
                        </div>
                    </div>
                </div>
        <?php
            }
        } else {
            echo "0 results";
        }
        ?>
        <div class="text-center mt-3 mb-5">
            <a href="produk.php" class="btn btn-sm btn-primary">Semua Produk</a>
        </div>
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
                    $stmt = $pdo->prepare("SELECT nama, gambar, link, harga, terjual FROM produk WHERE id = ?");
                    $stmt->execute([$produkId]);
                    $produk = $stmt->fetch(PDO::FETCH_ASSOC);
                    // echo round($skor, 2);
                ?>
                    <div class="col-sm-3 pb-2">
                        <div class="card" style="width: 100%;">
                            <img src="<?php echo $produk['gambar']; ?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $produk['nama']; ?></h5>
                                <p class="text-danger">

                                </p>
                                <p>
                                    <span class="text-danger">
                                        <?php echo formatRupiah($produk['harga']); ?>
                                    </span>
                                </p>
                                <p>
                                    <span class="text-secondary">
                                        <?php echo tampilkanTerjual($produk['terjual']); ?>
                                    </span>
                                </p>
                                <a href="<?php echo $produk['link']; ?>" target="_blank" class="btn btn-success btn-sm"><i class="fa-solid fa-arrow-up-right-from-square"></i> Buka Produk</a>
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



<?php include('footer.php'); ?>