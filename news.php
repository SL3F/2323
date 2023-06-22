<?php
require_once 'config.php';
require_once 'models/News.php';

// Отримуємо список новин з бази даних
$newsList = News::getAll();

?>

<!DOCTYPE html>
<html>
<head>
    <title>Новини - Мій Інтернет-магазин</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <header>
        <h1>Мій Інтернет-магазин</h1>
    </header>
    
    <nav>
        <ul>
            <li><a href="index.php">Головна</a></li>
            <li><a href="products.php">Товари</a></li>
            <li><a href="news.php">Новини</a></li>
        </ul>
    </nav>
    
    <main>
        <h2>Новини</h2>
        <?php
        // Виведення списку новин з бази даних
        foreach ($news as $item) {
            echo "<div class='news-item'>";
            echo "<h3>" . $item['title'] . "</h3>";
            echo "<p>" . $item['content'] . "</p>";
            echo "<p class='date'>Дата публікації: " . $item['publish_date'] . "</p>";
            echo "</div>";
        }
        ?>
    </main>
    
    <footer>
        <p>© 2023 Мій Інтернет-магазин. Усі права захищено.</p>
    </footer>
</body>
</html>

