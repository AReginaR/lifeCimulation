<?php
require 'db.php';
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
    <link href="https://fonts.googleapis.com/css?family=McLaren" rel="stylesheet">
    <link rel="stylesheet" href="resources/css/gallows.css" type="text/css" />
    <script src="resources/js/gallows.js"></script>
</head>
<body>
<div id=""

<div id="container">

    <h1 style="text-align: center">Угадайте слово</h1>

    <div id="unknown word">
    </div>
    <div id="gallows image">
        <img src="resources/images/s0.png"/>
    </div>
    <div id="alphabet"></div>

    <div style="clear:both;"></div>

    <div style="clear:both;"></div>

</div>
<script>
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

    function saveCountWord() {
        let id = "<?php echo $_SESSION['logged_user']['id']?>";
        $.ajax({
            type: "POST",
            url: "ajax/SaveCountWord.php",
            data: {id: id}
        }).done(function (result) {
            if (result == 1){
                addAchiev(14);
            }
            if (result == 5){
                addAchiev(15);
            }
            if (result == 10){
                addAchiev(16);
            }
            if (result == 50){
                addAchiev(17);
            }
        })
    }
</script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
<script src="http://code.jquery.com/jquery-latest.js"></script>
</body>
</html>