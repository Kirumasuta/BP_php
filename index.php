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
    if($_SESSION['match'] == "false"):
        {?>
            <div class="alert alert-warning alert-dismissible" role="alert">
                Вы вошли с другого ip-адреса: <?php echo $_SERVER['REMOTE_ADDR'];?>, который не соответствует вашей прошлой авторизации
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php }
        endif;
        ?>





    <div class="container mt-5" id="articles">
        <h3 class="mb-5">Работы</h3>

        <?php
        include 'article.php';
        ?>

    </div>




    <?php
        require 'footer.php';
        ?>



    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <!-- Bootstrap -->
    <script src="js/bootstrap.js"></script>

    </body>



</html>