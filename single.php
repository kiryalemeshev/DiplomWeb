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
  </style>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


  <link rel="icon" type="image/png" href="assets/icons/icon.png">

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
          <img src="assets/image/image_6.png" alt="img-thumbnail">

        </div>
          <div class="info">
            <p><img src="assets/icons/user.png" style="width: 30px; height: 30px;"/> Auhor Kirra </p>
            <p><img src="assets/icons/calendar.png" style="width: 30px; height: 30px;"/> 27.10.2024 </p>
          </div>
        <div class="single_post_text col-12 ">

          <div class="container">
            <h1>Опросник для сдающих ЕГЭ</h1>
            <p>Пожалуйста, ответьте на следующие вопросы:</p>

            <form action="single.php" method="post">
<!--                Вопрос 1 -->
<!--              <p><strong>Вопрос 1.</strong> Как вы оцениваете свою подготовку к ЕГЭ?</p>-->
<!--              <select id="question1" name="question1">-->
<!--                <option value="">Выберите вариант...</option>-->
<!--                <option value="Отличная">Отличная</option>-->
<!--                <option value="Хорошая">Хорошая</option>-->
<!--                <option value="Удовлетворительная">Удовлетворительная</option>-->
<!--                <option value="Неудовлетворительная">Неудовлетворительная</option>-->
<!--              </select>-->

              <!-- Вопрос 2 -->
              <p><strong>Вопрос 1.</strong> Какие предметы вы планируете сдавать на ЕГЭ?</p>
              <input type="text" id="question1" name="quest1" placeholder="Введите список предметов через запятую">

              <!-- Вопрос 3 -->
              <p><strong>Вопрос 2.</strong> Какой предмет вызывает у вас наибольшие трудности при подготовке?</p>
              <input type="text" id="question2" name="quest2" placeholder="Название предмета">

<!--              Вопрос 4 -->
<!--              <p><strong>Вопрос 4.</strong> Оцените уровень своей уверенности в успешной сдаче ЕГЭ:</p>-->
<!--              <select id="question4" name="question4">-->
<!--                <option value="">Выберите вариант...</option>-->
<!--                <option value="Очень уверен">Очень уверен</option>-->
<!--                <option value="Довольно уверен">Довольно уверен</option>-->
<!--                <option value="Не очень уверен">Не очень уверен</option>-->
<!--                <option value="Совсем не уверен">Совсем не уверен</option>-->
<!--              </select>-->

              <!-- Вопрос 5 -->
              <p><strong>Вопрос 3.</strong> Сколько времени в день вы обычно уделяете подготовке к ЕГЭ?</p>
              <input type="text" id="question3" name="quest3" placeholder="Пример: 2 часа, 4 часа и т.д.">


                <p><strong>Вопрос 4.</strong> Какой язык программирования вы знаете?</p><br>
                <label><input type="checkbox" name="quest5" value="JavaScript"> JS</label><br>
                <label><input type="checkbox" name="quest6" value="C++"> C++</label><br>
                <label><input type="checkbox" name="quest7" value="PHP"> PHP</label><br>

                <!-- Вопрос 6 -->
            <p><strong>Вопрос 5.</strong> Используете ли вы дополнительные ресурсы для подготовки (репетиторы, онлайн-курсы)?</p>
             <select id="question4" name="quest4">
                <option value="">Выберите вариант...</option>
                <option value="Да, репетитор">Да, репетитор</option>
                <option value="Да, онлайн-курсы">Да, онлайн-курсы</option>
                <option value="Нет, готовлюсь самостоятельно">Нет, готовлюсь самостоятельно</option>
              </select><br>

                <p><strong>Вопрос 6.</strong> Какой язык программирования вы не знаете?</p><br>
                <label><input type="radio" name="quest8" value="JavaScript"> C++</label><br>
                <label><input type="radio" name="quest8" value="C++"> 1C</label><br>
                <label><input type="radio" name="quest8" value="PHP"> С#</label><br>






<!--               Вопрос 7 -->
<!--              <p><strong>Вопрос 7.</strong> Какие методы подготовки вам кажутся наиболее эффективными?</p>-->
<!--              <textarea id="question7" name="question7" rows="4" cols="50"></textarea>-->
<!---->
<!--              Вопрос 8 -->
<!--              <p><strong>Вопрос 8.</strong> Какие факторы, по вашему мнению, могут повлиять на успешную сдачу ЕГЭ?</p>-->
<!--              <input type="text" id="question8" name="question8" placeholder="Перечислите факторы через запятую">-->
<!---->
<!--              Вопрос 9 -->
<!--              <p><strong>Вопрос 9.</strong> Есть ли у вас какие-то особые стратегии для успешного прохождения экзамена?</p>-->
<!--              <textarea id="question9" name="question9" rows="4" cols="50"></textarea>-->
<!---->
<!--              Вопрос 10 -->
<!--              <p><strong>Вопрос 10.</strong> Что бы вы посоветовали другим учащимся, которые готовятся к ЕГЭ?</p>-->
<!--              <textarea id="question10" name="question10" rows="4" cols="50"></textarea>-->



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