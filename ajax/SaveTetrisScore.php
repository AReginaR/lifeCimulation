<?php
include '../db.php';
$id = $_POST["id"];
$score = $_POST['score'];
saveTetrisScore($id, $score);