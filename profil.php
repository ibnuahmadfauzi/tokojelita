<?php require('config/conn.php'); ?>
<?php include('navbar.php'); ?>

<?php
// Start the session
session_start();
if (isset($_SESSION["userid"])) {
    if ($_SESSION["userid"] !== 0) {
    } else {
        header("Location: login.php");
    }
} else {
    header("Location: login.php");
}

?>

<?php
if (isset($_SESSION['error'])) {
?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Login Gagal!</strong> <?php echo $_SESSION['error'];
                                        unset($_SESSION['error']); ?>.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php
}
?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card my-5">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <div class="p-5">
                                <img src="admin/assets/sb-admin/img/undraw_profile.svg" alt="" class="img-fluid">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <?php
                            $iduserget = $_SESSION['userid'];
                            $sql = "SELECT * FROM user WHERE id=$iduserget";
                            $result = mysqli_query($conn, $sql);

                            if (mysqli_num_rows($result) > 0) {
                                // output data of each row
                                while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                                    <table class="table table-bordered">
                                        <tr>
                                            <td>
                                                <b>ID</b>
                                            </td>
                                            <td>
                                                <?php echo $row['id']; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <b>Nama</b>
                                            </td>
                                            <td>
                                                <?php echo $row['nama']; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <b>Username</b>
                                            </td>
                                            <td>
                                                <?php echo $row['username']; ?>
                                            </td>
                                        </tr>
                                    </table>
                            <?php
                                }
                            } else {
                                echo "0 results";
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('footer.php'); ?>