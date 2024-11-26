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
//    $id = insert("vstup_isp",$post);
//
//}


include "app/database/db.php";

$questions = [];

foreach (range(1, 7) as $i) {
    $key = "quest$i";
    $questions[$key] = isset($_POST[$key]) ? trim($_POST[$key]) : '';
}

$post = [
    'question1' => $questions['quest1'],
    'question2' => $questions['quest2'],
    'question3' => $questions['quest3'],
    'question4' => $questions['quest4'],
    'question5' => $questions['quest5'],
    'question6' => $questions['quest6'],
    'question7' => $questions['quest7']
];

$id = insert("vstup_isp", $post);

