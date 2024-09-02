<?php
ob_start(); // Начало буферизации вывода

$servername = "localhost";
$username = "u2367564_admin";
$password = "lV4zW8oH3gfK4pS6";
$dbname = "u2367564_DB";

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

// Перенаправление после выполнения всех операций
header('Location: ../index.php');
exit();

// Конец буферизации и сброс буфера
ob_end_flush();
?>