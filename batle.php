<?php
require "db.php"
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,maximum-scale=1">
    <title>Морской бой</title>
    <meta name="description" content="Battleboat.js: A JavaScript AI that beats humans at battleship.">
    <meta name="keywords" content="Battleboat.js, battleship, AI, robot, JavaScript">
    <meta name="google" content="notranslate">
    <link rel="image_src" href="resources/images/apple-touch-icon-144x144-precomposed.png" />
    <link rel="apple-touch-icon" href="resources/images/apple-touch-icon.png" />
    <link rel="apple-touch-icon-precomposed" href="resources/images/apple-touch-icon-precomposed.png" />
    <link rel="apple-touch-icon-precomposed" sizes="57x57" href="resources/images/apple-touch-icon-57x57-precomposed.png" />
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="resources/images/apple-touch-icon-72x72-precomposed.png" />
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="resources/images/apple-touch-icon-114x114-precomposed.png" />
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="resources/images/apple-touch-icon-144x144-precomposed.png" />

    <link rel="author" href="https://plus.google.com/+BillMei" />
    <link rel="publisher" href="https://plus.google.com/+BillMei" />

    <link href="resources/css/batl.css"  rel="stylesheet" media="all"/>
</head>
<body>
<div class="container">
    <div class="game-container">
        <div id="restart-sidebar" class="hidden">
            <h2>Попробуйте ещё раз</h2>
            <button id="restart-game">Начать игру заново</button>
        </div><div id="roster-sidebar">
            <h2>Расставьте корабли</h2>
            <ul class="fleet-roster">
                <li id="patrolboat">Patrol Boat</li>
                <li id="submarine">Submarine</li>
                <li id="destroyer">Destroyer</li>
                <li id="battleship">Battleship</li>
                <li id="carrier">Aircraft Carrier</li>
            </ul>
            <button id="rotate-button" data-direction="0">Повернуть корабль</button>
            <button id="start-game" class="hidden">Начать игру</button>
            <button id="place-randomly" class="hidden">Расположить случайно</button>
        </div><div id="stats-sidebar">
            <h2>Статус</h2>
            <p><strong>Количество выигранных игр</strong></p>
            <p id="stats-wins">0 из 0</p>
            <button id="reset-stats">Сбросить статус</button>
        </div><div class="grid-container">
            <h2>Ваше поле</h2>
            <div class="grid human-player"><span class="no-js">Please enable JavaScript to play this game</span></div>
        </div><div class="grid-container">
            <h2>Поле противника</h2>
            <div class="grid computer-player"><span class="no-js">Please enable JavaScript to play this game</span></div>
        </div>
    </div>
</div>
<script>
    var DEBUG_MODE = localStorage.getItem('DEBUG_MODE') === 'true';
    if (!DEBUG_MODE) {
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
        ga('create', 'UA-10730961-10', 'auto');
        ga('send', 'pageview');
    }
</script>
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

</script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="resources/js/battleboat.js"></script>
<span class="prefetch" id="prefetch1"></span>
<span class="prefetch" id="prefetch2"></span>
<span class="prefetch" id="prefetch3"></span>
</body>
</html>

