<?php
// edit.php

require_once 'config.php';
require_once 'models/Product.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Отримання даних з форми редагування
    $id = $_POST['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];

    // Оновлення продукту
    $productModel = new Product();
    $result = $productModel->updateProduct($id, ['name' => $name, 'price' => $price]);

    if ($result) {
        // Редирект на сторінку зі списком продуктів
        header('Location: products.php');
        exit;
    }
} else {
    // Отримання ідентифікатора продукту з параметрів URL
    $id = $_GET['id'];

    // Отримання даних про продукт за ідентифікатором
    $productModel = new Product();
    $product = $productModel->getProductById($id);

    if (!$product) {
        // Якщо продукт не знайдено, редирект на сторінку зі списком продуктів
        header('Location: products.php');
        exit;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Редагувати продукт</title>
</head>
<body>
    <h1>Редагувати продукт</h1>
    <form action="edit.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
        <label for="name">Назва:</label>
        <input type="text" name="name" value="<?php echo $product['name']; ?>"><br>
        <label for="price">Ціна:</label>
        <input type="text" name="price" value="<?php echo $product['price']; ?>"><br>
        <input type="submit" value="Зберегти">
    </form>
</body>
</html>
