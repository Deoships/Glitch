<?php
session_start();
include("./db_connect.php");
$name = $_POST['name'];
$login = $_POST['login'];
$password = $_POST['password'];

// Проверка на пустые поля
if (empty($name) || empty($login) || empty($password)) {
    echo "Ошибка: Все поля должны быть заполнены.";
    exit();
}

// Проверка длины пароля
if (strlen($password) < 8) {
    echo "Ошибка: Пароль должен быть не менее 8 символов.";
    exit();
}

// Проверка наличия верхнего и нижнего регистра в пароле
if (!preg_match('/[a-z]/', $password) || !preg_match('/[A-Z]/', $password)) {
    echo "Ошибка: Пароль должен содержать символы верхнего и нижнего регистра.";
    exit();
}

// Проверка наличия цифр в пароле
if (!preg_match('/\d/', $password)) {
    echo "Ошибка: Пароль должен содержать хотя бы одну цифру.";
    exit();
}

// Проверка наличия специальных символов в пароле
if (!preg_match('/[!@#$%^&*]/', $password)) {
    echo "Ошибка: Пароль должен содержать хотя бы один специальный символ (!@#$%^&*).";
    exit();
}

// Проверка длины логина
if (strlen($login) < 5 || strlen($login) > 20) {
    echo "Ошибка: Логин должен быть длиной от 5 до 20 символов.";
    exit();
}

// Проверка формата адреса электронной почты
if (!preg_match('/[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}/', $login)) {
    echo "Ошибка: Неправильный формат адреса электронной почты.";
    exit();
}

// Проверка существования пользователя с таким логином
$query = mysqli_query($db, "SELECT * FROM `clients` WHERE `login`='{$login}'");
if (mysqli_num_rows($query) == null) {
    $_SESSION['user'] = ['nick' => $login];
    mysqli_query($db, "INSERT INTO `clients`(`name`, `login`, `password`) VALUES ('{$name}','{$login}','{$password}')");
    header("Location: ./user.php");
} else {
    echo "Ошибка: Данный логин занят другим пользователем.";
}
