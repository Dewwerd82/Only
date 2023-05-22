<?php

// Соединяемся с БД

function check()
{
	$link = mysqli_connect("localhost", "root", "", "db");

	if (isset($_COOKIE['id'])) {
		$query = mysqli_query($link, "SELECT * FROM users WHERE id = '" . intval($_COOKIE['id']) . "' LIMIT 1");
		$userdata = mysqli_fetch_assoc($query);

		if (empty($_SESSION['name']) or empty($_SESSION['id'])) {
			// Если пусты, то мы не выводим ссылку
			echo "Вы вошли на сайт, как гость<br>";
		} else {
			// Если не пусты, то мы выводим ссылку
			echo "Вы вошли на сайт, как " . $_SESSION['name'] . "<br>";
		}
	} else {
		print "Включите куки";
	}
}

function autoriz()
{
	if (empty($_SESSION['name'])) {
		// Если пусты, то мы не выводим ссылку
		
		return false;
	} else {
		// Если не пусты, то мы выводим ссылку
		
		return true;
	}
}

?>