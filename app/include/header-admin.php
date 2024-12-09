<header class="container-fluid">
    <div class="container">
        <div class = "row">
            <div class="col-4">
                <h1>
                    <a href="<?php echo BASE_URL ?>">Интервьюирование</a></h1>
            </div>
            <nav class="col-8">
                <ul>
                    <li>
                            <a href="#">
                                <img src="../../assets/icons/user.png" alt="Кабинет" style="width: 30px; height: 30px;" />
                                <?php echo $_SESSION['login'];  ?>
                            </a>
                    </li>

                    <li>
                        <a href="<?php echo BASE_URL . "logout.php"; ?>">Выход</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</header>
