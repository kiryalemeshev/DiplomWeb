<?php
require_once "../../app/database/db.php";

// SQL-запрос, который нужно выполнить.  Используем параметры для безопасности
$sql = "SELECT * FROM `opros` WHERE `Question_3` = :q3 OR `Question_4` = :q4 OR `Question_5` = :q5 OR `Question_6` = :q6 OR `Question_7` = :q7";

try {
    // Подготавливаем запрос
    $stmt = $pdo->prepare($sql);

    // Определяем параметры для подстановки в запрос. Важно для безопасности!
    $params = [
        'q3' => "Официальный сайт учебного заведения",
        'q4' => "Социальные сети учебного заведения",
        'q5' => "Телефонный звонок в приемную комиссию",
        'q6' => "Личный визит в приемную комиссию",
        'q7' => "Дни открытых дверей",
    ];

    // Выполняем запрос с параметрами
    $stmt->execute($params);

    // Получаем все результаты запроса в виде ассоциативного массива
    $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($posts) {
        // Создаем CSV данные
        $filename = 'opros_results.csv'; // Более общее имя, так как это не один пост

        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename="' . $filename . '"');

        // Открываем поток вывода с правильной кодировкой
        $output = fopen('php://output', 'w');

        // Добавляем BOM для правильной интерпретации UTF-8 в Excel
        fputs($output, chr(0xEF) . chr(0xBB) . chr(0xBF));

        // Записываем заголовок (если есть хотя бы один результат)
        if (count($posts) > 0) {
            fputcsv($output, array_keys($posts[0]), ';'); // Используем ключи первого элемента
        }


        // Записываем данные
        foreach ($posts as $post) {
            fputcsv($output, $post, ';');
        }

        fclose($output);
        exit();

    } else {
        echo "No matching records found.";
    }

} catch (PDOException $e) {
    // Обработка ошибок подключения к базе данных и выполнения запроса
    echo "Database error: " . $e->getMessage();
}
?>