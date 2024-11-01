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
          <a href="index.php">Интервьюирование</a></h1>
      </div>
      <nav class="col-8">
        <ul>
          <li><a href="index.php">
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
              <li><a href="#">Админ панель</a></li>
              <li><a href="#">Выход</a></li>
            </ul>
          </li>
        </ul>
      </nav>
    </div>
  </div>
</header>


<!--END HEADER-->


<!-- FORM -->
<div class="container reg_form">
  <form class="row justify-content-center" method="post" action="log.html">
    <h2 class="col-12">Авторизация</h2>
    <div class="mb-3 col-12 col-md-4">
      <label for="formGroupExampleInput" class="form-label">Ваш логин</label>
      <input type="text" class="form-control" id="formGroupExampleInput" placeholder="введите ваш логин...">
    </div>

    <div class="w-100"></div>
    <div class="mb-3 col-12 col-md-4">
      <label for="exampleInputPassword1" class="form-label">Пароль</label>
      <input type="password" class="form-control" id="exampleInputPassword1">
    </div>
    <div class="w-100"></div>
    <div class="mb-3 col-12 col-md-4">
      <button type="button" class="btn btn-danger">Войти</button>
      <a href="reg.php">Регистрация</a>
    </div>
  </form>
</div>
<!-- END FORM-->




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
          <li><a href="index.php">Главная</a></li>
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