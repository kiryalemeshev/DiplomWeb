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
        .poll-form {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }
        .poll-form h3 {
            margin-bottom: 15px;
            color: #333;
        }
        .poll-form p {
            color: #555;
        }
        .poll-question {
            background-color: white;
            padding: 15px;
            border-radius: 6px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.08);
            margin-bottom: 15px;
            border: 1px solid #eee;
        }
        .poll-question label {
            color: #333;
            display: block;
            margin-bottom: 5px;
        }
        .poll-question .question-type {
            max-width: 200px;
        }
        .poll-question input[type="text"], .poll-question select {
            margin-bottom: 10px;
        }
        .answer-buttons {
            display: flex;
            gap: 10px;
            margin-top: 10px;
        }
        .answer-buttons button {
            font-size: 0.9rem;
        }
        .answer-container .form-label {
            margin-top: 5px;
            display: block;
        }
        .answer-group {
            margin-bottom: 10px;
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


                    <div class="col col-6">
                        <button name="add_post" class="btn btn-primary" type="submit">Добавить запись</button>
                    </div>

                    <!-- Form for poll -->
                    <div class="poll-form">
                        <h3>Создание опроса</h3>
                        <p>Минимум 10 вопросов</p>
                        <?php for ($i = 1; $i <= 10; $i++): ?>
                            <div class="mb-3 poll-question" data-question-id="<?=$i?>">
                                <label for="question<?=$i?>" class="form-label">Вопрос <?=$i?>:</label>
                                <input type="text" class="form-control question-text" name="question<?=$i?>" id="question<?=$i?>" placeholder="Введите вопрос <?=$i?>" required>
                                <div class="mb-3 mt-1">
                                    <label class="form-label">Тип вопроса:</label>
                                    <select name="question_type_<?=$i?>" class="form-select question-type"  aria-label="Тип вопроса" required>
                                        <option value="radio">Радиокнопки</option>
                                        <option value="checkbox">Чекбоксы</option>
                                        <option value="text">Текстовое поле</option>
                                    </select>
                                </div>
                                <div class="answer-container mt-1" id="answer-container-<?=$i?>">
                                    <div class="answer-group">
                                        <label for="answer1" class="form-label mt-1">Ответ 1:</label>
                                        <input type="text" class="form-control mt-1 answer-input" name="question<?=$i?>_answer1" id="answer1" placeholder="Введите вариант ответа 1">

                                        <label for="answer2" class="form-label mt-1">Ответ 2:</label>
                                        <input type="text" class="form-control mt-1 answer-input" name="question<?=$i?>_answer2" id="answer2" placeholder="Введите вариант ответа 2">
                                        <div class="answer-buttons mt-1">
                                            <button type="button" class="btn btn-outline-secondary add-answer" data-question="<?=$i?>">Добавить вариант ответа</button>
                                            <button type="button" class="btn btn-outline-danger remove-answer" data-question="<?=$i?>">Удалить последний вариант ответа</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endfor; ?>
                    </div>

                </form>
            </div>

            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    const pollForm = document.querySelector('.poll-form');
                    if (pollForm) {
                        pollForm.addEventListener('click', function(event) {
                            if (event.target.classList.contains('add-answer')) {
                                const questionId = event.target.getAttribute('data-question');
                                const answerContainer = document.getElementById(`answer-container-${questionId}`);
                                const answerNumber = answerContainer.querySelectorAll('.answer-group').length + 1;
                                if(answerNumber <= 5){

                                    const newAnswerGroup = document.createElement('div');
                                    newAnswerGroup.classList.add('answer-group');

                                    const newAnswerLabel = document.createElement('label');
                                    newAnswerLabel.classList.add('form-label', 'mt-1');
                                    newAnswerLabel.innerText = `Ответ ${answerNumber}:`;
                                    newAnswerGroup.appendChild(newAnswerLabel);


                                    const newAnswerInput = document.createElement('input');
                                    newAnswerInput.type = 'text';
                                    newAnswerInput.classList.add('form-control', 'mt-1', 'answer-input');
                                    newAnswerInput.name = `question${questionId}_answer${answerNumber}`;
                                    newAnswerInput.id = `answer${answerNumber}`;
                                    newAnswerInput.placeholder = `Введите вариант ответа ${answerNumber}`;
                                    newAnswerGroup.appendChild(newAnswerInput);


                                    answerContainer.appendChild(newAnswerGroup);
                                }
                                else{
                                    alert('максимум 5 вариантов ответа')
                                }


                            } else if (event.target.classList.contains('remove-answer')) {
                                const questionId = event.target.getAttribute('data-question');
                                const answerContainer = document.getElementById(`answer-container-${questionId}`);
                                const answerGroups = answerContainer.querySelectorAll('.answer-group');
                                if(answerGroups.length > 1){
                                    answerContainer.removeChild(answerGroups[answerGroups.length - 1]);
                                }
                            }
                        });


                        pollForm.addEventListener('change', function(event){
                            if(event.target.classList.contains('question-type')){
                                const questionType = event.target.value;
                                const questionContainer = event.target.closest('.poll-question');
                                const questionId = questionContainer.getAttribute('data-question-id');
                                const answerContainer = document.getElementById(`answer-container-${questionId}`);
                                const answerGroups = answerContainer.querySelectorAll('.answer-group');
                                if (questionType === 'text') {
                                    answerGroups.forEach(group => {
                                        group.querySelectorAll('input[type="text"]').forEach(input => {
                                            input.style.display = 'none';
                                            input.removeAttribute('required');
                                            input.value = '';
                                        });
                                        group.querySelectorAll('label').forEach(label => {
                                            label.style.display = 'none';
                                        });
                                    });
                                }
                                else {
                                    answerGroups.forEach(group => {
                                        group.querySelectorAll('input[type="text"]').forEach(input => {
                                            input.style.display = 'block';
                                            input.setAttribute('required', 'required');
                                        });
                                        group.querySelectorAll('label').forEach(label => {
                                            label.style.display = 'block';
                                        });
                                    });
                                }
                            }
                        });

                    }
                });
            </script>

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