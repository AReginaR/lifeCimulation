<?php
require_once 'db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Симулятор жизни</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="resources/css/game.css">
    <link rel="stylesheet" type="text/css" href="resources/css/jquery.jqpuzzle.css" />
    <link href="https://fonts.googleapis.com/css?family=McLaren" rel="stylesheet">
    <link rel="stylesheet" href="resources/css/tablecss.css">
    <link rel="stylesheet" href="resources/css/gallows.css" type="text/css" />
    <link rel="stylesheet" href="resources/css/map.css">
</head>
<body style="overflow: scroll;">
<ul class="menu-main">
    <li><a href="game.php">Игра</a></li>
    <?php if (isset($_SESSION['logged_user'])) : ?>
        <li><a href="profile.php">Профиль</a></li>
        <li><a href="auth/logout.php" >Выход</a></li>
        <li><a href="#" class="current">Достижения</a></li>
    <?php endif;?>

</ul>
<div class="row">
    <div class="col-lg-7 col-md-7 col-sm-12">

        <table id="table1" style="margin: auto">
            <p style="text-align: center">Список достижений</p>
            <tr>
                <th>Название</th>
                <th>Описание</th>
            </tr>

            <?php $dostijenia = getAllAchiev()?>
            <?php foreach ($dostijenia as $value) :?>
            <tr>
                <td><?php echo $value['name'] ?></td>
                <td><?php echo $value['desc'] ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
    <div class="col-lg-5 col-md-5 col-sm-12 desc">
        <table id="table2">
            <p style="text-align: center">Ваши достижений</p>
            <tr>
                <th>Название</th>
                <th>Описание</th>
            </tr>
            <?php $dostijenia = getUserAchiev($_SESSION['logged_user']['id'])?>
            <?php foreach ($dostijenia as $value) :?>
                <tr>
                    <td><?php echo $value['name'] ?></td>
                    <td><?php echo $value['desc'] ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
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