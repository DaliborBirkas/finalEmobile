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
            <h1 class="text-center">Dodaj admina</h1>
            <div class="form-group m-2">
                <label for="username">Korisničko ime</label>
                <input type="text" class="form-control" id="username" name="username">
            </div>
            <div class="form-group m-2">
                <label for="password">Šifra</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="form-group m-2">
                <label for="firstName">Ime</label>
                <input type="text" class="form-control" id="firstName" name="firstName">
            </div>
            <div class="form-group m-2">
                <label for="lastName">Prezime</label>
                <input type="text" class="form-control" id="lastName" name="lastName">
            </div>
            <div class="form-group m-2">
                <label for="email">Email</label>
                <input type="text" class="form-control" id="email" name="email">
            </div>
            <div class="form-group m-2">
                <input type="submit" value="Potvrdi" name="sb" class="btn btn-success">
                <a href="admin_panel.php" class="btn btn-danger">Nazad</a>
                <a href="show_allAdmins.php" class="btn btn-primary">Svi admini</a>
            </div>
            <br>
        </form>
    </div>

    <?php



    if (isset($_POST['sb'])) {
        if (empty($_POST['username']) || empty($_POST['password']) || empty($_POST['firstName']) || empty($_POST['lastName']) || empty($_POST['email'])) {
            echo "<p class='ms-5' align='center'>Popunite polja!</p>";
        } else {

            $username = $_POST['username'];
            $password = $_POST['password'];
            $firstName = $_POST['firstName'];
            $lastName = $_POST['lastName'];
            $email = $_POST['email'];

            $hashedPw = password_hash($password, PASSWORD_BCRYPT);

            $sql = "INSERT INTO admin (username, password, name, surname, email) VALUES (:new_username, :new_password, :new_name, :new_surname, :new_email)";

            $query = $dbh->prepare($sql);
            $query->bindParam(':new_username', $username, PDO::PARAM_STR);
            $query->bindParam(':new_password', $hashedPw, PDO::PARAM_STR);
            $query->bindParam(':new_name', $firstName, PDO::PARAM_STR);
            $query->bindParam(':new_surname', $lastName, PDO::PARAM_STR);
            $query->bindParam(':new_email', $email, PDO::PARAM_STR);
            $query->execute();
            header("Location:show_allAdmins.php");
        }
    }
    ?>

    <?php
    require_once 'footer.php';
    ?>


</body>

</html>