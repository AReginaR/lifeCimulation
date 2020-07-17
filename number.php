<?php
require 'db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/numbers.css">
</head>
<body>
<table>
    <td><h1>Угадайте число за 5 попыток</h1></td>
    <td><img style="height: 50px" src="resources/images/kisspng-world-emoji-day-apple-smiley-5ae5273cb3fda3.6852536715249672287373.png"></td>
</table>
<div align="center">
    <table border="0" width="500" cellspacing="2" cellpadding="2">
        <tr>
            <td class="copy2" valign="top">
                <br><br><br>
                <form name = game>
                    <input type=text name=number size=8>
                    <input type=button value=" Попытаться " onclick="guess()">
                    <P>
                        <input type=button value= " Новая игра " onclick="random()">
                        <input type=button value = " !!!Подсказка!!! " onclick="clue()">
                </form>
                <br><br><br>
            </td>
        </tr>
    </table>
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

    function saveCountNumber() {
        let id = "<?php echo $_SESSION['logged_user']['id']?>";
        $.ajax({
            type: "POST",
            url: "ajax/SaveCountNumber.php",
            data: {id: id}
        }).done(function (result) {
            if (result == 1){
                addAchiev(10);
            }
            if (result == 5){
                addAchiev(11);
            }
            if (result == 10){
                addAchiev(12);
            }
            if (result == 50){
                addAchiev(13);
            }
        })
    }
</script>
<script src="resources/js/numbers.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
<script src="http://code.jquery.com/jquery-latest.js"></script>
</body>
</html>