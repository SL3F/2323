<?php
require_once 'config.php';
require_once 'models/Product.php';

$products = Product::getAll();

?>

<!DOCTYPE html>
<html>
<head>
    <title>Товари - Мій Інтернет-магазин</title>
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
        <h2>Наші товари</h2>
        <?php foreach ($products as $product): ?>
            <div class='product'>
                <h3><?php echo $product->getName(); ?></h3>
                <p><?php echo $product->getDescription(); ?></p>
                <p class='price'><?php echo $product->getPrice(); ?> грн</p>
            </div>
        <?php endforeach; ?>
    </main>
    
    <footer>
        <p>© 2023 Мій Інтернет-магазин. Усі права захищено.</p>
    </footer>
</body>
</html>
