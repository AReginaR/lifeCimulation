<?php
require_once '../db.php';

if (isset($_POST['delete'])) {
    $db = GetConnection();
    $sql = "DELETE FROM user_achiev Where user_id = :id";
    $stmt = $db->prepare($sql);
    $stmt->execute([':id' => $_POST['delete']]);
    $sql = 'DELETE FROM users WHERE id = :id';
    $stmt = $db->prepare($sql);
    $stmt->execute([':id' => $_POST['delete']]);

    header('location: http://localhost:63342/LifeSimulation/admin.php');
}