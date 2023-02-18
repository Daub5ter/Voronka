<?php
    require_once '../connect/connect.php';
    $users_id = $_GET['id'];
    $user = mysqli_query($db, "SELECT * FROM `users` WHERE `id` = '$users_id'");
    $user = mysqli_fetch_assoc($user);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/admin_panel_users.css">
    <title>Изменить пользоваля</title>
</head>
<body>
    <h2>Обновить пользователя</h2>
    <form action="users/update.php" method="POST">
        <input type="hidden" name="id" value="<?= $_id ?>">
        <p>Логин</p>
        <input type="text" name="login" value="<?= $user['login'] ?>">
        <p>Пароль</p>
        <textarea name="password"><?= $user['password'] ?></textarea>
        <button type="submit">Обновить</button>
    </form>
</body>
</html>

