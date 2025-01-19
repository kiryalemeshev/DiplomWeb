<?php include("../../path.php");

include '../../app/controllers/commentaries.php';
?>


<!doctype html>
<html lang="ru">
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
    <?php include "../../app/include/sidebar-admin.php";?>


    <div class="posts col-9">

        <div class="row title-table">
            <h2>Редактирование вопроса</h2>
        </div>

        <div class="row add-post">
            <div class="mb-12 col-12 col-md-12 err">
                <!-- Вывод массива с ошибками -->
                <?php  include "../../app/helps/errorinfo.php"; ?>
            </div>
        </div>

        <div class="row add-post">
            <form action="edit.php" method="post" >
                <input type="hidden" name="id" value="<?=$id;?>">
                <div class="col mb-4">
                    <input value="<?=$email ?>"  disabled name= "title" type="text" class="form-control" placeholder="Title" aria-label="Название статьи">
                </div>
                <div class="col ">
                    <label  class="form-label">Вопрос</label>
                    <textarea  name="content" id="text" class="form-control"  rows="6"><?=$text1?> </textarea>
                </div>


                <div class="form-check">
                    <?php if ($pub) $checked = "checked"; else $checked = ""; ?>
                        <input name="publish" class="form-check-input" type="checkbox" id="flexCheckChecked" <?=$checked; ?>>
                        <label class="form-check-label" for="flexCheckChecked">
                            Publish
                        </label>
                </div>
                   <br>
                <div class="col col-6">
                    <button name="edit_comment" class="btn btn-primary" type="submit">Сохранить</button>
                </div>
            </form>
        </div>

    </div>

</div>
</div>



<?php include("../../app/include/footer.php"); ?>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<!-- Добавление визуального редактора к ареа админки-->




</body>
</html>