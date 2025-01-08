<?php
    include "path.php";
    include "app/controllers/vi.php";

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
      <h2>Мы предлагаем вам пройти небольшой опрос, который поможет нам определить,
        какие предметы ЕГЭ будут наиболее сдаваемы при поступлении в Вуз.</h2>
      <div class="single_post row">
        <div class="img col-12 ">
          <img src="assets/image/image_6.png" alt="img-thumbnail" style="width: 1200px; height: 400px; border-radius: 10px;">

        </div>
          <div class="info">
            <p><img src="assets/icons/user.png" style="width: 30px; height: 30px;"/> Author Kirra </p>
            <p><img src="assets/icons/calendar.png" style="width: 30px; height: 30px;"/> 27.10.2024 </p>
          </div>
        <div class="single_post_text col-12 ">

          <div class="container">
            <h1>Опросник для сдающих ЕГЭ</h1>
            <p>Пожалуйста, ответьте на следующие вопросы:</p>

            <form action="single.php" method="post">

                <!-- Вопрос 1 -->
                <div class="frame">
                    <div class="question">
                        <p><strong>Вопрос 1.</strong>
                            Что является основной целью вашего поступления в университет?</p>
                        <ul class="checkboxes">
                            <li>
                                <label class="checkbox-container">
                                    <input type="checkbox" name="quest1" value="Получение диплома">
                                    <span class="checkbox-checkmark"></span>
                                    Получение диплома
                                </label>
                            </li>
                            <li>
                                <label class="checkbox-container">
                                    <input type="checkbox" name="quest2" value="Приобретение новых знаний и навыков">
                                    <span class="checkbox-checkmark"></span>
                                    Приобретение новых знаний и навыков
                                </label>
                            </li>
                            <li>
                                <label class="checkbox-container">
                                    <input type="checkbox" name="quest3" value="Расширение круга общения">
                                    <span class="checkbox-checkmark"></span>
                                    Расширение круга общения
                                </label>
                            </li>
                            <li>
                                <label class="checkbox-container">
                                    <input type="checkbox" name="quest4" value="Возможность заниматься наукой и исследованиями">
                                    <span class="checkbox-checkmark"></span>
                                    Возможность заниматься наукой и исследованиями
                                </label>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Вопрос 2 -->
                <div class="frame">
                    <p><strong>Вопрос 2.</strong> Какие предметы были любимыми в школе?</p>
                    <input type="text" id="question1" name="quest5" placeholder="Введите до 3-х предметов...">
                </div>

                <!-- Вопрос 3 -->
                <div class="frame">
                    <div class="question">
                        <p><strong>Вопрос 3.</strong>
                            Какие качества, на ваш взгляд, наиболее важны для успешной учебы в университете?</p>
                        <ul class="checkboxes">
                            <li>
                                <label class="checkbox-container">
                                    <input type="checkbox" name="quest6" value="Усидчивость и внимательность">
                                    <span class="checkbox-checkmark"></span>
                                    Усидчивость и внимательность
                                </label>
                            </li>
                            <li>
                                <label class="checkbox-container">
                                    <input type="checkbox" name="quest7" value="Креативность и нестандартное мышление">
                                    <span class="checkbox-checkmark"></span>
                                    Креативность и нестандартное мышление
                                </label>
                            </li>
                            <li>
                                <label class="checkbox-container">
                                    <input type="checkbox" name="quest8" value="Коммуникабельность и умение работать в команде">
                                    <span class="checkbox-checkmark"></span>
                                    Коммуникабельность и умение работать в команде
                                </label>
                            </li>
                            <li>
                                <label class="checkbox-container">
                                    <input type="checkbox" name="quest9" value="Самостоятельность и ответственность">
                                    <span class="checkbox-checkmark"></span>
                                    Самостоятельность и ответственность
                                </label>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Вопрос 4 -->
                <div class="frame">
                    <div class="question">
                        <p><strong>Вопрос 4.</strong>
                            Что вас больше всего привлекает в выбранной вами специальности?</p>
                        <ul class="checkboxes">
                            <li>
                                <label class="checkbox-container">
                                    <input type="checkbox" name="quest10" value="Перспективы карьерного роста">
                                    <span class="checkbox-checkmark"></span>
                                    Перспективы карьерного роста
                                </label>
                            </li>
                            <li>
                                <label class="checkbox-container">
                                    <input type="checkbox" name="quest11" value="Интерес к предмету">
                                    <span class="checkbox-checkmark"></span>
                                    Интерес к предмету
                                </label>
                            </li>
                            <li>
                                <label class="checkbox-container">
                                    <input type="checkbox" name="quest12" value="Возможность самореализации и творчестве">
                                    <span class="checkbox-checkmark"></span>
                                    Возможность самореализации и творчества
                                </label>
                            </li>
                            <li>
                                <label class="checkbox-container">
                                    <input type="checkbox" name="quest13" value="Высокий спрос на специалистов в этой области">
                                    <span class="checkbox-checkmark"></span>
                                    Высокий спрос на специалистов в этой области
                                </label>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Вопрос 5 -->
                <div class="frame">
                    <div class="question">
                        <p><strong>Вопрос 5.</strong>
                            Каким образом вы планируете использовать полученные знания после окончания университета?</p>
                        <ul class="checkboxes">
                            <li>
                                <label class="checkbox-container">
                                    <input type="checkbox" name="quest14" value="Найти работу по специальности">
                                    <span class="checkbox-checkmark"></span>
                                    Найти работу по специальности
                                </label>
                            </li>
                            <li>
                                <label class="checkbox-container">
                                    <input type="checkbox" name="quest15" value="Продолжить обучение в магистратуре или аспирантуре">
                                    <span class="checkbox-checkmark"></span>
                                    Продолжить обучение в магистратуре или аспирантуре
                                </label>
                            </li>
                            <li>
                                <label class="checkbox-container">
                                    <input type="checkbox" name="quest16" value="Открыть собственное дело">
                                    <span class="checkbox-checkmark"></span>
                                    Открыть собственное дело
                                </label>
                            </li>
                            <li>
                                <label class="checkbox-container">
                                    <input type="checkbox" name="quest17" value="Заниматься научной деятельностью">
                                    <span class="checkbox-checkmark"></span>
                                    Заниматься научной деятельностью
                                </label>
                            </li>
                        </ul>
                    </div>
                </div>




                <div class="w-100"></div>
                <div class="mb-3 col-12 col-md-4">
                    <button onclick="Message()" type="submit" class="btn btn-danger" name="button-sub">Отправить</button>
                    <script>
                        function Message() { alert("Спасибо за ответ!"); }
                    </script>
            </form>
          </div>



        </div>

      </div>


    </div>



  </div>
</div>

<!--Блок Main end-->


<?php include("app/include/footer.php"); ?>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>