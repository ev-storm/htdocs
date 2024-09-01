<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Логин</title>
</head>
<body>
    <form action="../login/verify.php" method="post">
        <label for="username">Логин:</label>
        <input type="text" id="username" name="username" required>
        <br>
        <label for="password">Пароль:</label>
        <input type="password" id="password" name="password" required>
        <br>
        <button type="submit">Войти</button>
    </form>
</body>
</html>