<?php include('navbar.php'); ?>
<?php require('../config/conn.php'); ?>

<?php
session_start();

if (isset($_SESSION['adminid'])) {
} else {
    header("Location: login.php");
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
                        <h1 class="h3 mb-0 text-gray-800">Pengaturan Umum</h1>
                    </div>

                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <form action="upload.php" method="post" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <img src="../assets/images/adv/adv.jpg" class="w-100">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Pilih Gambar:</label>
                                    <input type="file" name="fileToUpload" id="fileToUpload">
                                </div>
                                <div>
                                    <input type="submit" value="Upload Gambar" class="btn btn-primary" name="submit">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <?php include('footer.php'); ?>