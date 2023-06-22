<?php
require_once 'config.php';
require_once 'models/Product.php';

// Отримуємо id товару з параметру запиту
$id = $_GET['id'];

// Отримуємо об'єкт товару за його id
$product = Product::getById($id);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Деталі товару</title>
</head>
<body>
    <h1>Деталі товару</h1>

    <h2><?php echo $product->getName(); ?></h2>
    <p>Опис: <?php echo $product->getDescription(); ?></p>
    <p>Ціна: <?php echo $product->getPrice(); ?></p>

    <a href="edit.php?id=<?php echo $product->getId(); ?>">Редагувати</a>
    <a href="delete.php?id=<?php echo $product->getId(); ?>">Видалити</a>
</body>
</html>
