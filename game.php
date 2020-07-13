<?php
require_once 'db.php';
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Симулятор жизни</title>
        <link rel="stylesheet" href="resources/css/map.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="resources/css/game.css">
        <link rel="stylesheet" type="text/css" href="resources/css/jquery.jqpuzzle.css" />
    </head>
<body>
    <ul class="menu-main">
        <li><a href="profile.php">Профиль</a></li>
        <li><a href="map.php" class="current">Игра</a></li>
<!--        --><?php //if ($_SESSION['logged_user']['role'] == "ADMIN") : ?>
            <li><a href="admin.php">Админ</a></li>
<!--        --><?php //endif; ?>
        <li><a href="#" >Регистрация</a></li>
        <li><a href="#" >Вход</a></li>
        <li><a href="#" >Выход</a></li>

    </ul>

   <div id = 'section'>  <!--здесь должна быть игра-->
    <img src="resources/images/start.png">
        <button id="start" class="btn" onclick="start()"><h3><b>ИГРАТЬ</b></h3></button>
    </div>

    <div id="puzzle" >
        <img src="resources/images/kometa.png" class="jqPuzzle jqp-r4-c4-SN" />
        <button id="puzz" style="display: none" class="btn2">Далее</button>
    </div>

    <script type="text/javascript" src="resources/js/jquery.js"></script>
    <script type="text/javascript" src="resources/js/jquery.jqpuzzle.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="resources/js/script.js"></script>
</body>
</html>
<?php