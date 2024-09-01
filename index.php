<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Добавление пользователя</title>
		<link rel="stylesheet" href="/css/master.css">
</head>
<body>
<header>
	<?php //include 'components/header.php' ?>
</header>
<main>
		 
	<h1>Добавление пользователя</h1>
	<form action="/login/save.php" method="POST">
			<label for="name">Имя:</label>
			<input type="text" id="name" name="name" required><br>
			<label for="phone">Номер телефона:</label>
			<input type="text" id="phone" name="phone" required><br>
			<input type="submit" value="Сохранить">
	</form>
	<a href="/pages/users.php"><button class="button">Войти</button></a>
</main>
<footer></footer>
</body>
</html>