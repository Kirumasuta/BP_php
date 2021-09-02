<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
    <h5 class="my-0 mr-md-auto font-weight-normal"><a href="index.php" class="text-dark">BREADPHOTO</a></h5>
    <nav class="my-2 my-md-0 mr-md-3">
        <a class="p-2 text-dark" href="about.php">Записаться</a>
        <a class="p-2 text-dark" href="#">Цены</a>
    </nav>


        <?php
          session_start();
          if($_SESSION['auth'] == "true" && isset($_COOKIE['password'])){
                ?>
                    <a class="btn btn-outline-primary" href="profile.php">Личный кабинет</a>
                    <a class="btn btn-outline-primary ml-3" href="logout.php">Выйти</a>

              <?php
          }

            else{
                ?>
                    <a class="btn btn-outline-primary" href="register.php">Регистрация</a>
                    <a class="btn btn-outline-primary ml-3" href="login.php">Войти</a>
                <?php
                }
                ?>

</div>