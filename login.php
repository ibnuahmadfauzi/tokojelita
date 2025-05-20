<?php require('config/conn.php'); ?>
<?php include('navbar.php'); ?>

<?php
session_start();
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
    <div class="row">
        <div class="col-lg-4"></div>
        <div class="col-lg-4">
            <div class="card my-5">
                <div class="card-body">
                    <form action="proses_login.php" method="post">
                        <div class="mb-3">
                            <label class="form-label">Username:</label>
                            <input type="text" class="form-control" name="username">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password:</label>
                            <input type="password" class="form-control" name="password">
                        </div>
                        <div>
                            <button type="submit" class="btn btn-sm btn-primary">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-4"></div>
    </div>
</div>

<?php include('footer.php'); ?>