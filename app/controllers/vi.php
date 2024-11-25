<?php
include "app/database/db.php";

if (isset($_POST['quest1'])) {
    $question1 = $_POST['quest1'];
    $question2 = $_POST['quest2'];
    $question3 = $_POST['quest3'];
    $question4 = $_POST['quest4'];

    $post = [
        'question1' => $question1,
        'question2' => $question2,
        'question3' => $question3,
        'question4' => $question4
    ];

    $id = insert("vstup_isp",$post);

}