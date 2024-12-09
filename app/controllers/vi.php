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
//    $posts = [
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

foreach (range(1, 17) as $i) {
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
    'question7' => $questions['quest7'],
    'question8' => $questions['quest8'],
    'question9' => $questions['quest9'],
    'question10' => $questions['quest10'],
    'question11' => $questions['quest11'],
    'question12' => $questions['quest12'],
    'question13' => $questions['quest13'],
    'question14' => $questions['quest14'],
    'question15' => $questions['quest15'],
    'question16' => $questions['quest16'],
    'question17' => $questions['quest17']
];

$id = insert("vstup_isp", $post);

