<?php
session_start();
include("./db_connect.php");
$time_start = $_POST['time_start'];
$time_end = $_POST['time_end'];
$list = $_POST['list'];
$list1 = $_POST['list1'];
$id = mysqli_real_escape_string($db, uniqid());
$login = $_SESSION['user']['nick'];

mysqli_query($db, "INSERT INTO `rental`(`id`,`client_id`, `tarifs_id`, `start_time`, `end_time`, `equipment_id`, `price_id`)
VALUES ('{$id}','{$login}','{$list}','{$time_start}','{$time_end}','{$list1}', 0)");

$result = mysqli_query($db, "SELECT TIMESTAMPDIFF(MINUTE, start_time, end_time) * 1 AS price FROM rental");
$row = mysqli_fetch_assoc($result);
$price = $row['price'];

mysqli_query($db, "UPDATE rental SET price_id = '{$price}' WHERE id = '{$id}'");

$_SESSION['price'] = $price;

// Перенаправляем пользователя на страницу profil.html
header("Location: ../html/profile.php");
exit();
?>
