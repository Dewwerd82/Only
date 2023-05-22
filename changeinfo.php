<?php
// Страница регистрации нового пользователя 
// Соединяемся с БД

$link=mysqli_connect("localhost", "root", "", "db"); 

if(isset($_POST['submit']))
{
    
    
        $login = $_POST['name'];
        $email = $_POST['email'];
        $phon = $_POST['phon'];
        // Убираем лишние пробелы и делаем двойное хэширование (используем старый метод md5)
        $password = trim($_POST['pass']); 
        mysqli_query($link,"UPDATE users SET name='".$login."', password='".$password."', email='".$email."', phone='".$phon."' WHERE name='".$_SESSION['name']."'");
        
        setcookie("name", $login, time()+60*60*24*30, "/");
        
        $_SESSION['name']=$login;
        header("Location: /"); exit();
    
    
}

?>