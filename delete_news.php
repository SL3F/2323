<?php
require_once 'config.php';
require_once 'models/News.php';

// Отримуємо id новини з параметру запиту
$id = $_GET['id'];

// Отримуємо об'єкт новини за її id
$news = News::getById($id);

// Видалення новини
$news->delete();

// Перенаправлення на сторінку зі списком новин
header('Location: news.php');
exit();
?>
