<?php
$dbh = null;
session_start();

function getConnection()
{
    global $dbh;
    try {
        if($dbh == null) {
            $dbh = new PDO(
                'mysql:host=localhost; dbname=game2',
                'root',
                '12345678',
                [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        }
        return $dbh;
        print 'hdkj';
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br />";
    }
}

function getUser($email){
    $db = GetConnection();
    $sql_get = 'SELECT * FROM users WHERE email = :email'; //Формирую запрос к БД
    $stmt_get = $db->prepare($sql_get);      //защита от sql-инъекций
    $stmt_get->execute([':email' => $email]); //связываем переменные
    return  $stmt_get->fetch();
}

function getUserByNickName($nick){
    $db = GetConnection();
    $sql_get = 'SELECT * FROM users WHERE nickname = :nickname'; //Формирую запрос к БД
    $stmt_get = $db->prepare($sql_get);      //защита от sql-инъекций
    $stmt_get->execute([':nickname' => $nick]); //связываем переменные
    return  $stmt_get->fetch();
}

function getAllUsers(){
    $db = GetConnection();
    $sql_get = 'SELECT * FROM users';
    $stmt_get = $db->prepare($sql_get);
    $stmt_get->execute();
    return  $stmt_get->fetchAll();
}

function getAllAchiev(){
    $db = GetConnection();
    $sql_get = 'SELECT * FROM achiev';
    $stmt_get = $db->prepare($sql_get);
    $stmt_get->execute();
    return  $stmt_get->fetchAll();
}

function getUserAchiev($id){
    $db = GetConnection();
    $sql_get = "select `name`, `desc` from user_achiev, achiev where(user_id = $id and achiev_id = achiev.id);";
    $stmt_get = $db->prepare($sql_get);
    $stmt_get->execute();
    return  $stmt_get->fetchAll();
}

function addLocation($id, $number){
    $db = GetConnection();
    $query = "update users set location = $number where id= $id";
    $db->exec($query);
}

function getLocation($id){
    $db = GetConnection();
    $sql_get = "SELECT location FROM users where id= $id";
    $stmt_get = $db->prepare($sql_get);
    $stmt_get->execute();
    return  $stmt_get->fetch();
}

function addAchievs($user_id, $achiev_id){
    $db = GetConnection();
    $query = "select exists(SELECT * FROM user_achiev where user_id = $user_id and achiev_id = $achiev_id);";
    $stmt_get = $db->prepare($query );
    $stmt_get->execute();
    $x = $stmt_get->fetch();

    $query = "SELECT name FROM achiev where id = $achiev_id ;";
    $stmt_get = $db->query($query);
    $y = $stmt_get->fetch();
    $text =  $y['name'];
    if (!$x[0]) {
        $sql = "Insert into user_achiev (user_id, achiev_id) values (:user_id, :achiev_id) ";
        $values = [
            'user_id' => $user_id,
            'achiev_id' => $achiev_id
        ];
        $statement = $db->prepare($sql);
        $statement->execute($values);
    }
    return [$x[0], $text];
}

function saveCookie($id, $count){
    $db = GetConnection();
    $query = "update users set cook = $count where id= $id";
    $db->exec($query);
}

function getCookie($id){
    $db = GetConnection();
    $sql_get = "SELECT cook FROM users WHERE id = $id"; //Формирую запрос к БД
    $res = $db->query($sql_get);
    return $res->fetch();
}

function saveCountNumber($id){
    $db = GetConnection();
    $sql_get = "SELECT `show` FROM users WHERE id = $id"; //Формирую запрос к БД
    $res = $db->query($sql_get);
    $arr = $res->fetch();
    $count = $arr['show'] + 1;
    $query = "update users set `show` = $count where id= $id";
    $db->exec($query);
    return $count;
}

function saveCountWord($id){
    $db = GetConnection();
    $sql_get = "SELECT `gal` FROM users WHERE id = $id"; //Формирую запрос к БД
    $res = $db->query($sql_get);
    $arr = $res->fetch();
    $count = $arr['gal'] + 1;
    $query = "update users set `gal` = $count where id= $id";
    $db->exec($query);
    return $count;
}

function saveCountFly($id){
    $db = GetConnection();
    $sql_get = "SELECT `fly` FROM users WHERE id = $id"; //Формирую запрос к БД
    $res = $db->query($sql_get);
    $arr = $res->fetch();
    $count = $arr['fly'] + 1;
    $query = "update users set `fly` = $count where id= $id";
    $db->exec($query);
    return $count;
}


function saveTetrisScore($id, $score){
    $db = GetConnection();
    $query = "update users set `tetris_score` = $score where id= $id";
    $db->exec($query);
 //   return $count;
}