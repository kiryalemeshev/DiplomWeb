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


        /* Стили для центрирования заголовка */
        .container h1 {
            text-align: center; /* Центрируем заголовок по горизонтали */
            margin-bottom: 20px; /* Добавляем отступ снизу */
            flex-grow: 1;    /* Заголовок занимает доступное место */
            order: 2;        /* Помещаем заголовок после кнопки */
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
    <h1>Выберите опрос для экспорта:</h1>
</div>

<div class="container">
    <div class="table-container">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th scope="col">Название опроса</th>
                <th scope="col">Описание</th>
                <th scope="col">Действие</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>Опрос о доступности и удобстве</td>
                <td>Скачать таблицу для оценки удобства доступа к информациям и ресурсам.</td>
                <td><a href="export_DostIUdob.php" class="btn btn-primary">Скачать таблицу</a></td>
            </tr>
            <tr>
                <td>Опрос о потребностях и ожиданиях</td>
                <td>Скачать таблицу о потребностях и ожиданиях от обучения.</td>
                <td><a href="#" class="btn btn-primary">Скачать таблицу</a></td>
            </tr>
            <tr>
                <td>Опрос о причинах выбора учебного заведения</td>
                <td>Скачать таблицу о причинах, по которым вы выбрали именно это учебное заведение.</td>
                <td><a href="#" class="btn btn-primary">Скачать таблицу</a></td>
            </tr>
            </tbody>
        </table>

    </div>
</div>




<?php include("../../app/include/footer.php"); ?>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>