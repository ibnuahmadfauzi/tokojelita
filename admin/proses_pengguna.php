<?php require('../config/conn.php'); ?>
<?php
$namapengguna = $_POST['namapengguna'];
$usernamepengguna = $_POST['usernamepengguna'];
$passwordpengguna = $_POST['passwordpegguna'];
$penggunaid = $_POST['penggunaid'];

if ($penggunaid == 0) {
    $sql = "INSERT INTO user (nama, username, password)
    VALUES ('$namapengguna', '$usernamepengguna', '$passwordpengguna')";

    if (mysqli_query($conn, $sql)) {
        header("Location: pengguna.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
} else {
    $sql = "UPDATE user SET nama = '$namapengguna', username = '$usernamepengguna', password = '$passwordpengguna' WHERE id = $penggunaid;";

    if ($conn->query($sql) === TRUE) {
        header("Location: pengguna.php");
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
