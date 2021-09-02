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
            <h3>Контактная форма</h3>
            <form action="check_user.php" method="post">

                <input type="email" name="email" placeholder="Введите Email" class="form-control"><br>
                <textarea name="message" class="form-control" placeholder="Введите ваше сообщение"></textarea><br>
                <button type="submit" name="send" class="btn btn-success">Отправить</button>

            </form>
        </div>


    <?php
    require 'footer.php';
    ?>

</body>

</html>

