<?php
require_once 'config.php';
require_once 'models/Product.php';

// Отримуємо id товару з параметру запиту
$id = $_GET['id'];

// Отримуємо дані товару з бази даних
$product = Product::getById($id);

// Перевіряємо, чи були відправлені дані форми
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Отримуємо оновлені дані з форми
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    // Оновлюємо дані товару
    $product->setName($name);
    $product->setDescription($description);
    $product->setPrice($price);
    $product->save();

    // Перенаправляємо на список товарів після оновлення
    header('Location: products.php');
    exit();
}
?>

<!-- Форма для редагування товару -->
<form method="POST" action="">
    <label for="name">Назва:</label>
    <input type="text" id="name" name="name" value="<?php echo $product->getName(); ?>"><br>

    <label for="description">Опис:</label>
    <textarea id="description" name="description"><?php echo $product->getDescription(); ?></textarea><br>

    <label for="price">Ціна:</label>
    <input type="text" id="price" name="price" value="<?php echo $product->getPrice(); ?>"><br>

    <input type="submit" value="Оновити">
</form>
