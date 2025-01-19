<?php
// контроллер
error_reporting(0);
ini_set('display_errors', 0);
include_once SITE_ROOT . "/app/database/db.php";
$commentsForAdm = selectAll('comments');

$page = $_GET['post'];
$email = '';
$comment = '';
$errMsg = [];
$status = 0;
$comments = [];

//Форма создания вопросов
if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['goComment'])){

    $email = trim($_POST['email']);
    $comment = trim($_POST['comment']);


    if($email === '' || $comment === ''){
        array_push($errMsg, "Не все поля заполнены!");
    }elseif (mb_strlen($comment, 'UTF-8') < 10){
        array_push($errMsg,"Вопрос должен быть длиннее 10-ти символов!");
    }else{
        $user = selectOne('users', ['email' => $email]);
        if ($user['email'] == $email && $user['admin'] == 1){
            $status = 1;}
        $comment =  [
            'status' => $status,
            'page' => $page,
            'email' => $email,
            'comment' => $comment
        ];

        $comment = insert('comments',$comment);
        $comments = selectAll('comments', ['page' => $page, 'status'=> 1 ]);
    }

} else {
    $email = '';
    $comment = '';
    $comments = selectAll('comments', ['page' => $page, 'status'=> 1 ]);
}

////Апдейт опроса
//if($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET['id'])){
//    $post = selectOne('posts', ['id' => $_GET['id']]);
//
//    $id = $post['id'];
//    $title = $post['title'];
//    $content = $post['content'];
//    $topic = $post['id_topic'];
//    $publish = $post['status'];
//
//}
//
//if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['edit_post'])){
//    $id = $_POST['id'];
//
//    $title = trim($_POST['title']);
//    $content = trim($_POST['content']);
//    $topic = trim($_POST['topic']);
//
//    $publish = isset($_POST['publish'])  ? 1 : 0;
//
//    if(!empty($_FILES['img']['name'])) {
//
//        $imgName = time() . "_" . $_FILES['img']['name'];
//        $fileTmpName = $_FILES['img']['tmp_name'];
//        $fileType = $_FILES['img']['type'];
//        $destination = ROOT_PATH . "\assets\image\posts\\" . $imgName;
//
//        if (strpos($fileType, 'image') === false) {
//            array_push($errMsg,"Подгружаемый файл не является изображением!");
//
//        } else {
//            $result = move_uploaded_file($fileTmpName, $destination);
//            if ($result) {
//                $_POST['img'] = $imgName;
//            } else {
//                array_push($errMsg,"Ошибка загрузки изображения на сервер!");
//            }
//        }
//
//
//    }else{
//        array_push($errMsg,"Ошибка получения картинки!");
//    }
//
//    if($title === '' || $content === '' || $topic === ''){
//        array_push($errMsg, "Не все поля заполнены!");
//    }elseif (mb_strlen($title, 'UTF-8') < 7){
//        array_push($errMsg,"Название опроса должно быть более 7-и символов!!!");
//    }else{
//        $post =  [
//            'id_user' => $_SESSION['id'],
//            'title' => $title,
//            'content' => $content,
//            'img' => $_POST['img'],
//            'status' => $publish,
//            'id_topic' => $topic
//
//        ];
//
//        $post = update('posts',$id, $post);
//        header('Location: ' . BASE_URL . 'admin/posts/index.php');
//
//    }
//
//} else {
//    $title = '';
//    $content = '';
//    $publish = isset($_POST['publish'])  ? 1 : 0;
//    $topic = '';
//}
//
//if($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET['pub_id'])){
//    $id = $_GET['pub_id'];
//    $publish = $_GET['publish'];
//
//
//    $postId = update('posts',$id,['status' => $publish]);
//
//    header('location: ' . BASE_URL . 'admin/posts/index.php');
//    exit();
//}
//
////Удаление опроса
//if($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET['delete_id'])){
//    $id = $_GET['delete_id'];
//    delete('posts', $id);
//    header('location: ' . BASE_URL . 'admin/posts/index.php');
//}

//Удаление вопроса
if($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET['delete_id'])){
    $id = $_GET['delete_id'];
    delete('comments', $id);
    header('location: ' . BASE_URL . 'admin/comments/index.php');
}


//Статус опубликовать или снять
if($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET['pub_id'])){
    $id = $_GET['pub_id'];
    $publish = $_GET['publish'];


    $postId = update('comments',$id,['status' => $publish]);

    header('location: ' . BASE_URL . 'admin/comments/index.php');
    exit();
}

//Апдейт вопросов
if($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET['id'])){
    $oneComment = selectOne('comments', ['id' => $_GET['id']]);

    $id = $oneComment['id'];
    $email = $oneComment['email'];
    $text1 = $oneComment['comment'];
    $pub= $oneComment['status'];

}

if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['edit_comment'])){

    $id = $_POST['id'];
    $text = trim($_POST['content']);
    $publish = isset($_POST['publish'])  ? 1 : 0;


    if($text === '' ){
        array_push($errMsg, "Вопрос не имеет содержимого текста!");
    }elseif (mb_strlen($text, 'UTF-8') < 20){
        array_push($errMsg,"Количество символом внутри вопроса меньше 20");
    }else{
        $com =  [
            'comment' => $text,
            'status' => $publish
        ];

        $comment = update('comments',$id, $com);
        header('Location: ' . BASE_URL . 'admin/comments/index.php');

    }

} else {


    $publish = isset($_POST['publish'])  ? 1 : 0;
}