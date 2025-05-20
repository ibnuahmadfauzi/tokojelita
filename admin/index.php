<?php
session_start();

if (isset($_SESSION['adminid'])) {
    header("Location: dashboard.php");
} else {
    header("Location: login.php");
}
