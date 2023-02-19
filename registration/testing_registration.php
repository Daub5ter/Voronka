<?php
    session_start();
    if (isset($_POST['login'])) {
        $login = $_POST['login'];
        if ($login == "") {
            unset($login);
        }
    }
    if (isset($_POST['password'])) {
        $password = $_POST['password'];
        if ($password == "") {
            unset($password);
        }
    }
    if (empty($login) or empty($password)) {
        exit ("Вы ввели не всю информацию");
    }
    $login = stripslashes($login);
    $login = htmlspecialchars($login);
    $password = stripslashes($password);
    $password = htmlspecialchars($password);
    $login = trim($login);
    $password = trim($password);
    require("../connect/connect.php");
    $result = mysqli_query($db, "SELECT * FROM users WHERE login='$login'");
    $myrow = mysqli_fetch_array($result);
    if (empty($myrow['password'])) {
        exit ("Извините, введенный вами login или пароль не верный.");
    } else {
        if ($myrow['password'] == $password) {
            $_SESSION['login'] = $myrow['login'];
            $_SESSION['id'] = $myrow['id'];
            echo "Вы успешно вошли на сайт! <a href='../logined.php'>Главная страница</a>";
        } else {
            exit("Извините, введенный вами login или пароль не верный.");
        } if ($myrow['login'] == 'admin') {
            echo "<br><a href='../admin_panel.php'>Админ панель</a>";
        }
    }
?>