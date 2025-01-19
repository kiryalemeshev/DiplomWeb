<?php
include SITE_ROOT . '/app/controllers/commentaries.php';

?>

<style>
    .red-text {
        color: red;
    }
</style>

<div class = "col-md-12 col-12 comments">
    <h3>Оставить свой вопрос <span class="red-text">(минимум 20 символов!)</span></h3>
    <form action="<?=BASE_URL . "singleTEST.php?post=$page"?>" method="post">
        <input name="page" value="<?=$page;?>" type="hidden">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Email адрес</label>
            <input name="email" type="email"  class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Место для вопроса</label>
            <textarea name="comment" class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
        </div>

        <button type="submit" name="goComment" class="btn btn-primary">Отправить</button>
    </form>
    <?php if (count($comments) > 0) : ?>
    <div class="row all-comments">
    <h3 class="col-12">Ваши вопросы:</h3>
        <?php foreach ($comments as $comment) : ?>
        <div class = "one-comment col-12">
            <span><img src="assets/icons/email.png" width="30px" height="30px"><?=$comment['email'] ?></span>
            <span><img src="assets/icons/calendar.png" width="30px" height="30px"><?=$comment['created_date'] ?></span>
            <div class="col-12 text">
                <?=$comment['comment'] ?>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    <?php endif; ?>

</div>