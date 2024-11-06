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



$params = [
    'admin' => 1,
    'username' => 'Kirill'

];

//tt(selectAll('users',$params));
tt(selectOne('users'));




