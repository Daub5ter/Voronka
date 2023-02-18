<?php
    require_once '../../connect/connect.php';
    $login = $_POST['login'];
    $password = $_POST['password'];
    $id = $_POST['id'];
    mysqli_query($db, "UPDATE `users` SET `login` = '$login', `password` = '$password' WHERE `users`.`id` = '$id'");
    header('location: ../../admin_panel.php');
?>