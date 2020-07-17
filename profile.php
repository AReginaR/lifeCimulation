<?php error_reporting(-1);
require_once 'db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Симулятор жизни</title>
    <link href="resources/css/profile.css" rel="stylesheet">
    <link rel="stylesheet" href="resources/css/gallows.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body style="background: #dcd3dc">
<ul class="menu-main">
    <li><a href="game.php">Игра</a></li>
    <?php if (isset($_SESSION['logged_user'])) : ?>
        <li><a href="profile.php" class="current">Профиль</a></li>
        <li><a href="auth/logout.php" >Выход</a></li>
        <li><a href="aciev.php">Достижения</a></li>
    <?php endif;?>
</ul>
<header class="profile">
    <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-12">
            <h1 id="prof">Ваш профиль: </h1>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 desc">
            <div class=" col-lg-6 col-md-8 col-sm-12">
                <form method="post" action="auth/profile.php">
                    <div class="form-group">
                        <h4>Email</h4>
                        <input type="email" class="form-control" name="email" id="login" value="<?php
                        if (isset($_SESSION['logged_user']['email'])){
                            echo $_SESSION['logged_user']['email'];
                        }?>">
                        <span style='color: red'><strong><?php
                                if (isset($_SESSION['emailErr'])){
                                    echo $_SESSION['emailErr'];
                                    unset($_SESSION['emailErr']);
                                }
                                ?></strong></span>
                    </div>
                    <div class="form-group">
                        <h4>Имя</h4>
                        <input type="text" class="form-control" name="nickname" value="<?php
                        if (isset($_SESSION['logged_user']['nickname'])){
                            echo $_SESSION['logged_user']['nickname'];
                        }?>">
                        <span style='color: red'><strong><?php
                                if (isset($_SESSION['nickErr'])){
                                    echo $_SESSION['nickErr'];
                                    unset($_SESSION['nickErr']);
                                }
                                ?></strong></span>
                        <div class="text-center mt-4" >
                            <button type="submit" data-toggle="modal">
                                Сохранить
                            </button>
                        </div>
                        <span style='color: #0f727b'><strong><?php
                                if (isset($_SESSION['successName'])){
                                    echo $_SESSION['successName'];
                                    unset($_SESSION['successName']);
                                }
                                ?></strong></span>
                    </div>
                </form>
            </div>

            <h2>Вы можете сменить пароль:</h2>
            <div class=" col-lg-6 col-md-2 col-sm-6">
                <form method="post" action="auth/changePass.php">
                    <div class="form-group">
<!--                        <h4>Старый пароль</h4>-->
                        <input type="password" class="form-control" name="password" id="oldPassword" placeholder="Старый пароль">
                        <span style='color: red'><strong><?php
                                if (isset($_SESSION['passErr'])){
                                    echo $_SESSION['passErr'];
                                    unset($_SESSION['passErr']);
                                }
                                ?></strong></span>
                    </div>
                    <div class="form-group">
<!--                        <h4>Новый пароль</h4>-->
                        <input type="password" class="form-control" name="newPass" id="newPassword" placeholder="Новый пароль">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="newPassConfirm" id="newPassword1" placeholder="Повторите новый пароль">
                    </div>
                    <div class="text-center mt-4" >
                        <button type="submit" data-toggle="modal">
                            Сохранить
                        </button>
                    </div>
                    <span style='color: #0f727b'><strong><?php
                            if (isset($_SESSION['passSuccess'])){
                                echo $_SESSION['passSuccess'];
                                unset($_SESSION['passSuccess']);
                            }
                            ?></strong></span>
                </form>
            </div>
        </div>
    </div>
</header>
<?php
require_once "pages/footer.php"
?>
