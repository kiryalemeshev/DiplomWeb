<?php
include "path.php";
include "app/controllers/opendoor.php";
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
            border-radius: 50%;     /* Скругление углов */
        }

        .checkbox-container input:checked ~ .checkbox-checkmark {
            background-color: #004080; /* Темный синий цвет */
            border-color: #004080;      /* Цвет границы остаётся тем же, как и фон */
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
            left: 5px;
            top: 1px;
            width: 5px;
            height: 9px;
            border: solid white;
            border-width: 0 3px 3px 0;
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
            <style>
                h2 {
                    text-align: justify; /* Выравниваем текст по левому краю */
                }
            </style>

            <h2>Регистрационный этап ко Дню открытых дверей "ФГБОУ ВО Брянский государственный университет имени академика И. Г. Петровского"</h2>

            <div class="single_post row">
                <div class="img col-12 ">
                    <img src="assets/image/bgu.jpg" alt="img-thumbnail" style="width: 1300px; height: 550px; border-radius: 10px;" >

                </div>
                <div class="info">
                    <p><img src="assets/icons/user.png" style="width: 30px; height: 30px;"/> Author Приёмная комиссия </p>
                    <p><img src="assets/icons/calendar.png" style="width: 30px; height: 30px;"/> 05.12.2024 </p>
                </div>
                <div class="single_post_text col-12 ">

                    <div class="container">
                        <h1>Регистрационный этап</h1>
                        <p>Пожалуйста, ответьте на следующие вопросы:</p>

                        <form action="DaysDoor.php" method="post">

                            <!-- Вопрос 1 -->
                            <div class="frame">
                            <p><strong>Вопрос 1.</strong> В каком Образовательном учреждении Вы обучаетесь?</p>
                            <input type="text" id="question1" name="Quest1" placeholder="Введите полное название учебного заведения">
                            </div>

                            <!-- Вопрос 2 -->
                            <div class="frame">
                            <p><strong>Вопрос 2.</strong> Укажите район проживания.</p>
                            <input type="text" id="question2" name="Quest2" placeholder="Ваш район проживания...">
                            </div>

                            <!-- Вопрос 3 -->
                            <div class="frame">
                            <p><strong>Вопрос 3.</strong> Вы являетесь...</p>
                            <select id="question3" name="Quest3">
                                <option value="абитуриентом">абитуриентом</option>
                                <option value="родителем">родителем</option>
                                <option value="преподавателем">преподавателем</option>
                                <option value="другое">другое</option>
                            </select><br>
                            </div>

                            <!-- Вопрос 4 -->
                            <div class="frame">
                            <div class="question">
                                <p><strong>Вопрос 4.</strong>
                                    Откуда Вы узнали о Дне открытых дверей?</p>
                                <ul class="checkboxes">
                                    <li>
                                        <label class="checkbox-container">
                                            <input type="checkbox" name="Quest4" value="От учителей">
                                            <span class="checkbox-checkmark"></span>
                                            От учителей
                                        </label>
                                    </li>
                                    <li>
                                        <label class="checkbox-container">
                                            <input type="checkbox" name="Quest5" value="От друзей и родственников">
                                            <span class="checkbox-checkmark"></span>
                                            От друзей и родственников
                                        </label>
                                    </li>
                                    <li>
                                        <label class="checkbox-container">
                                            <input type="checkbox" name="Quest6" value="Из социальных сетей">
                                            <span class="checkbox-checkmark"></span>
                                            Из социальных сетей
                                        </label>
                                    </li>
                                    <li>
                                        <label class="checkbox-container">
                                            <input type="checkbox" name="Quest7" value="Самостоятельно обращался в Университет">
                                            <span class="checkbox-checkmark"></span>
                                            Самостоятельно обращался в Университет
                                        </label>
                                    </li>
                                    <li>
                                        <label class="checkbox-container">
                                            <input type="checkbox" name="Quest8" value="Другое">
                                            <span class="checkbox-checkmark"></span>
                                            Другое
                                        </label>
                                    </li>
                                </ul>
                            </div>
                            </div>


                            <!-- Вопрос 5 -->
                            <div class="frame">
                            <div class="question">
                                <p><strong>Вопрос 5.</strong>
                                    Какие формы обучения Вас интересуют?</p>
                                <ul class="checkboxes">
                                    <li>
                                        <label class="checkbox-container">
                                            <input type="checkbox" name="Quest9" value="Очная форма обучения">
                                            <span class="checkbox-checkmark"></span>
                                            Очная форма обучения
                                        </label>
                                    </li>
                                    <li>
                                        <label class="checkbox-container">
                                            <input type="checkbox" name="Quest10" value="Заочная форма обучения">
                                            <span class="checkbox-checkmark"></span>
                                            Заочная форма обучения
                                        </label>
                                    </li>
                                    <li>
                                        <label class="checkbox-container">
                                            <input type="checkbox" name="Quest11" value="Очно-заочная форма обучения (вечерняя)">
                                            <span class="checkbox-checkmark"></span>
                                            Очно-заочная форма обучения (вечерняя)
                                        </label>
                                    </li>

                                </ul>
                            </div>
                            </div>

                            <!-- Вопрос 6 -->
                            <div class="frame">
                            <div class="question">
                                <p><strong>Вопрос 6.</strong> Собираетесь ли Вы посещать подготовительные курсы?</p>
                                <ul class="radiobuttons">
                                    <li>
                                        <label class="radiobutton-container">
                                            <input type="radio" name="Quest12" value="Да">
                                            <span class="radiobutton-checkmark"></span>
                                            Да
                                        </label>
                                    </li>
                                    <li>
                                        <label class="radiobutton-container">
                                            <input type="radio" name="Quest13" value="Нет">
                                            <span class="radiobutton-checkmark"></span>
                                            Нет
                                        </label>
                                    </li>

                                </ul>
                            </div>
                            </div>

                            <!-- Вопрос 7 -->
                                <div class="frame">
                            <p><strong>Вопрос 7.</strong> В каком году планируете поступать?</p>
                            <select id="question7" name="Quest14">
                                <option value="2025">2025</option>
                                <option value="2026">2026</option>
                                <option value="2027">2027</option>
                                <option value="Уже закончил\Не планирую">Уже закончил\Не планирую</option>
                                <option value="Другое">Другое</option>
                            </select><br>
                                </div>

                            <!-- Вопрос 8 -->
                                    <div class="frame">
                            <div class="question">
                                <p><strong>Вопрос 8.</strong>
                                    Что является важным при выборе профессии?</p>
                                <ul class="checkboxes">
                                    <li>
                                        <label class="checkbox-container">
                                            <input type="checkbox" name="Quest15" value="Зарплатные ожидания">
                                            <span class="checkbox-checkmark"></span>
                                            Зарплатные ожидания
                                        </label>
                                    </li>
                                    <li>
                                        <label class="checkbox-container">
                                            <input type="checkbox" name="Quest16" value="Возможность саморазвития">
                                            <span class="checkbox-checkmark"></span>
                                            Возможность саморазвития
                                        </label>
                                    </li>
                                    <li>
                                        <label class="checkbox-container">
                                            <input type="checkbox" name="Quest17" value="Интерес к профессии, зарплатные ожидания">
                                            <span class="checkbox-checkmark"></span>
                                            Интерес к профессии, зарплатные ожидания
                                        </label>
                                    </li>
                                    <li>
                                        <label class="checkbox-container">
                                            <input type="checkbox" name="Quest18" value="Необходимость получения диплома
                                            о высшем образовании">
                                            <span class="checkbox-checkmark"></span>
                                            Необходимость получения диплома
                                            о высшем образовании
                                        </label>
                                    </li>
                                    <li>
                                        <label class="checkbox-container">
                                            <input type="checkbox" name="Quest19" value="Перспектива, трудоустройство,
                                             саморазвитие, зарплатные ожидания">
                                            <span class="checkbox-checkmark"></span>
                                            Перспектива, трудоустройство,
                                            саморазвитие, зарплатные ожидания
                                        </label>
                                    </li>
                                    <li>
                                        <label class="checkbox-container">
                                            <input type="checkbox" name="Quest20" value="Развитие науки">
                                            <span class="checkbox-checkmark"></span>
                                            Развитие науки
                                        </label>
                                    </li>

                                </ul>
                            </div>
                                    </div>


                            <!-- Вопрос 9 -->
                                        <div class="frame">
                            <div class="question">
                                <p><strong>Вопрос 9.</strong>
                                    Почему Вы выбираете БГУ?</p>
                                <ul class="checkboxes">
                                    <li>
                                        <label class="checkbox-container">
                                            <input type="checkbox" name="Quest21" value="Возможность бесплатного обучения">
                                            <span class="checkbox-checkmark"></span>
                                            Возможность бесплатного обучения
                                        </label>
                                    </li>
                                    <li>
                                        <label class="checkbox-container">
                                            <input type="checkbox" name="Quest22" value="Возможность проявить свои знания и навыки">
                                            <span class="checkbox-checkmark"></span>
                                            Возможность проявить свои знания и навыки
                                        </label>
                                    </li>
                                    <li>
                                        <label class="checkbox-container">
                                            <input type="checkbox" name="Quest23" value="Наличие подготовительных курсов">
                                            <span class="checkbox-checkmark"></span>
                                            Наличие подготовительных курсов
                                        </label>
                                    </li>
                                    <li>
                                        <label class="checkbox-container">
                                            <input type="checkbox" name="Quest24" value="Перспектива, трудоустройство, саморазвитие, зарплатные ожидания">
                                            <span class="checkbox-checkmark"></span>
                                            Перспектива, трудоустройство, саморазвитие, зарплатные ожидания
                                        </label>
                                    </li>
                                    <li>
                                        <label class="checkbox-container">
                                            <input type="checkbox" name="Quest25" value="Престижность университета">
                                            <span class="checkbox-checkmark"></span>
                                            Престижность университета
                                        </label>
                                    </li>
                                    <li>
                                        <label class="checkbox-container">
                                            <input type="checkbox" name="Quest26" value="Профильный класс в школе">
                                            <span class="checkbox-checkmark"></span>
                                            Профильный класс в школе
                                        </label>
                                    </li>
                                </ul>
                            </div>
                                        </div>

                            <!-- Вопрос 10 -->
                                            <div class="frame">
                            <p><strong>Вопрос 10.</strong> Какой факультет Вам интересен?</p>
                            <select id="question10" name="Quest27">
                                <option value="Физико-математический факультет">Физико-математический факультет</option>
                                <option value="Факультет педагогики и психологии">Факультет педагогики и психологии</option>
                                <option value="Финансово-экономический факультет">Финансово-экономический факультет</option>
                                <option value="Факультет иностранных языков">Факультет иностранных языков</option>
                                <option value="Факультет физической культуры">Факультет физической культуры</option>
                                <option value="Факультет истории и международных отношений">Факультет истории и международных отношений</option>
                                <option value="Естественно-географический факультет">Естественно-географический факультет</option>
                                <option value="Юридический факультет">Юридический факультет</option>
                                <option value="Факультет технологии и дизайна">Факультет технологии и дизайна</option>
                                <option value="Филологический факультет">Филологический факультет</option>
                            </select><br>
                                            </div>

                            <div class="w-100"></div>
                            <div class="mb-3 col-12 col-md-4">
                                <button onclick="Message()" type="submit" class="btn btn-danger" name="button-subm">Отправить</button>
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