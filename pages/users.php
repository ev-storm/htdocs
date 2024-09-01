

<?php
session_start();
// // Функция автоматического выхода через 2 минуты (120 секунд)
if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] > 240)) {
    // Время бездействия превышает 4 минуты, выполняем выход
    session_unset();
    session_destroy();
    header('Location: login.php');
    exit();
}
$_SESSION['last_activity'] = time();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login.php');
    exit();
}

// Подключение к базе данных
$conn = new mysqli("localhost", "root", "root", "DB");
if ($conn->connect_error) {
    die("Ошибка подключения: " . $conn->connect_error);
}

// Выбор пользователей
$sql = "SELECT id, name, phone FROM users";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Пользователи</title>
</head>
<body>
    <h1>Добро пожаловать, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>
		<h1>Список пользователей</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Имя</th>
            <th>Номер телефона</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>{$row['id']}</td><td>{$row['name']}</td><td>{$row['phone']}</td></tr>";
            }
        } else {
            echo "<tr><td colspan='3'>Нет пользователей</td></tr>";
        }
        $conn->close();
        ?>
    </table>

    <form action="../login/logout.php" method="post">
        <button type="submit">Выйти</button>
    </form>
</body>
</html>