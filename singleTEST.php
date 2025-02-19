<?php
include "path.php";

include SITE_ROOT . "/app/database/db.php";
$post = selectPostFromPostsWithUsersOnSingle('posts' , 'users', $_GET['post']);

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

        .question {
            margin-bottom: 20px;
        }

        /* Checkbox */
        .checkboxes {
            list-style-type: none;
            padding-left: 0;
        }

        .checkboxes li {
            margin-bottom: 10px;
        }

        .checkbox-container {
            position: relative;
            padding-left: 25px;
            cursor: pointer;
            user-select: none;
            display: inline-block; /* Чтобы label занимал только необходимое место */
        }

        .checkbox-container input {
            position: absolute;
            opacity: 0;
            cursor: pointer;
            height: 0;
            width: 0;
        }

        .checkbox-checkmark {
            position: absolute;
            top: 0;
            left: 0;
            height: 15px;
            width: 15px;
            background-color: #fff; /* Цвет фона чекбокса */
            border: 2px solid #555; /* Цвет и толщина границы */
            border-radius: 0;       /* Убираем скругление углов */
        }

        .checkbox-container input:checked ~ .checkbox-checkmark {
            background-color: #004080; /* Темный синий цвет */
            border-color: #004080;      /* Цвет границы остается тем же, как и фон */
        }

        .checkbox-checkmark::after {
            content: "";
            position: absolute;
            display: none;
        }

        .checkbox-container input:checked ~ .checkbox-checkmark::after {
            display: block;
        }

        .checkbox-container .checkbox-checkmark::after {
            left: 4px;
            top: 1px; /* Немного выше */
            width: 5px;
            height: 10px;
            border: solid white;
            border-width: 0 3px 3px 0; /* Толще границы для лучшей видимости */
            transform: rotate(45deg);
        }

        /* RadioBtn */

        .radiobuttons {
            list-style-type: none;
            padding-left: 0;
        }

        .radiobuttons li {
            margin-bottom: 10px;
        }

        .radiobutton-container {
            position: relative;
            padding-left: 30px;
            cursor: pointer;
            user-select: none;
        }

        .radiobutton-container input {
            position: absolute;
            opacity: 0;
            cursor: pointer;
            height: 0;
            width: 0;
        }

        .radiobutton-checkmark {
            position: absolute;
            top: 0;
            left: 0;
            height: 18px;
            width: 18px;
            background-color: #fff;
            border: 2px solid #555;
            border-radius: 50%;
        }

        .radiobutton-container input:checked ~ .radiobutton-checkmark {
            background-color: #004080;
            border-color: #004080;
        }

        .radiobutton-checkmark::after {
            content: "";
            position: absolute;
            display: none;
        }

        .radiobutton-container input:checked ~ .radiobutton-checkmark::after {
            display: block;
        }

        .radiobutton-container .radiobutton-checkmark::after {
            top: 4px;
            left: 4px;
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: white;
        }
        .frame {
            border: 1px solid #000;
            padding: 10px;
            margin-bottom: 20px;
        }
        .question-group {
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
            background-color: #f9f9f9; /* Optional: Add a light background */
            font-size: 20px; /* Increased font size */
        }

        /* RadioBtn */

        .radiobuttons {
            list-style-type: none;
            padding-left: 0;
        }

        .radiobuttons li {
            margin-bottom: 10px;
        }

        .radiobutton-container {
            position: relative;
            padding-left: 30px;
            cursor: pointer;
            user-select: none;
        }

        .radiobutton-container input {
            position: absolute;
            opacity: 0;
            cursor: pointer;
            height: 0;
            width: 0;
        }

        .radiobutton-checkmark {
            position: absolute;
            top: 0;
            left: 0;
            height: 18px;
            width: 18px;
            background-color: #fff;
            border: 2px solid #555;
            border-radius: 50%;
        }

        .radiobutton-container input:checked ~ .radiobutton-checkmark {
            background-color: #004080;
            border-color: #004080;
        }

        .radiobutton-checkmark::after {
            content: "";
            position: absolute;
            display: none;
        }

        .radiobutton-container input:checked ~ .radiobutton-checkmark::after {
            display: block;
        }

        .radiobutton-container .radiobutton-checkmark::after {
            top: 4px;
            left: 4px;
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: white;
        }
        /* Checkbox Styles */
        .checkboxes {
            list-style-type: none;
            padding-left: 0;
        }

        .checkboxes li {
            margin-bottom: 10px;
        }

        .checkbox-container {
            position: relative;
            padding-left: 30px;
            cursor: pointer;
            user-select: none;
        }

        .checkbox-container input {
            position: absolute;
            opacity: 0;
            cursor: pointer;
            height: 0;
            width: 0;
        }

        .checkbox-checkmark {
            position: absolute;
            top: 0;
            left: 0;
            height: 18px;
            width: 18px;
            background-color: #fff;
            border: 2px solid #555;
        }

        .checkbox-container input:checked ~ .checkbox-checkmark {
            background-color: #004080;
            border-color: #004080;
        }

        .checkbox-checkmark::after {
            content: "";
            position: absolute;
            display: none;
        }

        .checkbox-container input:checked ~ .checkbox-checkmark::after {
            display: block;
        }

        .checkbox-container .checkbox-checkmark::after {
            left: 6px;
            top: 2px;
            width: 4px;
            height: 10px;
            border: solid white;
            border-width: 0 3px 3px 0;
            transform: rotate(45deg);
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



<!--Блок Main-->
<div class="container">
    <div class="content-row">
        <!--main content-->
        <div class="main-content col-md-9 col-12">
            <h2><?php echo $post['title']; ?></h2>
            <div class="single_post row">
                <div class="img col-12 ">
                    <img src="<?=BASE_URL . 'assets/image/posts/' . $post['img'] ?>" alt="<?=$post['title']?>" style="width: 1200px; height: 400px; border-radius: 10px;">

                </div>
                <div class="info">
                    <p><img src="assets/icons/user.png" style="width: 30px; height: 30px;"/>  <?=$post['username'];?> </p>
                    <p><img src="assets/icons/calendar.png" style="width: 30px; height: 30px;"/> <?=$post['created_date'];?></p>
                </div>
                <div class="single_post_text col-12 ">
                    <?=$post['content'];?>
                </div>

                <!-- Вопросы и ответы -->
                <div class="col-12">
                    <br><h3>Нужно ответить на ряд вопросов:</h3><br>

                    <form action=""<?=BASE_URL . "singleTEST.php"?>" method="post">
                    <!-- Quest1 -->
                    <div class="question-group">
                        <b>Вопрос 1:</b> <?=$post['quest1_label']?><br>
                        <input type="text" name="Question1" placeholder="Введите ответ...">
                    </div>

                    <div class="question-group">
                        <b>Вопрос 2:</b> <?=$post['quest2_label']?><br>

                        <ul class="radiobuttons">
                            <li>
                                <label class="radiobutton-container">
                                    <?=$post['radio2_1']?>
                                    <input type="radio" name="Question2" value="radio2_1" <?php if ($post['radio2_1'] == '1') echo 'checked="checked"'; ?>>
                                    <span class="radiobutton-checkmark"></span>
                                </label>
                            </li>
                            <li>
                                <label class="radiobutton-container">
                                    <?=$post['radio2_2']?>
                                    <input type="radio" name="Question2" value="radio2_2" <?php if ($post['radio2_2'] == '1') echo 'checked="checked"'; ?>>
                                    <span class="radiobutton-checkmark"></span>
                                </label>
                            </li>
                            <li>
                                <label class="radiobutton-container">
                                    <?=$post['radio2_3']?>
                                    <input type="radio" name="Question2" value="radio2_3" <?php if ($post['radio2_3'] == '1') echo 'checked="checked"'; ?>>
                                    <span class="radiobutton-checkmark"></span>
                                </label>
                            </li>
                            <li>
                                <label class="radiobutton-container">
                                    <?=$post['radio2_4']?>
                                    <input type="radio" name="Question2" value="radio2_4" <?php if ($post['radio2_4'] == '1') echo 'checked="checked"'; ?>>
                                    <span class="radiobutton-checkmark"></span>
                                </label>
                            </li>
                            <li>
                                <label class="radiobutton-container">
                                    <?=$post['radio2_5']?>
                                    <input type="radio" name="Question2" value="radio2_5" <?php if ($post['radio2_5'] == '1') echo 'checked="checked"'; ?>>
                                    <span class="radiobutton-checkmark"></span>
                                </label>
                            </li>
                        </ul>
                    </div>

                    <!-- Quest3 -->
                    <div class="question-group">
                        <b>Вопрос 3:</b> <?=$post['quest3_label']?><br>

                        <ul class="checkboxes">
                            <li>
                                <label class="checkbox-container">
                                    <?=$post['check3_1']?>
                                    <input type="checkbox" name="Question3" value="check3_1" <?php if ($post['check3_1'] == '1') echo 'checked="checked"'; ?>>
                                    <span class="checkbox-checkmark"></span>
                                </label>
                            </li>
                            <li>
                                <label class="checkbox-container">
                                    <?=$post['check3_2']?>
                                    <input type="checkbox" name="Question4" value="check3_2" <?php if ($post['check3_2'] == '1') echo 'checked="checked"'; ?>>
                                    <span class="checkbox-checkmark"></span>
                                </label>
                            </li>
                            <li>
                                <label class="checkbox-container">
                                    <?=$post['check3_3']?>
                                    <input type="checkbox" name="Question5" value="check3_3" <?php if ($post['check3_3'] == '1') echo 'checked="checked"'; ?>>
                                    <span class="checkbox-checkmark"></span>
                                </label>
                            </li>
                            <li>
                                <label class="checkbox-container">
                                    <?=$post['check3_4']?>
                                    <input type="checkbox" name="Question6" value="check3_4" <?php if ($post['check3_4'] == '1') echo 'checked="checked"'; ?>>
                                    <span class="checkbox-checkmark"></span>
                                </label>
                            </li>
                            <li>
                                <label class="checkbox-container">
                                    <?=$post['check3_5']?>
                                    <input type="checkbox" name="Question7" value="check3_5" <?php if ($post['check3_5'] == '1') echo 'checked="checked"'; ?>>
                                    <span class="checkbox-checkmark"></span>
                                </label>
                            </li>
                        </ul>
                    </div>

                    <!-- Quest4 -->
                    <div class="question-group">
                        <b>Вопрос 4:</b> <?=$post['quest4_label']?>
                        <input type="text" name="Question8" placeholder="Введите ответ...">
                    </div>

                    <!-- Quest5 -->
                    <div class="question-group">
                        <b>Вопрос 5:</b> <?=$post['quest5_label']?><br>

                        <ul class="radiobuttons">
                            <li>
                                <label class="radiobutton-container">
                                    <?=$post['radio5_1']?>
                                    <input type="radio" name="Question9" value="radio5_1" <?php if ($post['radio5_1'] == '1') echo 'checked="checked"'; ?>>
                                    <span class="radiobutton-checkmark"></span>
                                </label>
                            </li>
                            <li>
                                <label class="radiobutton-container">
                                    <?=$post['radio5_2']?>
                                    <input type="radio" name="Question9" value="radio5_2" <?php if ($post['radio5_2'] == '1') echo 'checked="checked"'; ?>>
                                    <span class="radiobutton-checkmark"></span>
                                </label>
                            </li>
                        </ul>
                    </div>

                    <!-- Quest6 -->
                    <div class="question-group">
                        <b>Вопрос 6:</b> <?=$post['quest6_label']?><br>

                        <ul class="checkboxes">
                            <li>
                                <label class="checkbox-container">
                                    <?=$post['check6_1']?>
                                    <input type="checkbox" name="Question10" value="check6_1" <?php if ($post['check6_1'] == '1') echo 'checked="checked"'; ?>>
                                    <span class="checkbox-checkmark"></span>
                                </label>
                            </li>
                            <li>
                                <label class="checkbox-container">
                                    <?=$post['check6_2']?>
                                    <input type="checkbox" name="Question11" value="check6_2" <?php if ($post['check6_2'] == '1') echo 'checked="checked"'; ?>>
                                    <span class="checkbox-checkmark"></span>
                                </label>
                            </li>
                            <li>
                                <label class="checkbox-container">
                                    <?=$post['check6_3']?>
                                    <input type="checkbox" name="Question12" value="check6_3" <?php if ($post['check6_3'] == '1') echo 'checked="checked"'; ?>>
                                    <span class="checkbox-checkmark"></span>
                                </label>
                            </li>
                        </ul>
                    </div>

                    <button type="submit" name="add_opros" class="btn btn-primary">Отправить ответ</button>

                </div><br>

                </form>


            </div>
                <!-- Инклюдим html block с комментариями-->
                <p> <?php include("app/include/comments.php"); ?> </p>
            </div>




    </div>
</div>

<!--Блок Main end-->


<?php include("app/include/footer.php"); ?>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>