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
    $id = $_POST['id'];

    mysqli_query($db, "UPDATE `information` SET `title` = '$title', `builder` = '$builder',
        `adress` = '$adress', `price` = '$price', `priceperm` = '$priceperm', `area` = '$area',
        `godpos` = '$godpos', `repair` = '$repair', `godpos` = '$number' 
        WHERE `information`.`id` = '$id'");
    header('location: ../../admin_panel.php');
?>