<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Главная страница</title>
</head>
<body>
    <h2>Главная страница</h2>
    <form action="registration/testing_registration.php" method="POST">
        <p>
            <label>Ваш логин:<br></label>
            <input type="text" name="login" size="15" maxlength="15">
        </p>
        <p>
            <label>Ваш пароль:</label>
            <input type="password" name="password" size="15" maxsize="15">
        </p>
        <p>
        <input type="submit" name="submit" value="Войти">
        <a href="registration/registration.php">Зарегестрироваться</a>
        </p>
    </form>
</body>
</html>