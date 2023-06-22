<?php
require_once 'config.php';
require_once 'models/News.php';

// Отримуємо список новин з бази даних
$newsList = News::getAll();

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Новини</title>
</head>
<body>
    <h1>Новини</h1>

    <ul>
        <?php foreach ($newsList as $news): ?>
            <li><?php echo $news->getTitle(); ?></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
