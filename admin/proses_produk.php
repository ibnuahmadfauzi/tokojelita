<?php require('../config/conn.php'); ?>
<?php
$namaproduk = $_POST['namaproduk'];
$kategoriid = $_POST['kategoriid'];
$tokoid = $_POST['tokoid'];
$hargaproduk = $_POST['hargaproduk'];
$linkproduk = $_POST['linkproduk'];
$linkgambar = $_POST['linkgambar'];
$diskon = 0;
$terjual = 0;

$sql = "INSERT INTO produk (nama, toko_id, kategori_id, harga, diskon, terjual, gambar, link)
VALUES ('$namaproduk', $tokoid, $kategoriid, $hargaproduk, $diskon, $terjual, '$linkgambar', '$linkproduk')";

if (mysqli_query($conn, $sql)) {
    header("Location: produk.php");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
