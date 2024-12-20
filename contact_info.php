<?php include("path.php");

include 'app/controllers/topics.php';
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

        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        .post {
            display: flex;
            gap: 30px;
            background-color: #fff;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .img {
            flex-shrink: 0;
            width: 220px;
            height: auto;
            overflow: hidden;
            border-radius: 5px;
        }

        .img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .post_text {
            flex-grow: 1;
        }

        h3 a {
            color: #333;
            text-decoration: none;
            font-size: 25px;
            line-height: 26px;
        }

        h3 a:hover {
            text-decoration: underline;
        }

        .preview-text {
            font-size: 16px;
            line-height: 24px;
            color: #444;
            margin-top: 10px;
        }

        .contact-info {
            margin-top: 20px;
        }

        .contact-info dt {
            font-weight: bold;
            margin-bottom: 5px;
        }

        .contact-info dd {
            margin-left: 20px;
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
        <div class="main-content col-md-9 col-12">
            <h2>Сотрудники приёмной комиссии</h2>


            <div class="post">
                <div class="img">
                    <a href="#">
                        <img src="assets/image/bandurin.jpg" alt="img-thumbnail">
                    </a>
                </div>
                <div class="post_text">
                    <h3>
                        <a href="#">Бандурин Роман Андреевич</a>
                    </h3>
                    <p class="preview-text">
                        Ответственный секретарь приемной комиссии, судебный эксперт по экспертной специальности
                        19.1. Исследование промышленных (непродовольственных) товаров, в том числе с целью определения их стоимости.
                    </p>
                    <dl class="contact-info">
                        <dt>E-mail:</dt>
                        <dd>amberscorp@mail.ru</dd>

                        <dt>Телефон / факс:</dt>
                        <dd>+7 (4832) 58-90-85</dd>

                        <dt>График работы:</dt>
                        <dd>пн-пт, 9.00-18.00, перерыв 13.00-14.00</dd>
                    </dl>
                </div>
            </div>


            <div class="post">
                <div class="img">
                    <a href="#">
                        <img src="assets/image/goncharov.jpg" alt="img-thumbnail">
                    </a>
                </div>
                <div class="post_text">
                    <h3>
                        <a href="#">Гончаров Евгений Владимирович</a>
                    </h3>
                    <p class="preview-text">
                       Начальник отдела профориентационной работы.
                    </p>
                    <dl class="contact-info">
                        <dt>E-mail:</dt>
                        <dd>evgeniy16.goncharov@yandex.ru</dd>

                        <dt>Телефон / факс:</dt>
                        <dd>+7 (4832) 58-90-85</dd>

                        <dt>График работы:</dt>
                        <dd>пн-пт, 9.00-18.00, перерыв 13.00-14.00</dd>
                    </dl>
                </div>
            </div>

            <div class="post">
                <div class="img">
                    <a href="#">
                        <img src="assets/image/chern.jpg" alt="img-thumbnail">
                    </a>
                </div>
                <div class="post_text">
                    <h3>
                        <a href="#">Черномазов Николай Михайлович</a>
                    </h3>
                    <p class="preview-text">
                       Ведущий программист отдела профориентационной работы.
                    </p>
                    <dl class="contact-info">
                        <dt>E-mail:</dt>
                        <dd>junnior.92@mail.ru</dd>

                        <dt>Телефон / факс:</dt>
                        <dd>+7 (4832) 58-90-85</dd>

                        <dt>График работы:</dt>
                        <dd>пн-пт, 9.00-18.00, перерыв 13.00-14.00</dd>
                    </dl>
                </div>
            </div>


            <div class="post">
                <div class="img">
                    <a href="#">
                        <img src="assets/image/matyuhin.jpg" alt="img-thumbnail">
                    </a>
                </div>
                <div class="post_text">
                    <h3>
                        <a href="#">Матюхин Даниил Алексеевич</a>
                    </h3>
                    <p class="preview-text">
                        Оператор по обслуживанию компьютерных устройств и профориентационной работы с абитуриентами.
                    </p>
                    <dl class="contact-info">
                        <dt>E-mail:</dt>
                        <dd>priembgu@mail.ru</dd>

                        <dt>Телефон / факс:</dt>
                        <dd>+7 (4832) 58-90-85</dd>

                        <dt>График работы:</dt>
                        <dd>пн-пт, 9.00-18.00, перерыв 13.00-14.00</dd>
                    </dl>
                </div>
            </div>

            <div class="post">
                <div class="img">
                    <a href="#">
                        <img src="assets/image/lemeshev.jpg" alt="img-thumbnail">
                    </a>
                </div>
                <div class="post_text">
                    <h3>
                        <a href="#">Лемешев Кирилл Александрович</a>
                    </h3>
                    <p class="preview-text">
                        Оператор по обслуживанию компьютерных устройств и профориентационной работы с абитуриентами.
                    </p>
                    <dl class="contact-info">
                        <dt>E-mail:</dt>
                        <dd>priembgu@mail.ru</dd>

                        <dt>Телефон / факс:</dt>
                        <dd>+7 (4832) 58-90-85</dd>

                        <dt>График работы:</dt>
                        <dd>пн-пт, 9.00-18.00, перерыв 13.00-14.00</dd>
                    </dl>
                </div>
            </div>

            </div>
        </div>


<!--Блок Main end -->



<?php //include("app/include/footer.php"); ?>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>