<?php
    if(isset($_POST['login'])) {
        $login = $_POST['login'];
        if ($login == "") {
            unset($login);
        }
    }
    if(isset($_POST['password'])) {
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
    $result = mysqli_query($db, "SELECT id FROM users WHERE login='$login'");
    $myrow = mysqli_fetch_array($result);
    if (!empty($myrow['id'])) {
        exit ("Данный логин уже существует");
    }
    $result2 = mysqli_query($db, "INSERT INTO `users` (`login`, `password`) VALUES ('$login', '$password')");
    if ($result2 == "TRUE") {
        echo "Вы успешно зарегестрированы! Теперь вы можете зайти на сайт. <a href='/logined.php'>Главная страница</a>";
    } else {
        echo "Ошибка! Вы не зарегестрированы.";
    }
?>