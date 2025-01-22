<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once "../../app/database/db.php";



if (isset($_GET['id'])) {
    $postId = $_GET['id'];

    // Получаем все поля записи
    $stmt = $pdo->prepare("SELECT * FROM posts WHERE id = :id");
    $stmt->execute(['id' => $postId]);
    $post = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($post) {
        // Фильтруем поля, оставляя только числовые
        $filteredData = [];
        foreach ($post as $key => $value) {
            if (is_numeric($value)) {
                $filteredData[$key] = $value;
            }
        }

        // Проверяем, есть ли вообще числовые данные
        if (empty($filteredData)) {
            echo "Нет числовых данных для отображения.";
            exit;
        }

        $labels = array_keys($filteredData);
        $values = array_values($filteredData);

        // Подготавливаем данные для диаграммы
        $chartData = [
            'labels' => $labels,
            'datasets' => [
                [
                    'label' => 'Значения полей',
                    'data' => $values,
                    'backgroundColor' => 'rgba(54, 162, 235, 0.5)',
                    'borderColor' => 'rgb(54, 162, 235)',
                    'borderWidth' => 1
                ]
            ]
        ];
        $chartDataJson = json_encode($chartData, JSON_UNESCAPED_UNICODE);

        ?>
        <!DOCTYPE html>
        <html lang="ru">
        <head>
            <meta charset="UTF-8">
            <title>Анализ записи</title>
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <link rel="icon" type="image/png" href="../../assets/icons/logo_main.png">
        </head>
        <body>
        <canvas id="chart"></canvas>
        <pre id="data-container"></pre>

        <script>
            const chartData = <?php echo $chartDataJson; ?>;
            document.getElementById('data-container').innerText = JSON.stringify(chartData, null, 2);
            console.log(chartData);
            const ctx = document.getElementById('chart').getContext('2d');
            try {
                new Chart(ctx, {
                    type: 'bar',
                    data : chartData,
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            } catch (e) {
                console.error("Ошибка при создании диаграммы:", e);
            }
        </script>
        </body>
        </html>
        <?php
        exit();
    } else {
        echo "Post not found.";
    }
} else {
    echo "No post ID specified.";
}
?>