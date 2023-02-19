<?php
    require_once '../../config/connect.php';
    $login = $_POST['login'];
    $password = $_POST['password'];

    mysqli_query($db, "INSERT INTO `users` (`id`, `login`, `password`) VALUES (NULL, '$login', '$password')");
    header('location: ../../admin_panel.php')
?>