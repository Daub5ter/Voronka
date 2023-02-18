<?php
    require_once '../../connect/connect.php';
    $title = $_POST['title'];
    $builder = $_POST['builder'];
    $adress = $_POST['adress'];
    $price = $_POST['price'];
    $priceperm = $_POST['priceperm'];
    $area = $_POST['area'];
    $godpos = $_POST['godpos'];
    $repair = $_POST['repair'];
    $des = $_POST['des'];
    $number = $_POST['number'];

    mysqli_query($db, "INSERT INTO `information` (`id`, `title`, `builder`, `adress`, `price`, `priceperm`, `area`, `godpos`, `repair`, `des`, `number`)
        VALUES (NULL, '$title', '$builder', '$adress', '$price', '$priceperm', '$area', '$godpos', '$repair', '$des', '$number')");
    header('location: ../../admin_panel.php')
?>