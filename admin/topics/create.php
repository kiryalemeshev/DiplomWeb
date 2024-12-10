<?php include("../../path.php");
include '../../app/database/db.php';

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


    <link rel="icon" type="image/png" href="../../assets/icons/logo_main.png">

    <link rel="stylesheet" href="../../assets/css/admin.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300..700&display=swap" rel="stylesheet">




</head>
<body>


<?php  include "../../app/include/header-admin.php"; ?>

<div class="container">
    <div class = "row">

        <div class = "sidebar col-3">

            <ul>
                <li>
                    <a href="">Записи</a>
                </li>
                <li>
                    <a href="">Пользователи</a>
                </li>
                <li>
                    <a href="">Категории</a>
                </li>
            </ul>

        </div>


        <div class="posts col-9">
            <div class="buttons row">
                <a href="create.php" class="col-3 btn btn-success">Создать категорию</a>
                <span  class="col-1"> </span>
                <a href="index.php" class="col-3 btn btn-primary">Управлять категориями</a>

            </div>




            <div class="row title-table">
                <h2>Создать категорию</h2>
            </div>

            <div class="row add-post">
                <form action="create.php" method="post">
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Имя категории" aria-label="Имя категории">
                    </div>
                    <div class="col">
                        <label for="content" class="form-label">Описание категории</label>
                        <textarea class="form-control" id="content" rows="3"></textarea>
                    </div>

                    <div class="col">
                        <button class="btn btn-primary" type="submit">Создать категорию</button>
                    </div>
                </form>
            </div>

        </div>

    </div>
</div>



<?php include("../../app/include/footer.php"); ?>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>