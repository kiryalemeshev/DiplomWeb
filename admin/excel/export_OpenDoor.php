<?php
require_once "../../app/database/db.php";  // подключаем ваш файл с подключением к базе данных

// SQL-запрос, который нужно выполнить.  Используем параметры для безопасности
$sql = "SELECT * FROM `opros` WHERE `Question_10` = :q10 OR `Question_11` = :q11 OR `Question_12` = :q12";

try {
    // Подготавливаем запрос
    $stmt = $pdo->prepare($sql);

    // Определяем параметры для подстановки в запрос. Важно для безопасности!
    $params = [
        'q10' => "Близость ВУЗа к дому, В этом ВУЗе обучались мои родители, родственники",
        'q11' => "Возможность проявить себя как творческую и социальную личность (спорт, КВН и т.д.)",
        'q12' => "Возможность хорошо устроиться на работу, Возможность бесплатного поступления и бесплатного обучения",
    ];

    // Выполняем запрос с параметрами
    $stmt->execute($params);

    // Получаем все результаты запроса в виде ассоциативного массива
    $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($posts) {
        // Создаем CSV данные
        $filename = 'opros_results_6.csv'; // Другое имя файла, чтобы не перезаписать

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