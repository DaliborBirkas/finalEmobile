<?php
require_once 'db_config.php';
session_start();

if (!isset($_SESSION['admin_user'])) {
    header("Location:index.php");
}

$id_admin = $_GET['id_admin'];

$sql = "DELETE FROM admin WHERE id_admin={$id_admin}";
$query = $dbh->prepare($sql);
$query->execute();

header("Location:show_allAdmins.php");

require_once 'footer.php';
