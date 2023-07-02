<?php
$host = 'localhost';
$db = 'computer_club';
$user = 'root';
$password = '';

try {
    $conn = new PDO("mysql:host=$host;dbname=$db", $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Получение данных из формы
        $id = $_POST['id'];
        $name = $_POST['name'];
        $login = $_POST['login'];
        $password = $_POST['password'];
        $admin = $_POST['admin'];

        // Обновление данных в таблице
        $stmt = $conn->prepare("UPDATE clients SET name = :name, login = :login, password = :password, admin = :admin WHERE id = :id");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':login', $login);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':admin', $admin);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        // Перенаправление на главную страницу
        header("Location: ../html/admin.php");
    } else {
        // Получение ID записи для изменения
        $id = $_GET['id'];

        // Получение данных из таблицы по ID
        $stmt = $conn->prepare("SELECT * FROM clients WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $client = $stmt->fetch();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Client</title>
</head>
<body>
    <h2>Edit Client</h2>
    <form method="POST" action="update.php">
        <input type="hidden" name="id" value="<?php echo $client['id']; ?>">
        <input type="text" name="name" value="<?php echo $client['name']; ?>" required>
        <input type="text" name="login" value="<?php echo $client['login']; ?>" required>
        <input type="password" name="password" value="<?php echo $client['password']; ?>" required>
        <label for="admin">Admin:</label>
        <select name="admin" required>
            <option value="0" <?php echo $client['admin'] == 0 ? 'selected' : ''; ?>>No</option>
            <option value="1" <?php echo $client['admin'] == 1 ? 'selected' : ''; ?>>Yes</option>
        </select>
        <button type="submit">Update</button>
    </form>
</body>
</html>

<?php
    }
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
