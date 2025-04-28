<?php include 'proses.php'; ?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Rekomendasi Produk</title>

    <!-- Memanggil file bootstrap -->
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">

    <!-- Memanggil file CSS -->
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="container">
        <h1>Rekomendasi Produk</h1>

        <form method="post" action="">
            <label>Nama:</label><br>
            <input type="text" name="nama" required><br><br>

            <label>Pilih kategori produk yang Disukai:</label><br>
            <?php foreach ($kategori as $p) : ?>
                <input type="checkbox" name="kategori[]" value="<?php echo $p['id']; ?>"> <?php echo $p['nama_kategori']; ?><br>
            <?php endforeach; ?>
            <br>
            <button type="submit">Dapatkan Rekomendasi</button>
        </form>

        <?php if (!empty($rekomendasi)) : ?>
            <h2>Rekomendasi untuk <?php echo htmlspecialchars($nama); ?>:</h2>
            <ul>
                <?php foreach ($rekomendasi as $r) : ?>
                    <li><?php echo $r; ?></li>
                <?php endforeach; ?>
            </ul>
        <?php elseif (isset($rekomendasi)) : ?>
            <h2>Tidak ada rekomendasi tambahan untuk <?php echo htmlspecialchars($nama); ?>.</h2>
        <?php endif; ?>
    </div>

    <!-- Memanggil file Bootstrap -->
    <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>