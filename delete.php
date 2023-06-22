<?php
// delete.php

require_once 'config.php';
require_once 'models/Product.php';

// Отримання ідентифікатора продукту з параметрів URL
$id = $_GET['id'];

// Видалення продукту
$productModel = new Product();
$result = $productModel->deleteProduct($id);

if ($result) {
    // Редирект на сторінку зі списком продуктів
    header('Location: products.php');
    exit;
}
?>
