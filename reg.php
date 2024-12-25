<?php
    include "path.php";
    include "app/controllers/users.php";
    ?>



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
        .checkbox-container {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }

        .checkbox-container input[type="checkbox"] {
            width: 20px;
            height: 20px;
            margin-right: 5px;
        }

        .checkbox-container label {
            font-size: 14px;
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
    <form class="row justify-content-center" method="post" action="reg.php">
        <h2>Форма регистрации</h2>
        <div class="mb-3 col-12 col-md-4 err">
            <p><?=$errMsg?></p>
        </div>
        <div class="w-100"></div>
        <div class="mb-3 col-12 col-md-4">
            <label for="formGroupExampleInput" class="form-label">Ваш логин</label>
            <input name="login" value="<?=$login?>"  type="text" class="form-control" id="formGroupExampleInput" placeholder="введите ваш логин...">
        </div>
        <div class="w-100"></div>
        <div class="mb-3 col-12 col-md-4">
            <label for="exampleInputEmail1" class="form-label">Email</label>
            <input name="mail"   value="<?=$email?>"  type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">Ваш email адрес не будет использован для спама!</div>
        </div>
        <div class="w-100"></div>
        <div class="mb-3 col-12 col-md-4">
            <label for="exampleInputPassword1" class="form-label">Пароль</label>
            <input name="pass-first" type="password" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="w-100"></div>
        <div class="mb-3 col-12 col-md-4">
            <label for="exampleInputPassword2" class="form-label">Повторите пароль</label>
            <input  name="pass-second" type="password" class="form-control" id="exampleInputPassword2">
        </div>
        <div class="w-100"></div>
        <div class="mb-3 col-12 col-md-4">
            <!-- Чекбокс и текст -->
            <div class="checkbox-container">
                <input type="checkbox" id="termsCheckbox" required>
                <label for="termsCheckbox">Обработка персональных данных</label>
            </div>

            <!-- Кнопка, которая блокируется до установки галочки -->
            <button type="submit" class="btn btn-danger" name="button-reg" disabled>Регистрация</button>
            <a href="log.php">Войти</a>
        </div>
    </form>
</div>
<!-- END FORM-->




<?php include("app/include/footer.php"); ?>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script>
    const termsCheckbox = document.getElementById('termsCheckbox');
    const submitButton = document.querySelector('[name="button-reg"]');

    function toggleSubmitButton() {
        if (termsCheckbox.checked) {
            submitButton.disabled = false;
        } else {
            submitButton.disabled = true;
        }
    }

    termsCheckbox.addEventListener('change', toggleSubmitButton);
    toggleSubmitButton(); // Проверяем состояние чекбокса при загрузке страницы
</script>

</body>
</html>