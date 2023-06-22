<?php
require_once 'config.php';
require_once 'models/Product.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    $product = Product::getById($id);
    if ($product) {
        $product->setName($name);
        $product->setDescription($description);
        $product->setPrice($price);
        $product->save();
        header('Location: products.php');
        exit();
    }
}

$id = $_GET['id'];
$product = Product::getById($id);

if (!$product) {
    header('Location: products.php');
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Редагувати товар - Мій Інтернет-магазин</title>
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
        <h2>Редагувати товар</h2>
        <form method="POST" action="">
            <input type="hidden" name="id" value="<?php echo $product->getId(); ?>">
            <label for="name">Назва:</label>
            <input type="text" name="name" value="<?php echo $product->getName(); ?>"><br>
            <label for="description">Опис:</label>
            <textarea name="description"><?php echo $product->getDescription(); ?></textarea><br>
            <label for="price">Ціна:</label>
            <input type="text" name="price" value="<?php echo $product->getPrice(); ?>"><br>
            <input type="submit" value="Зберегти">
        </form>
    </main>
    
    <footer>
        <p>© 2023 Мій Інтернет-магазин. Усі права захищено.</p>
    </footer>
</body>
</html>
