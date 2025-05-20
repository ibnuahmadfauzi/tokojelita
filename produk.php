<?php require('config/conn.php'); ?>

<!-- elemen navbar -->
<?php include('navbar.php'); ?>

<?php
// Jumlah produk per halaman
$limit = 8;

// Ambil halaman saat ini dari parameter URL, default ke 1 jika tidak ada
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $limit;

// Hitung total data untuk menentukan jumlah halaman
$totalQuery = mysqli_query($conn, "SELECT COUNT(*) as total FROM produk");
$totalData = mysqli_fetch_assoc($totalQuery)['total'];
$totalPages = ceil($totalData / $limit);

// Ambil data produk dengan limit dan offset
$sql = "";
if (isset($_GET['kategori_id'])) {
    $kategori_id_redirect = (int) $_GET['kategori_id'];

    // Total data berdasarkan kategori
    $totalQuery = mysqli_query($conn, "SELECT COUNT(*) as total FROM produk WHERE kategori_id = $kategori_id_redirect");
    $sql = "SELECT * FROM produk WHERE kategori_id = $kategori_id_redirect LIMIT $limit OFFSET $start";
} elseif (isset($_GET['keyword'])) {
    $keyword = isset($_GET['keyword']) ? mysqli_real_escape_string($conn, $_GET['keyword']) : '';
    if (!empty($keyword)) {
        $totalQuery = mysqli_query($conn, "SELECT COUNT(*) as total FROM produk WHERE nama LIKE '%$keyword%'");
        $sql = "SELECT * FROM produk WHERE nama LIKE '%$keyword%' LIMIT $limit OFFSET $start";
    } else {
        $totalQuery = mysqli_query($conn, "SELECT COUNT(*) as total FROM produk");
        $sql = "SELECT * FROM produk LIMIT $limit OFFSET $start";
    }
} else {
    // Total data semua produk
    $totalQuery = mysqli_query($conn, "SELECT COUNT(*) as total FROM produk");
    $sql = "SELECT * FROM produk LIMIT $limit OFFSET $start";
}
$result = mysqli_query($conn, $sql);

// Fungsi format
function formatRupiah($angka)
{
    return "Rp. " . number_format($angka, 0, ',', '.') . ",-";
}

function tampilkanTerjual($angka)
{
    if ($angka >= 10000) {
        return "10rb+ terjual";
    } elseif ($angka >= 1000) {
        $ribuan = floor($angka / 1000);
        return "{$ribuan}rb terjual";
    } else {
        return "{$angka} terjual";
    }
}
?>
<div class="container-produk-populer container mt-3">
    <div class="row">
        <?php
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
        ?>
                <div class="col-sm-3 pb-2">
                    <div class="card" style="width: 100%;">
                        <img src="<?php echo $row['gambar']; ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row['nama']; ?></h5>
                            <p class="text-danger"><?php echo formatRupiah($row['harga']); ?></p>
                            <p><span class="text-secondary"><?php echo tampilkanTerjual($row['terjual']); ?></span></p>
                            <a href="<?php echo $row['link']; ?>" target="_blank" class="btn btn-success btn-sm"><i class="fa-solid fa-arrow-up-right-from-square"></i> Buka Produk</a>
                        </div>
                    </div>
                </div>
        <?php
            }
        } else {
            echo "<p>Tidak ada produk yang ditemukan.</p>";
        }
        ?>
    </div>

    <!-- Pagination -->
    <?php
    // Tambahkan kategori_id di query string kalau ada
    $kategori_param = isset($_GET['kategori_id']) ? '&kategori_id=' . (int)$_GET['kategori_id'] : '';
    ?>
    <nav>
        <ul class="pagination justify-content-center mt-4">
            <?php if ($page > 1): ?>
                <li class="page-item">
                    <a class="page-link" href="?page=<?= $page - 1 . $kategori_param ?>">« Prev</a>
                </li>
            <?php endif; ?>

            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                <li class="page-item <?= ($i === $page) ? 'active' : '' ?>">
                    <a class="page-link" href="?page=<?= $i . $kategori_param ?>"><?= $i ?></a>
                </li>
            <?php endfor; ?>

            <?php if ($page < $totalPages): ?>
                <li class="page-item">
                    <a class="page-link" href="?page=<?= $page + 1 . $kategori_param ?>">Next »</a>
                </li>
            <?php endif; ?>
        </ul>
    </nav>
</div>



<?php include('footer.php'); ?>