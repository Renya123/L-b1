<html lang="ru">
<head>
<meta charset="utf-8" />
<script src="jquery-3.6.0.min.js"></script> 
</head>
<body>
<p>Какое животное вам  нравится больше?</p>
<script src="2Lab6.js"></script>
<form action="animals.php" metod="get">
<?php
	$link = mysqli_connect("127.0.0.1", "f0522117_opros", "12345", "f0522117_opros");
	mysqli_query($link, 'SET NAMES utf-8');
	if (!$link) {
		echo "Ошибка: Невозможно установить соединение с MySQL." . PHP_EOL;
		echo "Код ошибки errno: " . mysqli_connect_errno() . PHP_EOL;
		echo "Текст ошибки error: " . mysqli_connect_error() . PHP_EOL;
		exit;
		}
	mysqli_select_db($link, "f0522117_opros");
?>
<p><input type="radio" id="cat" value="cat" name="animal" checked>Кошка</input></p>
<p><input type="radio" id="dog" value="dog" name="animal">Собака</input></p>
<p><input type="radio" id="rat" value="rat" name="animal">Крыса</input></p>
<p><input type="radio" id="mouse" value="mouse" name="animal">Мышка</input></p>
<button type="submit" id="send">Проголосовать</button>
</form>

<footer id="index-footer">
<div>
	<button id="stats">Показать статистику</button>
	<script>
	$("#stats").click(function(){ 
	$("#count").css("visibility", "visible"); 
	}) 
</script>
</div>
<div id="count" style="visibility:hidden">
<?php
	$cat=mysqli_query($link,"SELECT animal FROM `animals` WHERE animal='cat' ");
	$dog=mysqli_query($link,"SELECT animal FROM `animals` WHERE animal='dog' ");
	$rat=mysqli_query($link,"SELECT animal FROM `animals` WHERE animal='rat' ");
	$mouse=mysqli_query($link,"SELECT animal FROM `animals` WHERE animal='mouse' ");
	$all=mysqli_query($link,"SELECT * FROM animals ");
	$data1=mysqli_num_rows($cat);
	$data2=mysqli_num_rows($mouse);
	$data3=mysqli_num_rows($rat);
	$data4=mysqli_num_rows($mouse);
	$data5=mysqli_num_rows($all);
						
	print "Кошка: " .$data1 . " (" . round ($data1/$data5*100, 2) ."%)";
	echo "<br />";	
	print "Собака: " .$data2. " (" . round ($data2/$data5*100, 2) ."%)";
	echo "<br />";				
	print "Крыса: " .$data3. " (" . round ($data3/$data5*100, 2) ."%)";
	echo "<br />";			
	print "Мышка: " .$data4. " (" . round($data4/$data5*100, 2) ."%)";
	echo "<br />";			
	print "Всего ответов: " .$data5;
	echo "<br />";
?>
</footer>
</body>

</html>