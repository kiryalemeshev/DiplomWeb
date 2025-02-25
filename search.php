<?php include("path.php");
include SITE_ROOT . "/app/database/db.php";
if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['search-term'])){
    $posts = searchInTitleAndContent($_POST['search-term'], 'posts' , 'users');
}

?>



<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Анкетирование</title>

    <style>
        p {
            display: inline-block;
            margin: 0; /* Убираем стандартные отступы у параграфов */

        }
        .main-content {
            padding: 20px; /* Добавляем отступы для визуального разделения */
        }

        .post.row {
            margin-bottom: 20px; /* Добавляем отступ снизу между постами */
            display: flex; /* Включаем flexbox для выравнивания*/
        }

        .post .img {
            display: flex; /* Flexbox для элемента img, для выравнивания внутри */
            align-items: center; /* Выравниваем по вертикали*/
            justify-content: center; /* центрируем по горизонтали */
        }



        .post .post_text {
            padding-left: 15px; /* добавляем отступ слева для текста */
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


<!--Блок Main-->

<div class="container">
    <div class="content-row">
        <!--main content-->
        <div class="main-content  col-12">
            <h2>Результаты поиска</h2>


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

                        <p><img src="assets/icons/user.png" style="width: 30px; height: 30px;"/> <?=$post['username'];?></p>
                        <p><img src="assets/icons/calendar.png" style="width: 30px; height: 30px;"/> <?=$post['created_date'];?></p>
                        <p class="preview-text">
                            <?= mb_strimwidth($post['content'], 0, 150, '...' , 'UTF-8') ?>

                        </p>
                    </div>
                </div>
            <?php endforeach; ?>


        </div>


<!--Блок Main end-->



<?php include("app/include/footer.php"); ?>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>