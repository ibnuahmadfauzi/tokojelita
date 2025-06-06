<?php include('navbar.php'); ?>
<?php require('../config/conn.php'); ?>

<?php
session_start();

if (isset($_SESSION['adminid'])) {
} else {
    header("Location: login.php");
}
?>

<?php
$produkid = 0;
$produknama = "";
$produktokoid = 0;
$produkkategoriid = 0;
$produkharga = 0;
$produklinkgambar = "";
$produklinkproduk = "";
if (isset($_GET['produkid'])) {
    $produkid = $_GET['produkid'];
    $sql = "SELECT * FROM produk WHERE id=$produkid";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            $produknama = $row['nama'];
            $produktokoid = $row['toko_id'];
            $produktkategoriid = $row['kategori_id'];
            $produkharga = $row['harga'];
            $produklinkgambar = $row['gambar'];
            $produklinkproduk = $row['link'];
        }
    } else {
        echo "0 results";
    }
}
?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include('sidebar.php'); ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include('topbar.php'); ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Produk Editor</h1>
                    </div>

                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <form action="proses_produk.php" method="post">
                                <input type="hidden" name="produkid" value="<?php echo $produkid; ?>">
                                <div class="mb-3">
                                    <label class="form-label">Nama:</label>
                                    <input type="text" class="form-control" name="namaproduk" placeholder="Nama Produk ..." value="<?php echo $produknama; ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Pilih Toko:</label>
                                    <select name="tokoid" class="form-control" value="<?php echo $produktokoid; ?>" required>
                                        <?php
                                        $sql = "SELECT * FROM toko";
                                        $result = mysqli_query($conn, $sql);

                                        if (mysqli_num_rows($result) > 0) {
                                            // output data of each row
                                            while ($row = mysqli_fetch_assoc($result)) {
                                        ?>
                                                <option value="<?php echo $row['id']; ?>"><?php echo $row['nama']; ?></option>

                                        <?php
                                            }
                                        } else {
                                            echo "0 results";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Pilih Kategori:</label>
                                    <select name="kategoriid" class="form-control" value="<?php echo $produkkategoriid; ?>" required>
                                        <?php
                                        $sql = "SELECT * FROM kategori";
                                        $result = mysqli_query($conn, $sql);

                                        if (mysqli_num_rows($result) > 0) {
                                            // output data of each row
                                            while ($row = mysqli_fetch_assoc($result)) {
                                        ?>
                                                <option value="<?php echo $row['id']; ?>"><?php echo $row['nama']; ?></option>

                                        <?php
                                            }
                                        } else {
                                            echo "0 results";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Harga:</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">Rp.</span>
                                        </div>
                                        <input type="numbr" class="form-control" value="<?php echo $produkharga; ?>" name="hargaproduk" required>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Link Gambar:</label>
                                    <input type="text" class="form-control" value="<?php echo $produklinkgambar; ?>" name="linkgambar" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Link Produk:</label>
                                    <input type="text" class="form-control" name="linkproduk" value="<?php echo $produklinkproduk; ?>" required>
                                </div>
                                <div>
                                    <button type="submit" class="btn btn-primary">Simpan Data</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <?php include('footer.php'); ?>