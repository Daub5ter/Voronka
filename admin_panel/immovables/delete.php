<?php
    require_once '../../connect/connect.php';
    $id = $_GET['id'];

    mysqli_query($db, "DELETE FROM `information` WHERE `information`.`id` = '$id'");
    header('location: ../../admin_panel.php');
?>