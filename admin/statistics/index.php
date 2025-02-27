<?php include("../../path.php");


include '../../app/controllers/posts.php';

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Анкетирование</title>

    <style>




        /* Стили для кнопки "Назад" */
        .back-button {
            /* Убираем абсолютное позиционирование */
            background-color: #007bff; /* Цвет фона */
            color: #fff; /* Цвет текста */
            border: none; /* Убираем рамку */
            padding: 10px 20px; /* Отступы внутри кнопки */
            border-radius: 5px; /* Скругляем углы */
            cursor: pointer; /* Меняем курсор при наведении */
            text-decoration: none; /* Убираем подчеркивание у ссылки */
            transition: background-color 0.3s ease; /* Плавный переход цвета фона */
            order: 1;       /* Помещаем кнопку в начало строки (слева) */
        }

        .back-button:hover {
            background-color: #0056b3; /* Меняем цвет фона при наведении */
        }


        body {
            font-family: sans-serif;
        }

        .topic-container {
            margin-bottom: 15px; /* Уменьшаем отступ */
        }

        .topic-title {
            font-weight: bold;
            margin-bottom: 3px; /* Уменьшаем отступ */
            font-size: 14px; /* Уменьшаем размер шрифта */
        }

        .chart-options {
            display: flex;
            justify-content: space-around;
            margin-top: 5px; /* Уменьшаем отступ */
            border: 1px solid #ccc;
            padding: 5px; /* Уменьшаем padding */
        }

        .chart-option {
            text-align: center;
            width: 30%; /* Занимает треть ширины, остальное - отступы */
        }

        .chart-option a {
            display: block;
            margin-top: 3px; /* Уменьшаем отступ */
            padding: 3px 5px; /* Уменьшаем padding */
            background-color: #f0f0f0;
            border-radius: 3px; /* Уменьшаем border-radius */
            text-decoration: none;
            color: #333;
            font-size: 12px; /* Уменьшаем размер шрифта */
        }

        .chart-option a:hover {
            background-color: #ddd;
        }

        .chart-container {
            border: 1px solid #ccc;
            padding: 5px; /* Уменьшаем padding */
            margin-top: 5px; /* Уменьшаем отступ */
            min-height: 100px; /* Уменьшаем высоту */
        }



        .download-links a {
            margin: 0 3px; /* Уменьшаем отступ */
            font-size: 10px; /* Уменьшаем размер шрифта */
        }


        /* Стили для центрирования заголовка */
        .container h1 {
            text-align: center; /* Центрируем заголовок по горизонтали */
            margin-bottom: 20px; /* Добавляем отступ снизу */
            flex-grow: 1;    /* Заголовок занимает доступное место */
            order: 2;        /* Помещаем заголовок после кнопки */
        }
        .topic-title {
            font-weight: bold;
            margin-bottom: 3px;
            font-size: 20px; /* Увеличиваем размер шрифта здесь */
        }

    </style>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


    <link rel="icon" type="image/png" href="../../assets/icons/logo_main.png">

    <link rel="stylesheet" href="../../assets/css/admin.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300..700&display=swap" rel="stylesheet">




</head>
<body>


<?php  include "../../app/include/header-admin.php"; ?>


<div class="container">
    <br> <button class="back-button" onclick="window.history.back();"><i class="fas fa-arrow-left"></i> Назад</button>

    <h1>Статистика в диаграммах</h1>

    <!-- Опрос о доступности и удобстве -->
    <div class="topic-container">
        <div class="topic-title">Опрос о доступности и удобстве</div>
        <div class="chart-options">
            <div class="chart-option">
                <div>Линейная</div>
                <a href="#">Показать</a>
            </div>
            <div class="chart-option">
                <div>Круговая</div>
                <a href="#">Показать</a>
            </div>
            <div class="chart-option">
                <div>Столбчатая</div>
                <a href="#">Показать</a>
            </div>
        </div>
    </div><br>

    <!-- Опрос о потребностях и ожиданиях -->
    <div class="topic-container">
        <div class="topic-title">Опрос о потребностях и ожиданиях</div>
        <div class="chart-options">
            <div class="chart-option">
                <div>Линейная</div>
                <a href="#">Показать</a>
            </div>
            <div class="chart-option">
                <div>Круговая</div>
                <a href="#">Показать</a>
            </div>
            <div class="chart-option">
                <div>Столбчатая</div>
                <a href="#">Показать</a>
            </div>
        </div>
    </div><br>

    <!-- Опрос о причинах выбора учебного заведения -->
    <div class="topic-container">
        <div class="topic-title">Опрос о причинах выбора учебного заведения</div>
        <div class="chart-options">
            <div class="chart-option">
                <div>Линейная</div>
                <a href="#">Показать</a>

            </div>
            <div class="chart-option">
                <div>Круговая</div>
                <a href="#">Показать</a>

            </div>
            <div class="chart-option">
                <div>Столбчатая</div>
                <a href="#">Показать</a><br>

            </div>
        </div>
    </div>
</div>




<?php include("../../app/include/footer.php"); ?>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>