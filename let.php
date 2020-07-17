<?php
require 'db.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Warfare</title>
	<link rel="stylesheet" type="text/css" href="resources/css/let.css">
</head>
<body>
	<div id="lifes">
		<span></span>
		<span></span>
		<span></span>
	</div>
	<div id="player" class="skin_2"></div>


<script type="text/javascript" src="resources/js/let.js"></script>
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

        function saveCountFly() {
            let id = "<?php echo $_SESSION['logged_user']['id']?>";
            $.ajax({
                type: "POST",
                url: "ajax/SaveCountFly.php",
                data: {id: id}
            }).done(function (result) {
                if (result == 1){
                    addAchiev(31);
                }
                if (result == 10){
                    addAchiev(32);
                }
                if (result == 50){
                    addAchiev(33);
                }
                if (result == 100){
                    addAchiev(34);
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