<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once "../../app/database/db.php";

// Запрос к базе данных
$sql = "SELECT
    SUM(CASE WHEN `Question_12` = 'Наличие студенческого клуба/культурного центра' THEN 1 ELSE 0 END) AS Question_12_Count,
    SUM(CASE WHEN `Question_11` = 'Размер стипендии' THEN 1 ELSE 0 END) AS Question_11_Count,
    SUM(CASE WHEN `Question_10` = 'Наличие и качество общежития' THEN 1 ELSE 0 END) AS Question_10_Count,
    SUM(CASE WHEN `Question_7` = 'Возможности для участия в международных программах обмена' THEN 1 ELSE 0 END) AS Question_7_Count,
    SUM(CASE WHEN `Question_6` = 'Список доступных научных проектов и исследований' THEN 1 ELSE 0 END) AS Question_6_Count,
    SUM(CASE WHEN `Question_5` = 'Примеры учебных планов и программ' THEN 1 ELSE 0 END) AS Question_5_Count,
    SUM(CASE WHEN `Question_4` = 'Отзывы студентов и выпускников' THEN 1 ELSE 0 END) AS Question_4_Count,
    SUM(CASE WHEN `Question_3` = 'Подробная информация о трудоустройстве выпускников' THEN 1 ELSE 0 END) AS Question_3_Count
FROM `opros`";

$stmt = $pdo->query($sql);
$result = $stmt->fetch(PDO::FETCH_ASSOC);

if ($result) {
    // Подготавливаем данные для диаграммы
    $labels = [
        'Наличие студенческого клуба/культурного центра',
        'Размер стипендии',
        'Наличие и качество общежития',
        'Возможности для участия в международных программах обмена',
        'Список доступных научных проектов и исследований',
        'Примеры учебных планов и программ',
        'Отзывы студентов и выпускников',
        'Подробная информация о трудоустройстве выпускников'
    ];

    $values = [
        $result['Question_12_Count'],
        $result['Question_11_Count'],
        $result['Question_10_Count'],
        $result['Question_7_Count'],
        $result['Question_6_Count'],
        $result['Question_5_Count'],
        $result['Question_4_Count'],
        $result['Question_3_Count']
    ];

    $chartData = [
        'labels' => $labels,
        'datasets' => [
            [
                'label' => 'Количество ответов',
                'data' => $values,
                'borderColor' => 'rgb(75, 192, 192)', // Цвет линии
                'backgroundColor' => 'rgba(75, 192, 192, 0.2)', // Цвет заполнения под линией
                'borderWidth' => 3, // Толщина линии
                'pointRadius' => 5, // Размер точек
                'fill' => false // Не закрашивать область под линией
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
    <h1>Опрос о потребностях и ожиданиях</h1>
    <canvas id="chart"></canvas>

    <div class="data-info">
        <h2>Данные диаграммы</h2>
        <p>1. Какие аспекты условий обучения для вас наиболее важны?</p>
        <p>2. Какая информация, помимо уже представленной на сайте, была бы для вас наиболее полезной при принятии решения о поступлении?</p>
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

        // Создаем линейную диаграмму
        const ctx = document.getElementById('chart').getContext('2d');
        try {
            new Chart(ctx, {
                type: 'line', // Используем линейную диаграмму
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
                        },
                        x: {
                            grid: {
                                display: false // Скрыть сетку по оси X
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
                    elements: {
                        line: {
                            tension: 0.4 // Сглаживание линии
                        },
                        point: {
                            radius: 5 // Размер точек
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