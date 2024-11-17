<?php

require ('connect.php');

function tt($value){
    echo '<pre>';
    print_r($value);
    echo '</pre>';
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

}

$arrData = [
    'admin' => '1',
    'username' => 'Kirra',
    'email' => 'KirraRra@yandex.ru',
    'password' => '28042003',
    'created' => '2021-01-01 00:00:01'
];

insert('users',$arrData);

