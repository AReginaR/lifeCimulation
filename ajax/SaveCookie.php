<?php
include '../db.php';
$count = $_POST["count"];
$id = $_POST["id"];
saveCookie($id, $count);
