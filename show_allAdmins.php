<?php
require_once 'db_config.php';
session_start();

if (!isset($_SESSION['admin_user'])) {
    header("Location:index.php");
}
// ovde ide lista porudzbina istorija od najnovijih (izlistavamo poslednjih 100 komada)
// kada kliknemo na porudzbinu onda da moze da se generise predracun i da se dodeli rabat
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vidi gradove</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
</head>

<body>

    <div class="container">
        <h3 class="text-center m-1">Pregled svih admina</h3>
        <?php

        $sql = "SELECT * FROM admin";

        $query = $dbh->prepare($sql);
        // $query->bindParam(':id', $id_customer, PDO::PARAM_INT);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ); // PDO::FETCH_ASSOC



        function pre_r($array)
        {
            echo '<pre>';
            print_r($array);
            echo "</pre>";
        }

        ?>
        <div class="row justify-content-center">
            <?php
            ?>



            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Id_admina</th>
                            <th>Korisničko ime</th>
                            <th>Ime</th>
                            <th>Prezime</th>
                            <th>Email</th>
                            <th colspan="2">Action</th>
                        </tr>
                    </thead>

                    <?php
                    if ($query->rowCount() > 0) : ?>
                        <?php foreach ($results as $result) { ?>
                            <tr>
                                <td><?php echo $result->id_admin ?></td>
                                <td><?php echo $result->username ?></td>
                                <td><?php echo $result->name ?></td>
                                <td><?php echo $result->surname ?></td>
                                <td><?php echo $result->email ?></td>
                                <td>
                                    <a href="deleteAdmin.php?id_admin=<?php echo $result->id_admin ?>" class="btn btn-danger me-3">Obriši</a>
                                    <a href="admin_panel.php" class="btn btn-primary me-3">Nazad</a>
                                </td>
                            </tr>
                        <?php } ?>
                    <?php endif; ?>

                </table>
            </div>
        </div>
    </div>

    <?php
    require_once 'footer.php';
    ?>



    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
-->
</body>

</html>