<?php
// index.php

require_once 'config.php';
require_once 'models/Product.php';

// Приклад створення нового продукту
$productData = [
    'name' => 'Новий продукт',
    'description' => 'Опис нового продукту',
    'price' => 19.99
];
$newProductId = Product::createProduct($productData);
if ($newProductId !== false) {
    echo "Продукт успішно створений з ID: " . $newProductId;
} else {
    echo "Не вдалося створити продукт.";
}

// Приклад оновлення інформації про продукт
$productToUpdateId = 1; // ID продукту, який потрібно оновити
$updateData = [
    'name' => 'Оновлена назва',
    'description' => 'Оновлений опис',
    'price' => 24.99
];
if (Product::updateProduct($productToUpdateId, $updateData)) {
    echo "Інформація про продукт успішно оновлена.";
} else {
    echo "Не вдалося оновити інформацію про продукт.";
}

// Приклад видалення продукту
$productToDeleteId = 2; // ID продукту, який потрібно видалити
if (Product::deleteProduct($productToDeleteId)) {
    echo "Продукт успішно видалений.";
} else {
    echo "Не вдалося видалити продукт.";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Мій Інтернет-магазин</title>
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
        <h2>Ласкаво просимо до нашого Інтернет-магазину!</h2>
        <p>Тут ви знайдете великий вибір товарів за доступними цінами.</p>
    </main>
    
    <footer>
        <p>© 2023 Мій Інтернет-магазин. Усі права захищено.</p>
    </footer>
</body>
</html>
