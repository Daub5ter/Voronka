<?php
    require_once '../connect/connect.php';
    $immovables_id = $_GET['id'];
    $immovable = mysqli_query($db, "SELECT * FROM `information` WHERE `id` = '$immovables_id'");
    $immovable = mysqli_fetch_assoc($immovable);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/admin_panel_users.css">
    <title>Изменить информацию</title>
</head>
<body>
    <h2>Обновить информацию</h2>
    <form action="users/update.php" method="POST">
        <input type="hidden" name="id" value="<?= $_id ?>">
        <p>Название</p>
        <input type="text" name="title" value="<?= $immovable['title'] ?>">
        <p>Застройщик</p>
        <textarea name="builder"><?= $immovable['builder'] ?></textarea>
        <p>Адрес</p>
        <input type="text" name="adress" value="<?= $immovable['adress'] ?>">
        <p>Цена</p>
        <textarea name="price"><?= $immovable['price'] ?></textarea>
        <p>Цена за м&#178;</p>
        <input type="text" name="priceperm" value="<?= $immovable['priceperm'] ?>">
        <p>Площадьк</p>
        <textarea name="area"><?= $immovable['area'] ?></textarea>
        <p>Сдача</p>
        <input type="text" name="godpos" value="<?= $immovable['godpos'] ?>">
        <p>Ремонт</p>
        <textarea name="repair"><?= $immovable['repair'] ?></textarea>
        <p>Описание</p>
        <textarea name="des"><?= $immovable['des'] ?></textarea>
        <p>Номер</p>
        <input type="text" name="number" value="<?= $immovable['number'] ?>">
        <button type="submit">Обновить</button>
    </form>
</body>
</html>