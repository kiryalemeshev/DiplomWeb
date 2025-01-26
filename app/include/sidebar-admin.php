<?php
$counterFile = 'counter.txt';
$counter = 0;
$resetMessage = ''; // Сообщение для вывода
// Функция для сброса счетчика
function resetCounter($file) {
    if (is_writable($file)) {
        if(file_put_contents($file, 0) !== false){
            return true;
        }else{
            error_log("Error: Unable to reset counter file.");
            return false;
        }
    }else{
        error_log("Error: counter file is not writable.");
        return false;
    }
}

// Проверяем, есть ли запрос на сброс
if (isset($_GET['reset']) && $_GET['reset'] === 'true') {
    if(resetCounter($counterFile)){
        $resetMessage = 'Счетчик посещений сброшен.';
    }else{
        $resetMessage = 'Ошибка при сбросе счетчика.';
    }
}

if (file_exists($counterFile) && is_readable($counterFile)) {
    $fileContent = file_get_contents($counterFile);
    if ($fileContent !== false && is_numeric($fileContent)) {
        $counter = (int) $fileContent;
    }else{
        error_log("Warning: Unable to read counter from file. Resetting to 0.");
        $counter = 0;
    }
} else {
    if (is_writable(dirname($counterFile))) {
        if (file_put_contents($counterFile, 0) === false) {
            error_log("Error: Unable to create counter file. Check directory permissions.");
        }
    } else {
        error_log("Error: Directory is not writable. Counter file cannot be created.");
    }
}
$counter++;
if (is_writable($counterFile)) {
    if (file_put_contents($counterFile, $counter) === false) {
        error_log("Error: Unable to write counter to file.");
    }
}else{
    error_log("Error: counter file is not writable.");
}
?>
<div class="row">
    <div class="sidebar col-3">
        <ul>
            <li>
                <a href="../../admin/posts/index.php">Опросы</a>
            </li>
            <li>
                <a href="../../admin/topics/index.php">Категории</a>
            </li>
            <li>
                <a href="../../admin/users/index.php">Пользователи</a>
            </li>
            <li>
                <a href="../../admin/comments/index.php">Вопросы</a>
            </li>
        </ul>
        <a style="color: white;">Количество посещений сайта: <?php echo $counter; ?></a>
        <?php if($resetMessage != '') : ?>
            <p style="color: white;"><?php echo $resetMessage; ?></p>
        <?php endif; ?>
        <br/>
        <a href="?reset=true" style="color: white;">Сбросить счетчик</a>

</div>