<?php
// Подключение к базе данных
$host = 'localhost';
$db = 'computer_club';
$user = 'root';
$password = '';

try {
    $conn = new PDO("mysql:host=$host;dbname=$db", $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Получение данных из формы
    $name = $_POST['name'];
    $login = $_POST['login'];
    $password = $_POST['password'];
    $admin = isset($_POST['admin']) ? 0 : 1;

    // Вставка данных в таблицу
    $stmt = $conn->prepare("INSERT INTO clients (name, login, password, admin) VALUES (:name, :login, :password, :admin)");
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':login', $login);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':admin', $admin);
    $stmt->execute();

    // Перенаправление на главную страницу
    header("Location: ../html/admin.php");
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
