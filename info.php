<?php 

// Соединяемся с БД

$link=mysqli_connect("localhost", "root", "", "db");
if (isset($_COOKIE['id']))
{
    // Вытаскиваем из БД запись, у которой логин равняется введенному
    $query = mysqli_query($link,"SELECT * FROM users WHERE name='".mysqli_real_escape_string($link,$_SESSION['name'])."' LIMIT 1");
    $data = mysqli_fetch_assoc($query); 
    
    echo  "<table>
                <tr class='row' >
                    <td class='r1col' style='padding-left:20px'>".$data['id']."</td>
                    <td class='r1col' style='padding-left:20px'>".$data['name']."</td>
                    <td class='r1col' style='padding-left:20px'>".$data['email']."</td>
                    <td class='r1col' style='padding-left:20px'>".$data['password']."</td>
                    <td class='r1col' style='padding-left:20px'>".$data['phone']."</td>
                </tr>
                
            </table>
         ";
    echo "<br>";

    echo "<div class='container'>
                <form method='POST' action='changeinfo.php'>
                    <span>".$data['id']."</span>
                    
                    <input type='text' name='name' value=".$data['name'].">
                    <input type='text' name='email' value=".$data['email'].">
                    <input type='text' name='pass' value=".$data['password'].">
                    <input type='text' name='phon' value=".$data['phone'].">
                    <br>
                    <br>
                    <button name='submit'>
								Изменить
							</button>
                </form>
            </div>";

}
?>