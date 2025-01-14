<?php
include SITE_ROOT . '/app/controllers/commentaries.php';

?>


<div class = "col-md-12 col-12 comments">
    <h3>Оставить свой вопрос</h3>
    <form action="<?=BASE_URL . "singleTEST.php?post=$page"?>" method="post">
        <input name="page" value="<?=$page;?>" type="hidden">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Email адрес</label>
            <input name="email" type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Место для вопроса</label>
            <textarea name="comment" class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
        </div>

        <button type="submit" name="goComment" class="btn btn-primary">Отправить</button>
    </form>
    <br><h3>Ваши вопросы:</h3>
    вывод через foreach
</div>