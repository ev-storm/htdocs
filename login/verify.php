<?php
session_start();

// Заданные логин и пароль
$correct_username = 'admin';
$correct_password = 'asas';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username === $correct_username && $password === $correct_password) {
        // Успешная аутентификация
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username; // сохранить имя пользователя в сессии
        $_SESSION['last_activity'] = time(); // установить время последней активности
        header('Location: ../pages/users.php');
        exit();
    } else {
        // Аутентификация не удалась
        echo 'Неправильный логин или пароль.';
    }
}
?>