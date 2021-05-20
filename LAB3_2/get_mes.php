<?php
       $mysqli = new mysqli("localhost", "f0522117_root", "root", "f0522117_opros");
    if ($mysqli->connect_errno) {
        echo "Не удалось подключиться к БД";
    }

    $result = $mysqli->query(
        "SELECT name, email, mess
        FROM mes");

    if ($result){
        while ($row = $result->fetch_array()){
            $name = $row['name'];
            $email = $row['email'];
            $mess = $row['mess'];

            echo "<h2>";
            echo sprintf("Имя: %s",$name);
			echo "<p>";
			echo sprintf("Почта: %s",$email);
			echo "<p>";
			echo sprintf("Текст:");
            echo $mess;
            echo "</p>";
			echo "</h2>";
        }
    }
?>