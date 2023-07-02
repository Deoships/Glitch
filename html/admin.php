<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>
    <h1>Admin Panel</h1>
    
    <div id="container">
        <form method="POST" action="../php/create.php">
            <h2>Create Client</h2>
            <input type="text" name="name" placeholder="Name" required>
            <input type="text" name="login" placeholder="Login" required>
            <input type="password" name="password" placeholder="Password" required>
            <label for="admin">Admin:</label>
            <select name="admin" required>
                <option value="0">No</option>
                <option value="1">Yes</option>
            </select>
            <button type="submit">Create</button>
        </form>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Login</th>
                    <th>Password</th>
                    <th>Admin</th>
                </tr>
            </thead>
            <tbody>
                <?php include '../php/read.php'; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
