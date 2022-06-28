<?php
require_once 'db_config.php';
session_start();

if (!isset($_SESSION['admin_user'])) {
    header("Location:index.php");
}

$id_city = $_GET['id_city'];

$sql = "DELETE FROM city WHERE id_city={$id_city}";
$query = $dbh->prepare($sql);
$query->execute();

header("Location:show_allCities.php");

require_once 'footer.php';
