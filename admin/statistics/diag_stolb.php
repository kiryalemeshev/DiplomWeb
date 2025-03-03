<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once "../../app/database/db.php";

// Запрос к базе данных
$sql = "SELECT * FROM `opros` 
        WHERE `Question_10` = 'Полнота и точность предоставляемой информации' 
        OR `Question_11` = 'Скорость ответа на вопросы' 
        OR `Question_12` = 'Дружелюбие и вежливость сотрудников' 
        OR `Question_2` IN ('Легко', 'Скорее легко, чем сложно', 'Скорее сложно, чем легко', 'Сложно', 'Ничего не понятно') 
        OR `Question_3` = 'Официальный сайт учебного заведения' 
        OR `Question_4` = 'Социальный сети учебного заведения' 
        OR `Question_5` = 'Телефонный звонок в приемную комиссию' 
        OR `Question_6` = 'Личный визит в приемную комиссию' 
        OR `Question_7` = 'Дни открытых дверей'";

$stmt = $pdo->query($sql);
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($results) {
    // Подготовка данных для диаграммы
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

    // Инициализация счетчиков
    $counts = array_fill(0, count($labels), 0);

    // Подсчет ответов
    foreach ($results as $row) {
        if ($row['Question_10'] === 'Полнота и точность предоставляемой информации') {
            $counts[0]++;
        }
        if ($row['Question_11'] === 'Скорость ответа на вопросы') {
            $counts[1]++;
        }
        if ($row['Question_12'] === 'Дружелюбие и вежливость сотрудников') {
            $counts[2]++;
        }
        if (in_array($row['Question_2'], ['Легко', 'Скорее легко, чем сложно'])) {
            $counts[3]++;
        }
        if (in_array($row['Question_2'], ['Скорее сложно, чем легко', 'Сложно', 'Ничего не понятно'])) {
            $counts[4]++;
        }
        if ($row['Question_3'] === 'Официальный сайт учебного заведения') {
            $counts[5]++;
        }
        if ($row['Question_4'] === 'Социальный сети учебного заведения') {
            $counts[6]++;
        }
        if ($row['Question_5'] === 'Телефонный звонок в приемную комиссию') {
            $counts[7]++;
        }
        if ($row['Question_6'] === 'Личный визит в приемную комиссию') {
            $counts[8]++;
        }
        if ($row['Question_7'] === 'Дни открытых дверей') {
            $counts[9]++;
        }
    }

    // Подготовка данных для диаграммы
    $chartData = [
        'labels' => $labels,
        'datasets' => [
            [
                'label' => 'Количество ответов',
                'data' => $counts,
                'backgroundColor' => [
                    'rgba(255, 99, 132, 0.5)',
                    'rgba(54, 162, 235, 0.5)',
                    'rgba(75, 192, 192, 0.5)',
                    'rgba(153, 102, 255, 0.5)',
                    'rgba(255, 159, 64, 0.5)',
                    'rgba(201, 203, 207, 0.5)',
                    'rgba(255, 205, 86, 0.5)',
                    'rgba(75, 0, 0, 0.5)',
                    'rgba(0, 255, 0, 0.5)',
                    'rgba(0, 0, 255, 0.5)'
                ],
                'borderColor' => [
                    'rgb(255, 99, 132)',
                    'rgb(54, 162, 235)',
                    'rgb(75, 192, 192)',
                    'rgb(153, 102, 255)',
                    'rgb(255, 159, 64)',
                    'rgb(201, 203, 207)',
                    'rgb(255, 205, 86)',
                    'rgb(75, 0, 0)',
                    'rgb(0, 255, 0)',
                    'rgb(0, 0, 255)'
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
                width: 1200px; /* Увеличили ширину */
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
    <h1>Опрос о доступности и удобстве</h1>
    <canvas id="chart"></canvas>

    <div class="data-info">
        <h2>Данные диаграммы</h2>
        <p>1. Какие из следующих аспектов работы приемной комиссии кажутся вам наиболее важными?</p>
        <p>2. Какие каналы связи вы использовали для получения информации о поступлении?</p>
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

        // Создаем столбчатую диаграмму
        const ctx = document.getElementById('chart').getContext('2d');
        try {
            new Chart(ctx, {
                type: 'bar', // Используем столбчатую диаграмму
                data: chartData,
                options: {
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                callback: function (value) {
                                    if (value % 1 === 0) { // Показывать только целые числа
                                        return value;
                                    }
                                }
                            },
                            title: {
                                display: true,
                                text: 'Количество ответов'
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            display: false
                        },
                        title: {
                            display: true,
                            text: 'Количество ответов по критериям',
                            font: {
                                size: 18 // Увеличили размер заголовка
                            }
                        }
                    },
                    responsive: false // Отключаем автоматическое изменение размера
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