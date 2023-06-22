<?php
require_once 'config.php';
require_once 'models/News.php';

$news = News::getAll();

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
        <?php foreach ($news as $item): ?>
            <div class="news-item">
                <h3><?php echo $item->getTitle(); ?></h3>
                <p><?php echo $item->getContent(); ?></p>
                <p class="date"><?php echo $item->getDate(); ?></p>
                <a href="edit_news.php?id=<?php echo $item->getId(); ?>">Редагувати</a>
                <a href="delete_news.php?id=<?php echo $item->getId(); ?>">Видалити</a>
            </div>
        <?php endforeach; ?>
    </main>
    
    <footer>
        <p>© 2023 Мій Інтернет-магазин. Усі права захищено.</p>
    </footer>
</body>
</html>
