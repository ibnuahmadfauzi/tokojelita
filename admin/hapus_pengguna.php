<?php require('../config/conn.php'); ?>
<?php
$penggunaid = $_GET['penggunaid'];
echo $penggunaid;

$sql = "DELETE FROM user WHERE id=$penggunaid";

if ($conn->query($sql) === TRUE) {
    header("Location: pengguna.php");
} else {
    echo "Error deleting record: " . $conn->error;
}
?>