<?php
//include "app/database/db.php";
//
//if (isset($_POST['quest1'])) {
//    $question1 = $_POST['quest1'];
//    $question2 = $_POST['quest2'];
//    $question3 = $_POST['quest3'];
//    $question4 = $_POST['quest4'];
//    $question5 = $_POST['quest5'];
//    $question6 = $_POST['quest6'];
//    $question7 = $_POST['quest7'];
//
//    $post = [
//        'question1' => $question1,
//        'question2' => $question2,
//        'question3' => $question3,
//        'question4' => $question4,
//        'question5' => $question5,
//        'question6' => $question6,
//        'question7' => $question7
//    ];
//
//    $id = insert("vstup_isp",$posts);
//
//}


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

    'Question_7' => $questions['Quest13'],

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

