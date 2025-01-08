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
            <h2>Редактирование опроса</h2>
        </div>

        <div class="row add-post">
            <div class="mb-12 col-12 col-md-12 err">
                <!-- Вывод массива с ошибками -->
                <?php  include "../../app/helps/errorinfo.php"; ?>
            </div>
        </div>

        <div class="row add-post">
            <form action="edit.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?=$id;?>">
                <div class="col mb-4">
                    <input value="<?=$post['title']; ?>" name= "title" type="text" class="form-control" placeholder="Title" aria-label="Название статьи">
                </div>
                <div class="col ">
                    <label  class="form-label">Содержимое записи</label>
                    <textarea  name="content" id="text" class="form-control"  rows="6"><?=$post['content']; ?> </textarea>
                </div>


                <div class="input-group col mb-4">
                    <input name="img" type="file" class="form-control" id="inputGroupFile02" onchange="saveImage(this.files)">
                    <label class="input-group-text" for="inputGroupFile02">Upload</label>
                </div>

                <input type="hidden" name="image_data_url" id="imageDataUrl" value="">

                <img id="previewImg" src="" alt="Uploaded Image" style="max-width: 100%; max-height: 200px;" />




                <select name="topic" class="form-select mb-4" aria-label="Default select example">


                    <?php foreach ($topics as $key => $topic): ?>
                        <option value="<?=$topic['id'];?>"><?=$topic['name'];?></option>
                    <?php endforeach; ?>
                </select>

                <div class="form-check">
                    <?php if (empty($publish) && $publish == 0): ?>

                        <input name="publish" class="form-check-input" type="checkbox" id="flexCheckChecked">
                        <label class="form-check-label" for="flexCheckChecked">
                            Publish
                        </label>
                    <?php else: ?>
                    <input name="publish" class="form-check-input" type="checkbox" id="flexCheckChecked" checked>
                    <label class="form-check-label" for="flexCheckChecked">
                        Publish
                    </label>
                    <?php endif; ?>

                </div><br>

                <div class="col col-6">
                    <button name="edit_post" class="btn btn-primary" type="submit">Сохранить запись</button>
                </div>
            </form>
        </div>

    </div>

</div>
</div>



<?php include("../../app/include/footer.php"); ?>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<!-- Добавление визуального редактора к ареа админки-->


<script>
    function saveImage(files) {
        if (files && files.length > 0) {
            const file = files[0];

            const reader = new FileReader();

            reader.onload = function(e) {
                const dataURL = e.target.result;
                localStorage.setItem('savedImage', dataURL);
                document.getElementById('previewImg').src = dataURL;
                document.getElementById('imageDataUrl').value = dataURL; // Запишем Data URL в скрытое поле формы
            };

            reader.readAsDataURL(file);
        }
    }

    window.addEventListener('DOMContentLoaded', () => {
        const savedImage = localStorage.getItem('savedImage');

        if (savedImage) {
            document.getElementById('previewImg').src = savedImage;
            document.getElementById('imageDataUrl').value = savedImage; // Установим значение скрытого поля из localStorage
        }
    });
</script>

</body>
</html>