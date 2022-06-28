<?php
require_once "db_config.php";
session_start();

if (!isset($_SESSION['admin_user'])) {
    header("Location:index.php");
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin - edit kategorije</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
</head>

<body>

    <div class="container w-100 p-4">
        <form id="forms" method="post">
            <h1 class="text-center">Dodaj grad</h1>
            <div class="form-group m-2">
                <label for="cityName">Ime grada</label>
                <input type="text" class="form-control" id="cityName" name="cityName">
            </div>
            <div class="form-group m-2">
                <label for="postcode">Poštanski broj</label>
                <input type="text" class="form-control" id="postcode" name="postcode">
            </div>
            <div class="form-group m-2">
                <input type="submit" value="Potvrdi" name="sb" class="btn btn-success">
                <a href="admin_panel.php" class="btn btn-danger">Nazad</a>
                <a href="show_allCities.php" class="btn btn-primary">Svi gradovi</a>
            </div>
            <br>
        </form>
    </div>

    <?php



    if (isset($_POST['sb'])) {
        if (empty($_POST['cityName']) || empty($_POST['postcode'])) {
            echo "<p class='ms-5' align='center'>Popunite polja!</p>";
        } else {

            $cityName = $_POST['cityName'];
            $postCode = intval($_POST['postcode']);

            $sql = "INSERT INTO city (city_name, city_postcode) VALUES (:new_city, :new_poscode)";



            $query = $dbh->prepare($sql);
            $query->bindParam(':new_city', $cityName, PDO::PARAM_STR);
            $query->bindParam(':new_poscode', $postCode, PDO::PARAM_INT);
            $query->execute();
            header("Location:show_allCities.php");
        }
    }
    ?>

    <?php
    require_once 'footer.php';
    ?>


</body>

</html>