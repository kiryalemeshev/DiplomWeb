<?php include("path.php");

include 'app/controllers/topics.php';
$posts = selectAllFromPostsWithUsersOnIndex('posts', 'users');
$topTopic = selectTopTopicFromPostsOnIndex('posts');


// Проверяем авторизацию
if (!isset($_SESSION['login'])) {
    // Пользователь не авторизован. Выводим сообщение и ссылку
    echo '<!DOCTYPE html>';
    echo '<html lang="en">';
    echo '<head>';
    echo '    <meta charset="UTF-8">';
    echo '    <meta name="viewport" content="width=device-width, initial-scale=1.0">';
    echo '    <title>Не авторизован</title>';
    echo '    <style>';
    echo '        body {';
    echo '            background-image: url("' . BASE_URL . 'assets/image/bg.jpg");';
    echo '            background-size: cover;';
    echo '            background-position: center;';
    echo '            background-repeat: no-repeat;';
    echo '            margin: 0;';
    echo '            height: 100vh;';
    echo '            display: flex;';
    echo '            flex-direction: column; /* Вертикальное расположение */';
    echo '            /* Убираем align-items: center; */';
    echo '            font-family: sans-serif;';
    echo '            color: #fff;';
    echo '            overflow: hidden;';
    echo '            padding-top: 40px; /* Отступ сверху для заголовка */';
    echo '        }';
    echo '        h2 {';
    echo '            font-size: 3em;';
    echo '            margin-bottom: 5px; /* Уменьшенный отступ под заголовком */';
    echo '            color: red;';
    echo '            font-weight: bold;';
    echo '            text-align: center;';
    echo '            margin-top: 0; /* Убирает отступ сверху  */';
    echo '        }';
    echo '        p {';
    echo '            font-size: 1.8em;';
    echo '            margin-top: 0; /* Убирает отступ сверху */';
    echo '            line-height: 1.5;';
    echo '            text-align: center;';
    echo '            color: #f0f0f0;';
    echo '        }';

    echo '        a {';
    echo '            color: #002137;';
    echo '            text-decoration: none;';
    echo '            font-weight: bold;';
    echo '        }';
    echo '        a:hover {';
    echo '            text-decoration: underline;';
    echo '        }';
    echo '    </style>';
    echo '</head>';
    echo '<body>';
    echo '    <h2>Вы не авторизованы!</h2>';
    echo '    <p>Пожалуйста, <a href="' . BASE_URL . 'log.php">войдите</a> или <a href="' . BASE_URL . 'reg.php">зарегистрируйтесь</a>.</p>';
    echo '</body>';
    echo '</html>';

    exit(); // Важно: завершаем выполнение скрипта, чтобы не показывать остальной контент
} else {
    // Пользователь авторизован. Продолжаем показ контента
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Главная страница</title>
    </head>
    <body>

    </body>
    </html>
    <?php
}

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

<!--Блок карусели Start-->
<div class="container" >
    <div class="row">
        <h2 class="slider-title">
            Популярные категории
        </h2>
    </div>

    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">

        <div class="carousel-inner" >
            <div class="carousel-item">
                <img src="assets/image/open.png" class="d-block w-100" alt="..." >
                <div class="carousel-caption d-none d-md-block">
                    <h5><a href="DaysDoor.php">Перейти</a></h5>
                </div>
            </div>

            <div class="carousel-item">
                <img src="assets/image/image_1.png" class="d-block w-100" alt="..." >
                <div class="carousel-caption d-none d-md-block">
                    <h5><a href="single.php">Перейти</a></h5>
                </div>
            </div>

            <?php foreach ($topTopic as $key => $post) : ?>
            <?php if($key == 0):?>
            <div class="carousel-item active">
                <?php else:?>
                <div class="carousel-item">
                    <?php endif;?>
                    <img src="<?=BASE_URL . 'assets/image/posts/' . $post['img'] ?>" alt="<?=$post['title']?>"  class="d-block w-100"  >
                    <div class="carousel-caption d-none d-md-block">
                        <h5><a href="<?=BASE_URL . 'singleTEST.php?post=' . $post['id']; ?>">
                                <?=mb_strimwidth($post['title'], 0, 100, '...') ?>
                            </a></h5>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!--Блок карусели End-->


<!--Блок Main-->

<div class="container">
    <div class="content-row">
        <!--main content-->
        <div class="main-content col-md-9 col-12">
            <h2>Последние опросы</h2>



            <div class="post row">
                <div class="img col-12 col-md-4">
                    <a href="DaysDoor.php">
                        <img src="assets/image/openDoor.jpg" alt="img-thumbnail" style="width: 300px; height: 170px;" >
                    </a>
                </div>
                <div class="post_text col-12 col-md-8">
                    <h3>
                        <a href="DaysDoor.php">День открытых дверей...</a>

                    </h3>

                    <p><img src="assets/icons/user.png" style="width: 30px; height: 30px;"/> Author Приёмная комиссия </p>
                    <p><img src="assets/icons/calendar.png" style="width: 30px; height: 30px;"/> 17.11.2024 </p>
                    <p class="preview-text">
                        Мы хотим узнать вас поближе и надеемся, что День открытых дверей станет отличным началом нашего общения.
                        Мы готовы поделиться с вами всеми секретами Нашего успеха.
                    </p>

                </div>
            </div>

            <div class="post row">
                <div class="img col-12 col-md-4">
                    <a href="single.php">
                    <img src="assets/image/image_4.png" alt="img-thumbnail">
                    </a>
                </div>
            <div class="post_text col-12 col-md-8">
                <h3>
                    <a href="single.php">Сдача вступительных испытаний...</a>

                </h3>

                <p><img src="assets/icons/user.png" style="width: 30px; height: 30px;"/> Author Kirra </p>
                <p><img src="assets/icons/calendar.png" style="width: 30px; height: 30px;"/> 27.10.2024 </p>
                <p class="preview-text">
                    Мы предлагаем вам пройти небольшой опрос, который поможет нам определить,
                    какие предметы ЕГЭ будут наиболее сдаваемы при поступлении в Вуз.
                </p>

            </div>

            </div>

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

        <!--sliderbar content-->
        <div class="sidebar col-md-3 col-12">

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
                    <li><a href="#"><?=$topic['name'];?></a> </li>
                    <?php endforeach; ?>
                </ul>

            </div>

        </div>

    </div>
</div>

<!--Блок Main end-->



<?php include("app/include/footer.php"); ?>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>