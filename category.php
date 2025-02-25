<?php include("path.php");

include 'app/controllers/topics.php';

$posts = selectAll('posts', ['id_topic' => $_GET['id']]);
$topTopic = selectTopTopicFromPostsOnIndex('posts');
$category = selectOne('topics', ['id' => $_GET['id']]);


?>



<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Анкетирование</title>

    <style>
        p {
            display: inline-block;
            margin: 0; /* Убираем стандартные отступы у параграфов */

        }

        .container {
            width: 100%;
        }

        .content-row {
            display: flex;
            width: 100%;
        }

        .main-content {
            flex: 1;
            padding-right: 20px;
        }

        .sidebar-area {
            width: 25%;
            padding-left: 20px;
            margin-left: auto;
            margin-top: 0;
            font-family: sans-serif; /* Устанавливаем общий шрифт */
        }

        /* Стили для секций поиска и категорий */
        .sidebar-area .section {
            background-color: #f8f9fa; /* Светло-серый фон для секции */
            border-radius: 8px; /* Закругленные углы */
            margin-bottom: 20px; /* Отступ между секциями */
            padding: 15px; /* Внутренние отступы */
            box-shadow: 0 2px 4px rgba(0,0,0,0.1); /* Небольшая тень */
        }

        /* Стили для заголовков секций */
        .sidebar-area .section h3 {
            font-size: 1.2em; /* Размер заголовка */
            margin-top: 0; /* Убираем верхний отступ заголовка */
            margin-bottom: 10px; /* Отступ под заголовком */
            color: #495057; /* Тёмно-серый цвет заголовка */
            border-bottom: 1px solid #dee2e6; /* Подчеркивание заголовка */
            padding-bottom: 5px;
        }

        /* Стили для текстового поля ввода */
        .sidebar-area .section .text-input {
            width: calc(100% - 10px); /* Занимает всю ширину с отступами */
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ced4da;
            border-radius: 4px;
        }

        /* Стили для ссылок в списке категорий */
        .sidebar-area .section ul {
            padding-left: 0; /* Убираем отступы слева */
            list-style: none; /* Убираем маркеры списка */
        }

        .sidebar-area .section ul li {
            margin-bottom: 8px;
        }

        .sidebar-area .section ul li a {
            color: #007bff; /* Синий цвет ссылок */
            text-decoration: none; /* Убираем подчеркивание */
            transition: color 0.3s ease; /* Плавное изменение цвета при наведении */
        }
        .sidebar-area .section ul li a:hover{
            color: #0056b3; /* Более темный синий цвет при наведении */
            text-decoration: underline; /* Подчеркивание при наведении */
        }
    </style>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


    <link rel="icon" type="image/png" href="assets/icons/logo_main.png">

    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300..700&display=swap" rel="stylesheet">



</head>
<body>


<?php include("app/include/header.php"); ?>





<div class="container">
    <div class="content-row">
        <!--main content-->
        <div class="main-content col-md-9 col-12">
            <h2>Опросы с раздела <strong><?=$category['name'];?></strong></h2>


            <?php foreach ($posts as $post) : ?>
                <div class="post row">
                    <div class="img col-12 col-md-4">
                        <img src="<?=BASE_URL . 'assets/image/posts/' . $post['img'] ?>" alt="<?=$post['title']?>" class="img-thumbnail"  style="width: 300px; height: 170px;">
                    </div>
                    <div class="post_text col-12 col-md-8">
                        <h3>
                            <a href="<?=BASE_URL . 'singleTEST.php?post=' . $post['id']; ?>">
                                <?=mb_strimwidth($post['title'], 0, 100, '...') ?>
                            </a>
                        </h3>

                        <p><img src="assets/icons/user.png" style="width: 30px; height: 30px;"/>
                            <?php
                            if (isset($post['username'])) {
                                echo $post['username'];
                            } else {
                                echo 'PriemBgu'; // Можно вывести другое значение по умолчанию
                            }
                            ?>
                        </p>
                        <p><img src="assets/icons/calendar.png" style="width: 30px; height: 30px;"/> <?=$post['created_date'];?></p>
                        <p class="preview-text">
                            <?= mb_strimwidth($post['content'], 0, 150, '...' , 'UTF-8') ?>

                        </p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- sliderbar content -->
        <div class="sidebar-area">
            <div class="section search">
                <h3>Поиск</h3>
                <form action="search.php" method="post">
                    <input type="text" name="search-term" class="text-input" placeholder="Введите искомое слово...">
                </form>
            </div>

            <div class="section topics">
                <h3>Категории</h3>
                <ul>
                    <?php foreach ($topics as $key => $topic): ?>
                        <li><a href="<?= BASE_URL . 'category.php?id=' . $topic['id'];?>"><?=$topic['name'];?></a> </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
</div>



<?php include("app/include/footer.php"); ?>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>