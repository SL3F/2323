<?php
require_once 'config.php';
require_once 'models/Product.php';

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
    <title>Деталі товару - Мій Інтернет-магазин</title>
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
        <h2><?php echo $product->getName(); ?></h2>
        <p><?php echo $product->getDescription(); ?></p>
        <p class="price"><?php echo $product->getPrice(); ?> грн</p>
        <a href="edit.php?id=<?php echo $product->getId(); ?>">Редагувати</a>
        <a href="delete.php?id=<?php echo $product->getId(); ?>">Видалити</a>
    </main>
    
    <footer>
        <p>© 2023 Мій Інтернет-магазин. Усі права захищено.</p>
    </footer>
</body>
</html>
