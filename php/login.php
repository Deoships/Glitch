<?php
session_start();
include("./db_connect.php");
$login = $_POST['login'];
$password = $_POST['password'];
$query = mysqli_query($db, "SELECT * FROM `clients` WHERE `login`='$login' AND `password`='$password'");
if (mysqli_num_rows($query) > 0) {
    $row = mysqli_fetch_assoc($query);
    if ($row['admin'] == 1) {
        $_SESSION['user'] = ['nick' => $login];
        header("Location: ../html/admin.php");
        exit();
    } else {
        $_SESSION['user'] = ['nick' => $login];
        header("Location: ../html/profile.php");
        exit();
    }
} else {
    echo("Ошибка: Данный логин или пароль неправильны.");
}
?>
