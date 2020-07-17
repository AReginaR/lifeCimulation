<?php
include '../db.php';
//getConnection();
$number = $_POST["location"];
$id = $_POST["id"];
addLocation($id, $number);