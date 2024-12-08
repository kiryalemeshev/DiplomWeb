<?php include("path.php");
include "app/controllers/users.php";

?>

<!doctype html>
<html lang="ru">
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


  <link rel="icon" type="image/png" href="assets/icons/logo_main.png">

  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300..700&display=swap" rel="stylesheet">




</head>
<body>

<?php include("app/include/header.php"); ?>


<!--END HEADER-->


<!-- FORM -->
<div class="container reg_form">
  <form class="row justify-content-center" method="post" action="log.php">
    <h2 class="col-12">Авторизация</h2>

      <div class="mb-3 col-12 col-md-4 err">
          <p><?= $errMsg ?></p>
      </div>

      <div class="w-100"></div>
      <div class="mb-3 col-12 col-md-4">
          <input name="mail"   value="<?=$email?>"  type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="введите ваш email...">
    </div>

    <div class="w-100"></div>
    <div class="mb-3 col-12 col-md-4">
      <label for="exampleInputPassword1" class="form-label">Пароль</label>
      <input name="password"  value="" type="password" class="form-control" id="exampleInputPassword1">
    </div>
    <div class="w-100"></div>
    <div class="mb-3 col-12 col-md-4">
      <button type="submit" name="button-log" class="btn btn-danger">Войти</button>
      <a href="reg.php">Регистрация</a>
    </div>
  </form>
</div>
<!-- END FORM-->




<?php include("app/include/footer.php"); ?>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>