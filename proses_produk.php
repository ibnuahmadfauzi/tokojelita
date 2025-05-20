<?php
$iduser = $_GET['iduser'];
$idproduk =  $_GET['idproduk'];
$link = $_GET['link'];

include('config/conn.php');

$num = rand(1, 5);

$sql = "INSERT INTO user_produk_rating (user_id, produk_id, rating)
VALUES ($iduser, $idproduk, $num)";

if ($conn->query($sql) === TRUE) {
    header("Location: $link");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
