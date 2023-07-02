<?php
$host = 'localhost';
$db = 'computer_club';
$user = 'root';
$password = '';
try {
    $conn = new PDO("mysql:host=$host;dbname=$db", $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Получение ID записи для удаления
    $id = $_GET['id'];

    // Удаление записи из таблицы
    $stmt = $conn->prepare("DELETE FROM clients WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    // Перенаправление на главную страницу
    header("Location: ../html/admin.php");
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
