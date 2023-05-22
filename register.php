<?php
// Страница регистрации нового пользователя 
// Соединяемся с БД

$link=mysqli_connect("localhost", "root", "", "db"); 

if(isset($_POST['submit']))
{
    $err = [];
    // проверяем логин
    if(!preg_match("/^[a-zA-Z0-9]+$/",$_POST['username']))
    {
        $err[] = "Логин может состоять только из букв английского алфавита и цифр";
    } 
    if(strlen($_POST['username']) < 3 or strlen($_POST['username']) > 30)
    {
        $err[] = "Логин должен быть не меньше 3-х символов и не больше 30";
    } 
    // проверяем, не существует ли пользователя с таким именем
    $query = mysqli_query($link, "SELECT id FROM users WHERE name='".$_POST['username']."' OR password='".$_POST['pass']."'  ");
    if(mysqli_num_rows($query) > 0)
    {
        $err[] = "Пользователь с таким логином или паролем уже существует в базе данных";
    } 

    $query2 = mysqli_query($link, "SELECT id FROM users WHERE phone='".$_POST['phone']."' ");
    if(mysqli_num_rows($query2) > 0)
    {
        $err[] = "Пользователь с таким номером уже существует в базе данных";
    } 

    $query3 = mysqli_query($link, "SELECT id FROM users WHERE email='".$_POST['email']."' ");
    if(mysqli_num_rows($query3) > 0)
    {
        $err[] = "Пользователь с такой почтой уже существует в базе данных";
    } 




    if($_POST['pass'] != $_POST['rpass'])
    {
        $err[] = "Пароли не совпадают!!!";
    }



    // Если нет ошибок, то добавляем в БД нового пользователя
    if(count($err) == 0)
    {
        $login = $_POST['username'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        // Убираем лишние пробелы и делаем двойное хэширование (используем старый метод md5)
        $password = trim($_POST['pass']); 
        mysqli_query($link,"INSERT INTO users SET name='".$login."', password='".$password."', email='".$email."', phone='".$phone."'");
        header("Location: signIn.php"); exit();
    }
    else
    {
        print "<b>При регистрации произошли следующие ошибки:</b><br>";
        foreach($err AS $error)
        {
            print $error."<br>";
        }
    }
}

?>