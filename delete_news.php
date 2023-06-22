<?php
require_once 'config.php';
require_once 'models/News.php';

$id = $_GET['id'];
$news = News::getById($id);

if ($news) {
    $news->delete();
}

header('Location: news.php');
exit();
?>
