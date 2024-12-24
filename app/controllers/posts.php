<?php

include SITE_ROOT . "/app/database/db.php";
if (!$_SESSION){
    header('location:' . BASE_URL . 'log.php');
}



$errMsg = '';
$id ='';
$title = '';
$content = '';
$img = '';
$topic = '';

$topics = selectAll('topics');
$posts = selectAll('posts');
$postsAdm = selectAllFromPostsWithUsers('posts','users');


//Форма создания опроса
if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['add_post'])){


    if(!empty($_FILES['img']['name']))
    {

        $imgName = time() . "_" . $_FILES['img']['name'];
        $fileTmpName = $_FILES['img']['tmp_name'];
        $fileType = $_FILES['img']['type'];
        $destination = ROOT_PATH . "\assets\image\posts\\" . $imgName;

        if(strpos($fileType, 'image') === false){
            die("Можно загружать только изображения!");
        }

        $result = move_uploaded_file($fileTmpName, $destination);

        if($result){
            $_POST['img'] = $imgName;
        }else{
            $errMsg = "Ошибка загрузки изображения на сервер!";
        }
    }else{
        $errMsg = "Ошибка получения картинки!";
    }

    $title = trim($_POST['title']);
    $content = trim($_POST['content']);
    $topic = trim($_POST['topic']);

    $publish = isset($_POST['publish'])  ? 1 : 0;


    if($title === '' || $content === '' || $topic === ''){
        $errMsg = "Не все поля заполнены!";
    }elseif (mb_strlen($title, 'UTF-8') < 7){
        $errMsg = "Название опроса должно быть более 7-и символов!!!";
    }else{
            $post =  [
                'id_user' => $_SESSION['id'],
                'title' => $title,
                'content' => $content,
                'img' => $_POST['img'],
                'status' => $publish,
                'id_topic' => $topic

            ];

            $post = insert('posts',$post);
            $post = selectOne('posts', ['id' => $id]);
            header('Location: ' . BASE_URL . 'admin/posts/index.php');

        }

} else {

    $title = '';
    $content = '';
}

//// Апдейт категории
//if($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET['id'])){
//    $id = $_GET['id'];
//    $topic = selectOne('topics', ['id' => $id]);
//
//    $id = $topic['id'];
//    $name = $topic['name'];
//    $description = $topic['description'];
//
//}
//
//if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['topic-edit'])){
//
//    $name = trim($_POST['name']);
//    $description = trim($_POST['description']);
//
//
//    if($name === '' || $description === '' ){
//        $errMsg = "Не все поля заполнены!";
//    }elseif (mb_strlen($name, 'UTF-8') < 2){
//        $errMsg = "Категория должна быть более двух символов!!!";
//    }else{
//
//        $topic =  [
//            'name' => $name,
//            'description' => $description
//
//        ];
//
//        $id = $_POST['id'];
//        $topic_id = update('topics',$id,$topic);
//        header('Location: ' . BASE_URL . 'admin/topics/index.php');
//
//    }
//
//
//}
//
//
//
//
////Удаление категории
//if($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET['del_id'])){
//    $id = $_GET['del_id'];
//    delete('topics', $id);
//    header('location: ' . BASE_URL . 'admin/topics/index.php');
//
//}