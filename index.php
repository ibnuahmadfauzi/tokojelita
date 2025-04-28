<?php include 'proses.php'; ?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Rekomendasi Produk</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="container">
        <h1>Rekomendasi Produk</h1>

        <form method="post" action="">
            <label>Nama:</label><br>
            <input type="text" name="nama" required><br><br>

            <label>Pilih Produk yang Disukai:</label><br>
            <?php foreach ($produk as $p) : ?>
                <input type="checkbox" name="produk[]" value="<?php echo $p['id']; ?>"> <?php echo $p['nama_produk']; ?><br>
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

</body>

</html>