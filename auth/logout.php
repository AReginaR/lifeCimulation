<?php
require_once '../db.php'; // подключаем файл для соединения с БД
//f кукам!
setcookie('email', '', time() - 3600);
setcookie('nickname', '', time() - 3600);
setcookie('id', '', time() - 3600);
setcookie('role', '', time() - 3600);
// Производим выход пользователя
unset($_SESSION['logged_user']);

// Редирект на главную страницу
header('Location: http://localhost:63342/LifeSimulation/game.php');
?>
