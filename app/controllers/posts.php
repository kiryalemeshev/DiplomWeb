<?php

include SITE_ROOT . "/app/database/db.php";
if (!$_SESSION){
    header('location:' . BASE_URL . 'log.php');
}



$errMsg = [];
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

    $errMsg = []; // Массив для ошибок

    // 1. Обработка изображения (ВАШ КОД ИЗНАЧАЛЬНО)
    if(!empty($_FILES['img']['name'])) {

        $imgName = time() . "_" . $_FILES['img']['name'];
        $fileTmpName = $_FILES['img']['tmp_name'];
        $fileType = $_FILES['img']['type'];
        $destination = ROOT_PATH . "/assets/image/posts/" . $imgName;  // Исправьте слэши

        if (strpos($fileType, 'image') === false) {
            array_push($errMsg,"Подгружаемый файл не является изображением!");

        } else {
            $result = move_uploaded_file($fileTmpName, $destination);
            if ($result) {
                $_POST['img'] = $imgName;
            } else {
                array_push($errMsg,"Ошибка загрузки изображения на сервер!");
            }
        }


    }else{
        array_push($errMsg,"Ошибка получения картинки!");
    }

    $title = trim($_POST['title']);
    $content = trim($_POST['content']);
    $topic = trim($_POST['topic']);

    $publish = isset($_POST['publish'])  ? 1 : 0;


    if($title === '' || $content === '' || $topic === ''){
        array_push($errMsg, "Не все поля заполнены!");
    }elseif (mb_strlen($title, 'UTF-8') < 7){
        array_push($errMsg,"Название опроса должно быть более 7-и символов!!!");
    }else{

        // 2. Получение данных из формы
        $quest1_label = trim($_POST['quest1_label']);
        $quest1_answer = trim($_POST['quest1_answer']);

        $quest2_label = trim($_POST['quest2_label']); // Получаем quest2_label
        $radio2_1 = trim($_POST['radio2_1']);
        $radio2_2 = trim($_POST['radio2_2']);
        $radio2_3 = trim($_POST['radio2_3']);
        $radio2_4 = trim($_POST['radio2_4']);
        $radio2_5 = trim($_POST['radio2_5']);

        $quest3_label = trim($_POST['quest3_label']); // Получаем quest3_label
        $check3_1 = trim($_POST['check3_1']);
        $check3_2 = trim($_POST['check3_2']);
        $check3_3 = trim($_POST['check3_3']);
        $check3_4 = trim($_POST['check3_4']);
        $check3_5 = trim($_POST['check3_5']);

        // 3. Валидация данных (минимум)
        if ($quest1_label === '' || $quest1_answer === '') {
            array_push($errMsg, "Вопрос и ответ 1 должны быть заполнены!");
        }

        // 4. Подготовка данных для вставки/обновления (зависит от вашей логики)
        if(empty($errMsg)) {

            $post =  [
                'id_user' => $_SESSION['id'],
                'title' => $title,
                'content' => $content,
                'img' => $_POST['img'],
                'status' => $publish,
                'id_topic' => $topic,

                'quest1_label' => $quest1_label,
                'quest1_answer' => $quest1_answer,

                'quest2_label' => $quest2_label,
                'radio2_1' => $radio2_1,
                'radio2_2' => $radio2_2,
                'radio2_3' => $radio2_3,
                'radio2_4' => $radio2_4,
                'radio2_5' => $radio2_5,

                'quest3_label' => $quest3_label,
                'check3_1' => $check3_1,
                'check3_2' => $check3_2,
                'check3_3' => $check3_3,
                'check3_4' => $check3_4,
                'check3_5' => $check3_5
            ];

            $post = insert('posts',$post);
            $post = selectOne('posts', ['id' => $id]);
            header('Location: ' . BASE_URL . 'admin/posts/index.php');

        } else {
            // Если есть ошибки, выводим их или обрабатываем другим способом
            echo "<div class='error'>";
            foreach ($errMsg as $error) {
                echo $error . "<br>";
            }
            echo "</div>";
        }
    }

} else {

    $id = '';
    $title = '';
    $content = '';
    $publish = '';
    $topic = '';
}

//Апдейт опроса
if($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET['id'])){
    $post = selectOne('posts', ['id' => $_GET['id']]);

    $id = $post['id'];
    $title = $post['title'];
    $content = $post['content'];
    $topic = $post['id_topic'];
    $publish = $post['status'];

}

if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['edit_post'])){
    $id = $_POST['id'];

    $title = trim($_POST['title']);
    $content = trim($_POST['content']);
    $topic = trim($_POST['topic']);

    $publish = isset($_POST['publish'])  ? 1 : 0;

    if(!empty($_FILES['img']['name'])) {

        $imgName = time() . "_" . $_FILES['img']['name'];
        $fileTmpName = $_FILES['img']['tmp_name'];
        $fileType = $_FILES['img']['type'];
        $destination = ROOT_PATH . "\assets\image\posts\\" . $imgName;

        if (strpos($fileType, 'image') === false) {
            array_push($errMsg,"Подгружаемый файл не является изображением!");

        } else {
            $result = move_uploaded_file($fileTmpName, $destination);
            if ($result) {
                $_POST['img'] = $imgName;
            } else {
                array_push($errMsg,"Ошибка загрузки изображения на сервер!");
            }
        }


    }else{
        array_push($errMsg,"Ошибка получения картинки!");
    }

    if($title === '' || $content === '' || $topic === ''){
        array_push($errMsg, "Не все поля заполнены!");
    }elseif (mb_strlen($title, 'UTF-8') < 7){
        array_push($errMsg,"Название опроса должно быть более 7-и символов!!!");
    }else{
        $post =  [
            'id_user' => $_SESSION['id'],
            'title' => $title,
            'content' => $content,
            'img' => $_POST['img'],
            'status' => $publish,
            'id_topic' => $topic

        ];

        $post = update('posts',$id, $post);
        header('Location: ' . BASE_URL . 'admin/posts/index.php');

    }

} else {
    $title = '';
    $content = '';
    $publish = isset($_POST['publish'])  ? 1 : 0;
    $topic = '';
}


//Статус опубликовать или снять
if($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET['pub_id'])){
    $id = $_GET['pub_id'];
    $publish = $_GET['publish'];


    $postId = update('posts',$id,['status' => $publish]);

    header('location: ' . BASE_URL . 'admin/posts/index.php');
    exit();
}

//Удаление опроса
if($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET['delete_id'])){
    $id = $_GET['delete_id'];
    delete('posts', $id);
    header('location: ' . BASE_URL . 'admin/posts/index.php');
}