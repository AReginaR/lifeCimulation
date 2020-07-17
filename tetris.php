<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tetris</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Press+Start+2P">
    <link rel="stylesheet" href="resources/css/index.css">
</head>
<body>
<div id="root">
    <h1>
        <span style="color: red">T</span><span style="color: orange">E</span><span style="color: yellow">T</span><span style="color: green">R</span><span style="color: cyan">I</span><span style="color: purple">S</span>
    </h1>
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

    function saveTetrisScore(score) {
        let id = "<?php echo $_SESSION['logged_user']['id']?>";
        $.ajax({
            type: "POST",
            url: "ajax/SaveTetrisScore.php",
            data: {id: id, score: score}
        }).done(function (result) {
        })
    }
</script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="resources/js/index.js" type="module"></script>
</body>
</html>