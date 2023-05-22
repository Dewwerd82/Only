<?php
require 'bootstrap.php';
include 'check.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Test</title>
    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/theme.css" rel="stylesheet">

    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,300,700,100' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Raleway:300,700,900,500' rel='stylesheet' type='text/css'>

    <link href="style.css" rel="stylesheet">
</head>

<body class="">

    <header id="home">

        <div class="container-fluid">
            <!-- Если авторизован добавляется кнопка для выхода -->
            <?php
            if (autoriz()) {
                echo '"<a href="logout.php" class="btn btn-lg btn-danger logout">logOut</a>"';
            }
            ?>

            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-xs-10">
                        <a href="#" class="thumbnail logo">
                            <img src="images/your_logo.png" alt="" class="img-responsive">
                        </a>
                    </div>

                    <div class="col-md-1 col-md-offset-8 col-xs-2 text-center">
                        <div class="menu-btn"><span class="hamburger">&#9776;</span></div>
                    </div>
                </div>

                <div class="jumbotron1">
                    <h1>
                        <!-- выводит имя если авторизован -->
                        <?php check(); ?>
                        </br>
                    </h1>
                    <?php
                    if (!autoriz()) {
                        echo '<p>Зарегестрируйтесь, что б вы могли видеть свою информацию<br></p>
                            <p>
                                <a href="signUp.php" class="btn btn-primary btn-lg" role="button" >Sign UP</a> 
                                <a href="signIn.php" class="btn btn-lg btn-danger" role="button">Sign IN</a>
                            </p>';
                    }
                    ?>


                </div>
            </div>
        </div>
    </header>

    <section>
        <!-- если авторизован можно отредактировать свои данные -->
        <?php
        if (autoriz()) {
            include './info.php';
        }
        ?>
    </section>



</body>

</html>