<?php


include "app/database/db.php";

$questions = [];

foreach (range(1, 27) as $i) {
    $key = "Quest$i";
    $questions[$key] = isset($_POST[$key]) ? trim($_POST[$key]) : '';
}

$post = [
    'Question_1' => $questions['Quest1'],

    'Question_2' => $questions['Quest2'],

    'Question_3' => $questions['Quest3'],

    'Question_4_1' => $questions['Quest4'],
    'Question_4_2' => $questions['Quest5'],
    'Question_4_3' => $questions['Quest6'],
    'Question_4_4' => $questions['Quest7'],
    'Question_4_5' => $questions['Quest8'],

    'Question_5_1' => $questions['Quest9'],
    'Question_5_2' => $questions['Quest10'],
    'Question_5_3' => $questions['Quest11'],

    'Question_6' => $questions['Quest12'],



    'Question_8_1' => $questions['Quest14'],
    'Question_8_2' => $questions['Quest15'],
    'Question_8_3' => $questions['Quest16'],
    'Question_8_4' => $questions['Quest17'],
    'Question_8_5' => $questions['Quest18'],
    'Question_8_6' => $questions['Quest19'],

    'Question_9_1' => $questions['Quest20'],
    'Question_9_2' => $questions['Quest21'],
    'Question_9_3' => $questions['Quest22'],
    'Question_9_4' => $questions['Quest23'],
    'Question_9_5' => $questions['Quest24'],
    'Question_9_6' => $questions['Quest25'],
    'Question_9_7' => $questions['Quest26'],

    'Question_10' => $questions['Quest27']




];

$id = insert("opendoor", $post);

