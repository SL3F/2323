<?php
require_once 'config.php';
require_once 'models/News.php';

// Отримуємо id новини з параметру запиту
$id = $_GET['id'];

// Отримуємо об'єкт новини за її id
$news = News::getById($id);

// Обробка форми редагування новини
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];

    // Оновлення новини
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
    <title>Редагування новини</title>
</head>
<body>
    <h1>Редагування новини</h1>

    <form method="POST" action="edit_news.php?id=<?php echo $id; ?>">
        <label for="title">Заголовок:</label><br>
        <input type="text" id="title" name="title" value="<?php echo $news->getTitle(); ?>"><br><br>

        <label for="content">Зміст:</label><br>
        <textarea id="content" name="content"><?php echo $news->getContent(); ?></textarea><br><br>

        <input type="submit" value="Оновити">
    </form>
</body>
</html>
