<?php

session_start();

require ('connect.php');

function tt($value){
    echo '<pre>';
    print_r($value);
    echo '</pre>';
    exit();
}

//Проверка выполнения запроса к БД
function dbCheckError($query)
{
    $errInfo = $query->errorInfo();

    if ($errInfo[0] != PDO::ERR_NONE) {
        echo $errInfo[2];
        exit();
    }
    return true;
}

//Запрос на получение данных с одной таблицы
function  selectAll($table,$params=[])
{
    global $pdo;
    $sql = "Select * from $table";
    if(!empty($params)){
        $i=0;
        foreach($params as $key=>$value){
            if(!is_numeric($value)){
                $value = "'".$value."'";
            }
            if ($i === 0) {
                $sql = $sql . " where $key=$value";

            }else
            {
                $sql = $sql . " and $key=$value";

            }
            $i++;
        }

    }

//    tt($sql);
//    exit();

    $query = $pdo->prepare($sql);
    $query->execute();

    dbCheckError($query);


    return $query -> fetchAll();
}


//Запрос на получение данных с одной строки выбранной таблицы
function  selectOne($table,$params=[])
{
    global $pdo;
    $sql = "Select * from $table";
    if(!empty($params)){
        $i=0;
        foreach($params as $key=>$value){
            if(!is_numeric($value)){
                $value = "'".$value."'";
            }
            if ($i === 0) {
                $sql = $sql . " where $key=$value";
            }else
            {
                $sql = $sql . " and $key=$value";
            }
            $i++;
        }
    }
    $sql = $sql . " limit 1";
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query -> fetch();
}


//Запись в таблицу БД
function insert($table,$params){
    global $pdo;
    //INSERT INTO `users` (admin, username, email, password) VALUES ( '1', 'Ivan', 'ivan4@yandex.ru', 'ivan4');

    $i = 0;
    $coll = '';
    $mask = '';
    foreach ($params as $key=>$value){
        if ($i===0){
            $coll = $coll . "$key";
            $mask = $mask . "'" ."$value" ."'";
        }else{
            $coll = $coll . ", $key";
            $mask = $mask . ", '" . "$value" . "'";
        }
        $i++;
    }

    $sql = "INSERT INTO $table ($coll) VALUES ($mask)";

    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $pdo->lastInsertId();

}

//Обновление строки в БД
function update($table, $id, $params){
    global $pdo;
    //INSERT INTO `users` (admin, username, email, password) VALUES ( '1', 'Ivan', 'ivan4@yandex.ru', 'ivan4');

    $i = 0;
    $str = '';

    foreach ($params as $key=>$value){
        if ($i===0){
            $str = $str . $key . " = '" . $value ."'";
        }else{

            $str = $str . ", " . $key . " = '" . $value . "'";
        }
        $i++;
    }

    $sql = "UPDATE $table SET $str where id = $id";


    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);

}


//Удаление строки в БД
function delete($table, $id){
    global $pdo;
    //INSERT INTO `users` (admin, username, email, password) VALUES ( '1', 'Ivan', 'ivan4@yandex.ru', 'ivan4');


    $sql = "DELETE FROM $table WHERE id =". $id;

    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);

}

// Выборка записей (опросы)с автором в админку

    function selectAllFromPostsWithUsers($table1, $table2)
    {
        global $pdo;
        $sql = "Select
        
        t1.id,
        t1.title,
        t1.img,
        t1.content,
        t1.status,
        t1.id_topic,
        t1.created_date,
        t2.username
         from $table1 as t1 join $table2 as t2 on t1.id_user = t2.id";
        $query = $pdo->prepare($sql);
        $query->execute();
        dbCheckError($query);
        return $query -> fetchAll();
    }


// Выборка записей (опросы) с автором на главную

function selectAllFromPostsWithUsersOnIndex($table1, $table2)
{
    global $pdo;
    $sql = "Select p.*, u.username from $table1 as p join $table2 as u on p.id_user = u.id where p.status = 1";
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query -> fetchAll();
}

// Выборка записей (опросы) с автором на главную

function selectTopTopicFromPostsOnIndex($table1)
{
    global $pdo;
    $sql = "Select * from $table1 where id_topic = 20";
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query -> fetchAll();
}