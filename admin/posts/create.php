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

    <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/44.0.0/ckeditor5.css" />
    <script src="https://cdn.ckeditor.com/ckeditor5/44.0.0/ckeditor5.umd.js"></script>



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
                <a href="create.php" class="col-3 btn btn-success">Add Quest</a>
                <span  class="col-1"> </span>
                <a href="index.php" class="col-3 btn btn-primary">Manage Posts</a>

            </div>




            <div class="row title-table">
                <h2>Добавление опроса</h2>
            </div>

            <div class="row add-post">
                <form action="create.php" method="post">
                        <div class="col mb-4">
                            <input type="text" class="form-control" placeholder="Title" aria-label="Название статьи">
                        </div>
                    <div class="col ">
                        <label for="editor" class="form-label">Содержимое записи</label>
                        <textarea  id="editor" class="form-control"  rows="6"></textarea>
                    </div>
                    <div class="input-group col mb-4">
                        <input type="file" class="form-control" id="inputGroupFile02">
                        <label class="input-group-text" for="inputGroupFile02">Upload</label>
                    </div>
                    <select class="form-select mb-4" aria-label="Default select example">
                        <option selected>Open this select menu</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                    <div class="col mb-4">
                        <button class="btn btn-primary" type="submit">Сохранить запись</button>
                    </div>
                </form>
            </div>

        </div>

    </div>
</div>



<?php include("../../app/include/footer.php"); ?>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<!-- Добавление визуального редактора к ареа админки-->



<script src="../../assets/js/scripts.js"></script>
</body>
</html>