<?php
// Подключение к базе данных
$host = 'localhost';
$db = 'computer_club';
$user = 'root';
$password = '';

try {
    $conn = new PDO("mysql:host=$host;dbname=$db", $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Чтение данных из таблицы
    $stmt = $conn->query("SELECT * FROM clients");

    while ($row = $stmt->fetch()) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['login'] . "</td>";
        echo "<td>" . $row['password'] . "</td>";
        echo "<td>" . ($row['admin'] ? 'Yes' : 'No') . "</td>";
        echo "<td><a href=\"../php/update.php?id=" . $row['id'] . "\">Edit</a> | <a href=\"../php/delete.php?id=" . $row['id'] . "\">Delete</a></td>";
        echo "</tr>";
    }
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
