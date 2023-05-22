<?php
// Страница авторизации 

// Соединяемся с БД

$link=mysqli_connect("localhost", "root", "", "db");
if(isset($_POST['submit']))
{
    // Вытаскиваем из БД запись, у которой email или почта равняется введенному
    $query = mysqli_query($link,"SELECT * FROM users WHERE email='".$_POST['name']."'  OR phone='".$_POST['name']."' ");
    if(mysqli_num_rows($query) > 0)
    {
    
    $data = mysqli_fetch_assoc($query); 
    // Сравниваем пароли
    if($data['password'] === $_POST['pass'])
    {
        
        setcookie("id", $data['id'], time()+60*60*24*30, "/");
        setcookie("name", $data['name'], time()+60*60*24*30, "/");
        
        $_SESSION['name']=$data['name'];
        $_SESSION['id']=$data['id'];
        
        header("Location: / "); exit();
    }
    else
    {
        
        print "Вы ввели неправильный логин/пароль";
    }
}

else {
    echo 'error';
}

}
?>