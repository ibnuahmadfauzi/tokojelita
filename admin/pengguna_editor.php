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
$penggunaid = 0;
$penggunanama = "";
$penggunausername = "";
$penggunapassword = "";
if (isset($_GET['penggunaid'])) {
    $penggunaid = $_GET['penggunaid'];
    $sql = "SELECT * FROM user WHERE id=$penggunaid";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            $penggunanama = $row['nama'];
            $penggunausername = $row['username'];
            $penggunapassword = $row['password'];
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
                        <h1 class="h3 mb-0 text-gray-800">Pengguna Editor</h1>
                    </div>

                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <form action="proses_pengguna.php" method="post">
                                <input type="hidden" name="penggunaid" value="<?php echo $penggunaid; ?>">
                                <div class="mb-3">
                                    <label class="form-label">Nama:</label>
                                    <input type="text" class="form-control" name="namapengguna" placeholder="Nama Pengguna ..." value="<?php echo $penggunanama; ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Username:</label>
                                    <input type="text" class="form-control" name="usernamepengguna" placeholder="Username ..." value="<?php echo $penggunausername; ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Password:</label>
                                    <input type="text" class="form-control" name="passwordpengguna" placeholder="Password ..." value="<?php echo $penggunapassword; ?>" required>
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