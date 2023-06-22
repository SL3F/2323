<?php
// create.php

require_once 'config.php';
require_once 'models/Product.php';

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Отримання даних з форми створення
    $name = $_POST['name'];
    $price = $_POST['price'];

    // Перевірка обов'язкових полів
    if (empty($name) || empty($price)) {
        $error = 'Будь ласка, заповніть всі поля';
    } else {
        // Створення нового продукту
        $productModel = new Product();
        $result = $productModel->createProduct(['name' => $name, 'price' => $price]);

        if ($result) {
            // Редирект на сторінку зі списком продуктів
            header('Location: products.php');
            exit;
        } else {
            $error = 'Сталася помилка при створенні продукту';
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Додати новий продукт</title>
</head>
<body>
    <h1>Додати новий продукт</h1>
    <?php if (!empty($error)) : ?>
        <p><?php echo $error; ?></p>
    <?php endif; ?>
    <form action="create.php" method="POST">
        <label for="name">Назва:</label>
        <input type="text" name="name"><br>
        <label for="price">Ціна:</label>
        <input type="text" name="price"><br>
        <input type="submit" value="Додати">
    </form>
</body>
</html>
