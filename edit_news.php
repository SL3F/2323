<?php
require_once 'config.php';
require_once 'models/News.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $content = $_POST['content'];

    $news = News::getById($id);
    if ($news) {
        $news->setTitle($title);
        $news->setContent($content);
        $news->save();
        header('Location: news.php');
        exit();
    }
}

$id = $_GET['id'];
$news = News::getById($id);

if (!$news) {
    header('Location: news.php');
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Редагувати новину - Мій Інтернет-магазин</title>
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
        <h2>Редагувати новину</h2>
        <form method="POST" action="">
            <input type="hidden" name="id" value="<?php echo $news->getId(); ?>">
            <label for="title">Заголовок:</label>
            <input type="text" name="title" value="<?php echo $news->getTitle(); ?>"><br>
            <label for="content">Зміст:</label>
            <textarea name="content"><?php echo $news->getContent(); ?></textarea><br>
            <input type="submit" value="Зберегти">
        </form>
    </main>
    
    <footer>
        <p>© 2023 Мій Інтернет-магазин. Усі права захищено.</p>
    </footer>
</body>
</html>
