<?php
require_once "../../app/database/db.php";  // подключаем ваш файл с подключением к базе данных

if (isset($_GET['id'])) {
    $postId = $_GET['id'];

    //  получаем данные поста из базы данных
    $stmt = $pdo->prepare("SELECT * FROM posts WHERE id = :id");
    $stmt->execute(['id' => $postId]);
    $post = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($post) {
        // Создаем CSV данные
        $filename = 'post_' . $postId . '.csv';

        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename="' . $filename . '"');

        // Открываем поток вывода с правильной кодировкой
        $output = fopen('php://output', 'w');

        // Добавляем BOM для правильной интерпретации UTF-8 в Excel
        fputs($output, chr(0xEF) . chr(0xBB) . chr(0xBF));

        // Записываем заголовок с разделителем ';'
        fputcsv($output, array_keys($post), ';');

        // Записываем данные с разделителем ';'
        fputcsv($output, $post, ';');

        fclose($output);
        exit();

    } else {
        echo "Post not found.";
    }

} else {
    echo "No post ID specified.";
}
?>