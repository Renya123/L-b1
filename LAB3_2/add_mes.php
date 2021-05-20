<?php
    $mysqli = new mysqli("localhost", "f0522117_root", "root", "f0522117_opros");
    if ($mysqli->connect_errno) {
        echo "Не удалось подключиться к БД";
    }

    $email = $_GET['email'];
    $name = $_GET['name'];
    $mess = $_GET['mess'];

    $result = $mysqli->query(
        "INSERT INTO mes SET name='$name', email='$email', mess='$mess'"
    );
?>
