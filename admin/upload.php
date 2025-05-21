<?php
$target_dir = "../assets/images/adv/";
$target_file = $target_dir . "adv.jpg"; // Selalu simpan dengan nama 'adv.jpg'
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($_FILES["fileToUpload"]["name"], PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
        header("Location: pengaturan-umum.php");
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

// Allow only certain file types (optional, tapi disarankan)
$allowed_types = ['jpg', 'jpeg', 'png'];
if (!in_array($imageFileType, $allowed_types)) {
    echo "Sorry, only JPG, JPEG, and PNG files are allowed.";
    $uploadOk = 0;
}

// Upload file jika lolos semua pemeriksaan
if ($uploadOk == 1) {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file has been uploaded as adv.jpg.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
