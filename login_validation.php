<?php

session_start();

if (!isset($_SESSION['admin_user'])) {
    header("Location:admin.php");
}

require_once('db_config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['email'], $_POST['password'])) {



    $email = $_POST['email'];
    $password = $_POST['password'];

    global $dbh;

    $stmt = $dbh->prepare('SELECT * FROM admin WHERE email = :email');
    $stmt->bindValue(":email", $email);
    $stmt->execute();

    if ($stmt->rowCount() === 1) {

        $result = $stmt->fetch(PDO::FETCH_OBJ);
        $Hashedpassword = $result->password;
        if (password_verify($password, $Hashedpassword)) {
            $_SESSION['admin_user'] = $result;
            header("Location:admin_panel.php");
        } else {
            echo 'Lose email ili password';
        }
    } else {
        echo 'Lose email ili password';
    }
} else {
    echo 'Connection error!';
}
