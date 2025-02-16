<?php include("../../path.php");

include '../../app/controllers/posts.php';
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



        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
            padding: 15px; /* Внутренние отступы для рамки */
            border: 1px solid #ccc; /* Рамка */
            border-radius: 5px; /* Закругление углов рамки */
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        input[type="text"],
        textarea,
        input[type="radio"],
        input[type="checkbox"] {
            margin-bottom: 5px; /* Добавил отступ снизу для элементов в рамке */
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
            <div class="buttons row">
                <a href="<?php echo BASE_URL . "admin/posts/create.php";?>" class="col-3 btn btn-success">Добавить опрос</a>
                <span  class="col-1"> </span>
                <a href="<?php echo BASE_URL . "admin/posts/index.php";?>" class="col-3 btn btn-primary">Редактировать</a>

            </div>




            <div class="row title-table">
                <h2>Добавление опроса</h2>
            </div>

            <div class="row add-post">
            <div class="mb-12 col-12 col-md-12 err">
                <!-- Вывод массива с ошибками -->
                <?php  include "../../app/helps/errorinfo.php"; ?>
            </div>
            </div>

            <div class="row add-post">
                <form action="create.php" method="post" enctype="multipart/form-data">
                        <div class="col mb-4">
                            <input value="<?=$title; ?>" name= "title" type="text" class="form-control" placeholder="Title" aria-label="Название статьи">
                        </div>
                    <div class="col ">
                        <label for="editor1" class="form-label">Содержимое записи</label>
                        <textarea  name="content" id="editor1" class="form-control"  rows="6"><?=$content; ?> </textarea>
                    </div>

                    <div class="input-group col mb-4">
                        <input name="img" type="file" class="form-control" id="inputGroupFile02">
                        <label class="input-group-text" for="inputGroupFile02">Upload</label>
                    </div>



            </div>




                    <select name="topic" class="form-select mb-4" aria-label="Default select example">
                        <option selected>Выбрать категорию:</option>
                        <?php foreach ($topics as $key => $topic): ?>
                            <option value="<?=$topic['id'];?>"><?=$topic['name'];?></option>
                        <?php endforeach; ?>
                    </select>

                    <div class="form-check">
                        <input name="publish" class="form-check-input" type="checkbox" value="1" id="flexCheckChecked" checked>
                        <label class="form-check-label" for="flexCheckChecked">
                            Publish
                        </label>
                    </div><br>

            <div class="form-group">
                <label for="quest1_label_input">Вопрос 1:</label>
                <input type="text" id="quest1_label_input" name="quest1_label" placeholder="Введите ваш вопрос здесь" style="border: 2px solid black;">
                <input type="text" id="answer1" name="quest1_answer" placeholder="Ответ" >
            </div>

            <div class="form-group radio-group">
                <label for="quest2_label_input">Вопрос 2:</label>
                <input type="text" id="quest2_label_input" name="quest2_label" placeholder="Введите ваш вопрос здесь" style="border: 2px solid black;">
                <div>
                    <input type="text" id="quest2_label_input" name="radio2_1" placeholder="Вариант ответа 1...">
                </div>
                <div>
                    <input type="text" id="quest2_label_input" name="radio2_2" placeholder="Вариант ответа 2...">
                </div>
                <div>
                    <input type="text" id="quest2_label_input" name="radio2_3" placeholder="Вариант ответа 3...">
                </div>
                <div>
                    <input type="text" id="quest2_label_input" name="radio2_4" placeholder="Вариант ответа 4...">
                </div>
                <div>
                    <input type="text" id="quest2_label_input" name="radio2_5" placeholder="Вариант ответа 5...">
                </div>
            </div>

            <div class="form-group checkbox-group">
                <label for="quest3_label_input">Вопрос 3:</label>
                <input type="text" id="quest3_label_input" name="quest3_label" placeholder="Введите ваш вопрос здесь" style="border: 2px solid black;" >
                <div>
                    <input type="text" id="quest3_label_input" name="check3_1" placeholder="Вариант ответа 1..." >
                </div>
                <div>
                    <input type="text" id="quest3_label_input" name="check3_2" placeholder="Вариант ответа 2..." >
                </div>
                <div>
                    <input type="text" id="quest3_label_input" name="check3_3" placeholder="Вариант ответа 3..." >
                </div>
                <div>
                    <input type="text" id="quest3_label_input" name="check3_4" placeholder="Вариант ответа 4..." >
                </div>
                <div>
                    <input type="text" id="quest3_label_input" name="check3_5" placeholder="Вариант ответа 5..." >
                </div>
            </div>




            <div class="form-group">
                <label for="quest6_label_input">Вопрос 4:</label>
                <input type="text" id="quest4_label_input" name="quest4_label" placeholder="Введите ваш вопрос здесь" style="border: 2px solid black;">
                <input type="text" id="answer1" name="quest6_answer" placeholder="Ответ" disabled>
            </div>

            <button type="submit" name="add_post" class="btn btn-primary">Сохранить</button>




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