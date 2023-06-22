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
