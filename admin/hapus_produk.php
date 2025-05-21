<?php require('../config/conn.php'); ?>
<?php
$produkid = $_GET['produkid'];
echo $produkid;

$sql = "DELETE FROM produk WHERE id=$produkid";

if ($conn->query($sql) === TRUE) {
    header("Location: produk.php");
} else {
    echo "Error deleting record: " . $conn->error;
}
?>