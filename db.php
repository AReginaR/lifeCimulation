<?php
$dbh = null;
session_start();

function GetConnection()
{
    global $dbh;
    try {
        if($dbh == null) {
            $dbh = new PDO(
                'pgsql:host=localhost;dbname=php_game2',
                'postgres',
                '12345678',
                [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        }
        return $dbh;
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br />";
    }
}
