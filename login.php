<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title> BREADPHOTO </title>
</head>

<body>

<?php
require 'header.php';
session_start();
if($_SESSION['correct'] == "false"):
    {?>
        <div class="alert alert-warning alert-dismissible" role="alert">
            Неправильные данные
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php }
endif;
$_SESSION['correct'] = "true";
?>

<div class="container mt-5">

    <h3 >Вход</h3><br>

    <form action="check_user.php" method="post">

        <input id="login" type="text" name="login" placeholder="Введите логин" class="form-control"><br>
        <input id="pwd" type="password" name="pwd" placeholder="Введите пароль" class="form-control"><br>

        <div class="form-check mb-2">
            <input type="checkbox" name="checkbox" value="1" class="form-check-input">
            <label class="form-check-label" for="checkbox">Запомнить меня</label>
        </div>

        <button id="submit" type="submit" name="submit" class="btn btn-success">Войти</button>
    </form>
</div>

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!-- <script src="//code.jquery.com/jquery.js"></script>
Include all compiled plugins (below), or include individual files as needed -->
<!-- <script type="text/javascript" src="js/bootstrap.js"></script>
The AJAX login script -->
<!-- <script src="js/loglog.js"></script>-->

    <?php
    require 'footer.php';
    ?>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <!-- Bootstrap -->
    <script src="js/bootstrap.js"></script>



</body>

</html>


