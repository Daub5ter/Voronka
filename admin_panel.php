<?php
    require_once 'connect/connect.php';
    $users = mysqli_query($db, "SELECT * FROM `users`");
    $users = mysqli_fetch_all($users);
    $immovables = mysqli_query($db, "SELECT * FROM `information`");
    $immovables = mysqli_fetch_all($immovables);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/admin_panel_users.css">
    <title>Админ панель</title> 
    <!-- login: admin / password: admin -->
</head>
<body>
    <h2>Добавить информацию</h2>
    <form action="admin_panel/immovables/create.php" method="POST">
        <p>Название</p>
        <input type="text" name="title">
        <p>Застройщик</p>
        <input name="builder" type="text">
        <p>Адрес</p>
        <input type="text" name="adress">
        <p>Цена</p>
        <input type="text" name="price">
        <p>Цена за м&#178;</p>
        <input type="text" name="priceperm">
        <p>Площадь</p>
        <input type="repair" name="area">
        <p>Сдача</p>
        <input name="godpos" type="text">
        <p>Ремонт</p>
        <input type="text" name="repair">
        <p>Описание</p>
        <textarea name="des"></textarea>
        <p>Номер</p>
        <input type="phone" name="number">
        <button type="submit">Добавить</button>
    </form>
    <div class="users_panel">
        <table>
            <tr>
                <th>id</th>
                <th>Логин</th>
                <th>Пароль</th>
                <th>&#9998;</th>
                <th>&#10006;</th>
            </tr>
            <?php
                foreach($users as $item) {
                    if ($item[1] != 'admin') {
                    ?>
                    <tr>
                        <td><?= $item[0] ?></td>
                        <td><?= $item[1] ?></td>
                        <td><?= $item[2] ?></td>
                        <td><a href="admin_panel/update_user.php?id=<?= $item[0] ?>">Изменить</a></td>
                        <td><a href="admin_panel/users/delete.php?id=<?= $item[0] ?>">Удалить</a></td>
                    </tr>
                    <?php
                    }
                }
            ?>
    </div>
    <div class="immovables_panel">
        <table>
            <tr>
                <th>id</th>
                <th>Название</th>
                <th>Застройщик</th>
                <th>Адрес</th>
                <th>Цена</th>
                <th>Цена за м&#178;</th>
                <th>Площадь</th>
                <th>Сдача</th>
                <th>Ремонт</th>
                <th>Описание</th>
                <th>Номер</th>
                <th>&#9998;</th>
                <th>&#10006;</th>
            </tr>
            <?php
                foreach($immovables as $item) {
                    ?>
                    <tr>
                        <td><?= $item[0] ?></td>
                        <td><?= $item[1] ?></td>
                        <td><?= $item[2] ?></td>
                        <td><?= $item[3] ?></td>
                        <td><?= $item[4] ?></td>
                        <td><?= $item[5] ?></td>
                        <td><?= $item[6] ?></td>
                        <td><?= $item[7] ?></td>
                        <td><?= $item[8] ?></td>
                        <td><?= $item[9] ?></td>
                        <td><?= $item[11] ?></td>
                        <td><a href="admin_panel/update_immovable.php?id=<?= $item[0] ?>">Изменить</a></td>
                        <td><a style="color: #c22a2a;" href="admin_panel/immovables/delete.php?id=<?= $item[0] ?>">Удалить</a></td>
                    </tr>
                    <?php
                }
            ?>
        </table>
    </div>
    
</body>
</html>