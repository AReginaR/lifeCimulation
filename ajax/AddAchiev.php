<?php
include '../db.php';
$id_user = $_POST["id"];
$id_achiev = $_POST["id_achiev"];
echo json_encode(addAchievs($id_user, $id_achiev));
