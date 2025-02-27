<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once "../../app/database/db.php";

// Запрос к базе данных
$sql = "SELECT
    SUM(CASE WHEN `Question_10` = 'Полнота и точность предоставляемой информации' THEN 1 ELSE 0 END) AS Question_10_Count,
    SUM(CASE WHEN `Question_11` = 'Скорость ответа на вопросы' THEN 1 ELSE 0 END) AS Question_11_Count,
    SUM(CASE WHEN `Question_12` = 'Дружелюбие и вежливость сотрудников' THEN 1 ELSE 0 END) AS Question_12_Count,
    SUM(CASE WHEN `Question_2` IN ('Легко', 'Скорее легко, чем сложно') THEN 1 ELSE 0 END) AS Question_2_Easy_Count,
    SUM(CASE WHEN `Question_2` IN ('Скорее сложно, чем легко', 'Сложно', 'Ничего не понятно') THEN 1 ELSE 0 END) AS Question_2_Difficult_Count,
    SUM(CASE WHEN `Question_3` = 'Официальный сайт учебного заведения' THEN 1 ELSE 0 END) AS Question_3_Count,
    SUM(CASE WHEN `Question_4` = 'Социальный сети учебного заведения' THEN 1 ELSE 0 END) AS Question_4_Count,
    SUM(CASE WHEN `Question_5` = 'Телефонный звонок в приемную комиссию' THEN 1 ELSE 0 END) AS Question_5_Count,
    SUM(CASE WHEN `Question_6` = 'Личный визит в приемную комиссию' THEN 1 ELSE 0 END) AS Question_6_Count,
    SUM(CASE WHEN `Question_7` = 'Дни открытых дверей' THEN 1 ELSE 0 END) AS Question_7_Count
FROM `opros`";

$stmt = $pdo->query($sql);
$result = $stmt->fetch(PDO::FETCH_ASSOC);

if ($result) {
    // Подготавливаем данные для диаграммы
    $labels = [
        'Полнота и точность',
        'Скорость ответа',
        'Дружелюбие и вежливость',
        'Легкость (Легко/Скорее легко)',
        'Сложность (Сложно/Скорее сложно/Непонятно)',
        'Официальный сайт',
        'Соц. сети',
        'Телефонный звонок',
        'Личный визит',
        'Дни открытых дверей'
    ];

    $values = [
        $result['Question_10_Count'],
        $result['Question_11_Count'],
        $result['Question_12_Count'],
        $result['Question_2_Easy_Count'],
        $result['Question_2_Difficult_Count'],
        $result['Question_3_Count'],
        $result['Question_4_Count'],
        $result['Question_5_Count'],
        $result['Question_6_Count'],
        $result['Question_7_Count']
    ];

    $chartData = [
        'labels' => $labels,
        'datasets' => [
            [
                'label' => 'Количество ответов',
                'data' => $values,
                'backgroundColor' => [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(199, 199, 199, 0.2)',
                    'rgba(83, 102, 255, 0.2)',
                    'rgba(255, 99, 255, 0.2)',
                    'rgba(99, 255, 132, 0.2)'
                ],
                'borderColor' => [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(199, 199, 199, 1)',
                    'rgba(83, 102, 255, 1)',
                    'rgba(255, 99, 255, 1)',
                    'rgba(99, 255, 132, 1)'
                ],
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
        <title>Анализ ответов</title>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <link rel="icon" type="image/png" href="../../assets/icons/logo_main.png">
        <style>
            #chart {
                width: 800px; /* Увеличили ширину */
                height: 800px; /* Увеличили высоту */
            }
            .data-info {
                margin-top: 20px;
                padding: 10px;
                border: 1px solid #ccc;
                background-color: #f9f9f9;
                width: 800px; /* Ширина блока с информацией */
            }
            .data-info h2 {
                margin-top: 0;
            }
            .data-info ul {
                list-style-type: none;
                padding: 0;
            }
            .data-info ul li {
                margin: 5px 0;
            }
        </style>
    </head>
    <body>
    <h1>Анализ ответов на вопросы</h1>
    <canvas id="chart"></canvas>

    <div class="data-info">
        <h2>Данные диаграммы</h2>
        <ul id="data-list"></ul>
    </div>

    <script>
        const chartData = <?php echo $chartDataJson; ?>;

        // Динамически заполняем список данными
        const dataList = document.getElementById('data-list');
        chartData.labels.forEach((label, index) => {
            const li = document.createElement('li');
            li.innerHTML = `<strong>${label}:</strong> ${chartData.datasets[0].data[index]} ответов`;
            dataList.appendChild(li);
        });

        // Создаем круговую диаграмму
        const ctx = document.getElementById('chart').getContext('2d');
        try {
            new Chart(ctx, {
                type: 'pie', // Используем круговую диаграмму
                data: chartData,
                options: {
                    responsive: false, // Отключаем автоматическое изменение размера
                    plugins: {
                        legend: {
                            position: 'top', // Позиция легенды
                        },
                        title: {
                            display: true,
                            text: 'Количество ответов по критериям',
                            font: {
                                size: 18 // Увеличили размер заголовка
                            }
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
} else {
    echo "Нет данных, соответствующих запросу.";
}
?>