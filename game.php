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
        <link rel="stylesheet" href="resources/css/gallows.css">
        <link href="https://fonts.googleapis.com/css?family=McLaren" rel="stylesheet">
    </head>
    <body>
    <ul class="menu-main">
        <li><a href="game.php" class="current">Игра</a></li>
        <?php  if (!isset($_SESSION['logged_user'])) : ?>
            <li><a href="signUp.php" >Регистрация</a></li>
            <li><a href="login.php" >Вход</a></li>
        <?php endif; ?>
        <?php if (isset($_SESSION['logged_user'])) : ?>
            <li><a href="auth/logout.php" >Выход</a></li>
            <li><a href="profile.php">Профиль</a></li>
            <li><a href="aciev.php">Достижения</a></li>
        <?php endif;?>
    </ul>

    <?php if (isset($_SESSION['logged_user'])) : ?>
        <?php $id = $_SESSION['logged_user']['id']; ?>

        <div id = 'section'>  <!--здесь должна быть игра-->

            <img src="resources/images/start.png">
            <button id="start" class="btn" onclick="start(<?php echo getLocation($id)[0]; ?>)"><h3><b>ИГРАТЬ</b></h3></button>
        </div>

        <!--    <div id="puzzle" >-->
        <!--        <img src="resources/images/kometa.png" class="jqPuzzle jqp-r4-c4-SN" />-->
        <!--        <button id="puzz" style="display: none" class="btn2">Далее</button>-->
        <!--    </div>-->
    <?php else:?>
        <span>Для начала войдите в аккаунт или зарегистрируйтесь</span>
        <a href="login.php" >Вход</a>
        <a href="signUp.php" >Регистрация</a>
    <?php endif; ?>

    <script>
        function saveLocation(num) {
            let id = "<?php echo $_SESSION['logged_user']['id']?>";
            $.ajax({
                type: "POST",
                url: "ajax/AddLocation.php",
                data: {id: id, location: num}
            }).done(function (result) {
            })
        }

        function addAchiev(achiev) {
            let id = "<?php echo $_SESSION['logged_user']['id']?>";
            $.ajax({
                type: "POST",
                url: "ajax/AddAchiev.php",
                data: {id: id, id_achiev: achiev}
            }).done(function (result) {
                let data = jQuery.parseJSON(result);
                let text = 'Полученно достижение: ' + data[1];
                if(data[0] == 0){
                    alert(text);
                }
            })
        }
        function saveCookie(count) {
            let id = "<?php echo $_SESSION['logged_user']['id']?>";
            $.ajax({
                type: "POST",
                url: "ajax/SaveCookie.php",
                data: {id: id, count: count}
            }).done(function (result) {
            })
        }
        function getCookie() {
            let id = "<?php echo $_SESSION['logged_user']['id']?>";
            $.ajax({
                type: "POST",
                url: "ajax/GetCookie.php",
                data: {id: id}
            }).done(function (result) {
                let data = jQuery.parseJSON(result);
             //   cookie_count = data[0];
                model.cookie[0].clickCount = data[0]
            })
        }
        function saveCountNumber() {
            let id = "<?php echo $_SESSION['logged_user']['id']?>";
            $.ajax({
                type: "POST",
                url: "ajax/SaveCountNumber.php",
                data: {id: id}
            }).done(function (result) {
                alert(result);
                if (result == 1){
                    addAchiev(id, 10);
                }
                if (result == 5){
                    addAchiev(id, 11);
                }
                if (result == 10){
                    addAchiev(id, 12);
                }
                if (result == 50){
                    addAchiev(id, 13);
                }
            })
        }
    </script>
<!--        <script type="text/javascript" src="resources/js/jquery.js"></script>-->
<!--        <script type="text/javascript" src="resources/js/jquery.jqpuzzle.js"></script>-->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="resources/js/script.js"></script>
    </body>
    </html>
<?php