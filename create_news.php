<?php
require_once 'config.php';
require_once 'models/News.php';

// Обробка форми створення новини
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];

    // Створення нової новини
    $news = new News();
    $news->setTitle($title);
    $news->setContent($content);
    $news->save();

    // Перенаправлення на сторінку зі списком новин
    header('Location: news.php');
    exit();
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Створення новини</title>
</head>
<body>
    <h1>Створення новини</h1>

    <form method="POST" action="create_news.php">
        <label for="title">Заголовок:</label><br>
        <input type="text" id="title" name="title"><br><br>

        <label for="content">Зміст:</label><br>
        <textarea id="content" name="content"></textarea><br><br>

        <input type="submit" value="Створити">
    </form>
</body>
</html>
