<header class="container-fluid">
    <div class="container">
        <div class = "row">
            <div class="col-4">
                <h1>
                    <a href="<?php echo BASE_URL ?>">Интервьюирование</a></h1>
            </div>
            <nav class="col-8">
                <ul>
                    <li><a href="<?php echo BASE_URL ?>">
                            <img src="assets/icons/home.png" alt="Главная" style="width: 30px; height: 30px;" />
                            Главная
                        </a></li>
                    <li><a href="#">
                            <img src="assets/icons/mobile.png" alt="Контакты приемной комиссии" style="width: 30px; height: 30px;" />
                            Контакты приемной комиссии
                        </a></li>
                    <li><a href="#">
                            <img src="assets/icons/usluga.png" alt="Контакты приемной комиссии" style="width: 30px; height: 30px;" />
                            Услуги
                        </a></li>
                    <li>
                        <?php if (isset($_SESSION['id'])): ?>
                            <a href="#">
                                <img src="assets/icons/user.png" alt="Кабинет" style="width: 30px; height: 30px;" />
                                <?php echo $_SESSION['login'];  ?>
                            </a>
                            <ul>
                                <?php if ($_SESSION['admin']): ?>
                                <li><a href="#">Админ панель</a></li>
                                <?php endif; ?>
                                <li><a href="<?php echo BASE_URL . "logout.php"; ?>">Выход</a></li>
                            </ul>
                        <?php else: ?>
                            <a href="<?php echo BASE_URL . "log.php"; ?>">
                                <img src="assets/icons/user.png" alt="Кабинет" style="width: 30px; height: 30px;" />
                                Войти
                            </a>
                                <ul>
                                    <li><a href="<?php echo BASE_URL . "reg.php"; ?>">Регистрация</a></li>
                                </ul>

                        <?php endif; ?>

                    </li>
                </ul>
            </nav>
        </div>
    </div>
</header>
