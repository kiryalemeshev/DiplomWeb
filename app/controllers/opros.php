<?php


include "app/database/db.php";

$questions = [];

foreach (range(1, 12) as $i) {
    $key = "Quest$i";
    $questions[$key] = isset($_POST[$key]) ? trim($_POST[$key]) : '';
}

$opros = [
    'Question_1' => $questions['Quest1'],

    'Question_2' => $questions['Quest2'],

    'Question_3' => $questions['Quest3'],

    'Question_4' => $questions['Quest4'],
    'Question_5' => $questions['Quest5'],
    'Question_6' => $questions['Quest6'],
    'Question_7' => $questions['Quest7'],
    'Question_8' => $questions['Quest8'],

    'Question_9' => $questions['Quest9'],
    'Question_10' => $questions['Quest10'],
    'Question_11' => $questions['Quest11'],

    'Question_12' => $questions['Quest12']



];

$id = insert("opros", $opros);

