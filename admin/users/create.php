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
    <?php include "../../app/include/sidebar-admin.php";?>


        <div class="posts col-9">
            <div class="buttons row">
                <a href="<?php echo BASE_URL . "admin/users/create.php";?>" class="col-3 btn btn-success">Создать</a>
                <span  class="col-1"> </span>
                <a href="<?php echo BASE_URL . "admin/users/index.php";?>" class="col-3 btn btn-primary">Редактировать</a>

            </div>

            <div class="row title-table">
                <h2>Создание пользователя</h2>
            </div>

            <div class="row add-post">
                <form action="create.php" method="post">
                    <div class=col">
                        <label for="formGroupExampleInput" class="form-label">Ваш логин</label>
                        <input name="login" value="" type="text" class="form-control" id="formGroupExampleInput" placeholder="введите ваш логин...">

                    </div>
                    <div class="col">
                        <label for="exampleInputEmail1" class="form-label">Email</label>
                        <input name="mail"   value=""  type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="введите ваш email">

                    </div>
                    <div class="col">
                        <label for="exampleInputPassword1" class="form-label">Пароль</label>
                        <input name="pass-first" type="password" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="col">
                        <label for="exampleInputPassword2" class="form-label">Повторите пароль</label>
                        <input  name="pass-second" type="password" class="form-control" id="exampleInputPassword2">
                    </div>
                    <select class="form-select" aria-label="Default select example">
                        <option value="0">User</option>
                        <option value="1">Admin</option>


                    </select>
                    <div class="col">
                        <button class="btn btn-primary" type="submit">Создать</button>
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