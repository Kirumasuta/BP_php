<?php
    session_start();
    if(isset($_SESSION['login']))
        {
            header("location:index.php");
        }
?>




<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>BP | Контактная форма</title>
</head>

<body>

<?php
require 'header.php';
?>
<div class="container mt-5">

    <h3 >Регистрация</h3><br>

    <form action="create_user.php" method="post">

        <input id="login" type="text" name="login" placeholder="Введите логин" class="form-control" onkeyup="validLogin(this)"><br>
        <input id="email" type="email" name="email" placeholder="Введите Email" class="form-control"><br>
        <input id="pwd" type="password" name="pwd" placeholder="Введите пароль" class="form-control"><br>
        <input id="retypepwd" type="password" name="retypepwd" placeholder="Повторите пароль" class="form-control"><br>


        <button id="submit" type="submit" name="submit" class="btn btn-success">Зарегистрироваться</button>

        <div id="message"></div>

    </form
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="//code.jquery.com/jquery.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script type="text/javascript" src="js/bootstrap.js"></script>
<!-- The AJAX login script -->
<script src="js/createfin.js"></script>
<script>document.getElementById("submit").disabled = true;</script>



<?php
require 'footer.php';
?>

</body>

</html>

