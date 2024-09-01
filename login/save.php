<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "DB";

$name = $_POST['name'];
$phone = $_POST['phone'];

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Ошибка подключения: " . $conn->connect_error);
}

$sql = "INSERT INTO users (name, phone) VALUES ('$name', '$phone')";

if ($conn->query($sql) === TRUE) {
    echo "Новая запись успешно добавлена";
} else {
    echo "Ошибка: " . $sql . "<br>" . $conn->error;
}

$conn->close();

header('Location: ../index.php');
exit();
?>