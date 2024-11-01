<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Сбор данных</title>

    <style>
        p {
            display: inline-block;
            margin: 0; /* Убираем стандартные отступы у параграфов */
        }
    </style>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


    <link rel="icon" type="image/png" href="assets/icons/icon.png">

    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300..700&display=swap" rel="stylesheet">




</head>
<body>

<header class="container-fluid">
    <div class="container">
        <div class = "row">
            <div class="col-4">
                <h1>
                    <a href="index.html">Интервьюирование</a></h1>
            </div>
            <nav class="col-8">
                <ul>
                    <li><a href="index.html">
                        <img src="assets/icons/home.png" alt="Главная" style="width: 30px; height: 30px;" />
                        Главная
                    </a></li>
                    <li><a href="#">
                        <img src="assets/icons/mobile.png" alt="Контакты приемной комиссии" style="width: 30px; height: 30px;" />
                        Контакты приемной комиссии
                    </a></li>
                    <li><a href="#">
                        <img src="assets/icons/usluga.png" alt="Контакты приемной комиссии" style="width: 30px; height: 30px;" />
                        Услуги
                    </a></li>
                    <li>
                        <a href="#">
                            <img src="assets/icons/user.png" alt="Кабинет" style="width: 30px; height: 30px;" />
                            Кабинет
                        </a>
                        <ul>
                            <li><a href="log.php">Админ панель</a></li>
                            <li><a href="log.php">Выход</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</header>

<!--Блок карусели Start-->
<div class="container">
    <div class="row">
        <h2 class="slider-title">
            Популярные категории
        </h2>
    </div>
    <div id="carouselExampleCaptions" class="carousel slide">

        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="assets/image/image_1.png" class="d-block w-100" alt="..." >
                <div class="carousel-caption d-none d-md-block">
                    <h5><a href="single.php">Перейти</a></h5>

                </div>
            </div>
            <div class="carousel-item">
                <img src="assets/image/image_2.png" class="d-block w-100" alt="..." >
                <div class="carousel-caption d-none d-md-block">
                    <h5><a href="">Перейти</a></h5>

                </div>
            </div>
            <div class="carousel-item">
                <img src="assets/image/image_3.png" class="d-block w-100" alt="..." >
                <div class="carousel-caption d-none d-md-block">
                    <h5><a href="">Перейти</a></h5>

                </div>
            </div>
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
                    <a href="single.php">
                    <img src="assets/image/image_4.png" alt="img-thumbnail">
                    </a>>
                </div>
            <div class="post_text col-12 col-md-8">
                <h3>
                    <a href="single.php">Сдача вступительных испытаний...</a>

                </h3>

                <p><img src="assets/icons/user.png" style="width: 30px; height: 30px;"/> Auhor Kirra </p>
                <p><img src="assets/icons/calendar.png" style="width: 30px; height: 30px;"/> 27.10.2024 </p>
                <p class="preview-text">
                    Мы предлагаем вам пройти небольшой опрос, который поможет нам определить,
                    какие предметы ЕГЭ будут наиболее сдаваемы при поступлении в Вуз.
                </p>

            </div>

            </div>

            <div class="post row">
                <div class="img col-12 col-md-4">
                    <img src="assets/image/image_5.png" alt="img-thumbnail">
                </div>
                <div class="post_text col-12 col-md-8">
                    <h3>
                        <a href="#">Увлечения и внеучебная деятельность</a>

                    </h3>

                    <p><img src="assets/icons/user.png" style="width: 30px; height: 30px;"/> Auhor Kirra </p>
                    <p><img src="assets/icons/calendar.png" style="width: 30px; height: 30px;"/> 27.10.2024 </p>
                    <p class="preview-text">
                        Мы хотим узнать больше о том, чем вы интересуетесь помимо учебы.
                        Ваши увлечения и внеучебная активность помогают нам лучше понимать вашу личность и потенциал.
                    </p>

                </div>

            </div>


        </div>

        <!--sliderbar content-->
        <div class="sidebar col-md-3 col-12">

            <div class="section search">
                <h3>Поиск</h3>
                <form action="/" method="post">
                    <input type="text" name="search-term" class="text-input" placeholder="Введите искомое слово...">
                </form>
            </div>

            <div class="section topics">
                <h3>Категории</h3>
                <ul>
                    <li><a href="#">Опросы</a> </li>
                    <li><a href="#">Мотивация</a> </li>
                    <li><a href="#">Комментарии</a> </li>
                </ul>

            </div>

        </div>

    </div>
</div>

<!--Блок Main end-->


<!--Footer-->
<!-- Содержание страницы -->
<div class="footer-content">
    <!-- Ваше основное содержимое страницы -->
</div>

<!-- Линия-разделитель -->
<hr>

<footer>
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <h3>О нас</h3>
                <p>Брянский государственный университет имени академика И.Г. Петровского.
                    БГУ - вуз для тех, кто верит в себя и стремится к успеху!</p>
            </div>
            <div class="col-sm-4">
                <h3>Полезные ссылки</h3>
                <ul>
                    <li><a href="index.html">Главная</a></li>
                    <li><a href="#">О компании</a></li>
                    <li><a href="#">Контакты</a></li>
                </ul>
            </div>
            <div class="col-sm-4">
                <h3>Свяжитесь с нами</h3>
                <p>Адрес: 241036, г. Брянск, ул. Бежицкая, 14, главный корпус,
                    каб. 111</p>
                <p>Телефон: 8 (4832) 58-90-85</p>
                <p>Email:  priembgu@mail.ru</p>
            </div>
        </div>
        <div class="copyright">
            <p>&copy; 2024 Ваша компания. Все права защищены.</p>
        </div>
    </div>
</footer>
<!--Footer end-->



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>