<?php require('../config/conn.php'); ?>
<?php
$namaproduk = $_POST['namaproduk'];
$kategoriid = $_POST['kategoriid'];
$tokoid = $_POST['tokoid'];
$hargaproduk = $_POST['hargaproduk'];
$linkproduk = $_POST['linkproduk'];
$linkgambar = $_POST['linkgambar'];
$produkid = $_POST['produkid'];
$diskon = 0;
$terjual = 0;

if ($produkid == 0) {
    $sql = "INSERT INTO produk (nama, toko_id, kategori_id, harga, diskon, terjual, gambar, link)
    VALUES ('$namaproduk', $tokoid, $kategoriid, $hargaproduk, $diskon, $terjual, '$linkgambar', '$linkproduk')";

    if (mysqli_query($conn, $sql)) {
        header("Location: produk.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
} else {
    $sql = "UPDATE produk SET nama = '$namaproduk', toko_id = $tokoid, kategori_id = $kategoriid, harga = $hargaproduk, diskon = $diskon, terjual = $terjual, gambar = '$linkgambar', link = '$linkproduk' WHERE id = $produkid;";

    if ($conn->query($sql) === TRUE) {
        header("Location: produk.php");
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
