<?php
    require_once 'connect/connect.php';
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
    $immovables = mysqli_query($db, "SELECT * FROM `information`");
    $immovables = mysqli_fetch_all($immovables);
    foreach ($immovables as $immovable) {
        if ($immovable[13] > 0.5) {
            $cost_immovable = $immovable[4] * 0.14343 * 10 + $immovable[4];
            $cost_immovable = (int)$cost_immovable;
            $bank_deposit = $immovable[4] * 0.0706 * 10 + $immovable[4];
            $bank_deposit = (int)$bank_deposit;
            $rental = $immovable[4] * 0.14343 * 10 + 15000 * 10 * 10 + $immovable[4];
            $rental = (int)$rental;
            $morcost_immovabletgage = $immovable[4] * 0.14343 * 10 * 7.283 + $immovable[4];
            $morcost_immovabletgage = (int)$morcost_immovabletgage;
        } else {
            $cost_immovable = $immovable[4] * 0.1174 * 10 + $immovable[4];
            $cost_immovable = (int)$cost_immovable;
            $bank_deposit = $immovable[4] * 0.0706 * 10;
            $bank_deposit = (int)$bank_deposit;
            $rental = $immovable[4] * 0.1174 * 10 + 15000 * 10 * 10 + $immovable[4];
            $rental = (int)$rental;
            $morcost_immovabletgage = $immovable[4] * 0.14343 * 10 * 7.283 + $immovable[4];
            $morcost_immovabletgage = (int)$morcost_immovabletgage;
        }
        echo "$cost_immovable";
    }
?>