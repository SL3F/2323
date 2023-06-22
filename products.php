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
        <?php
        require_once 'config.php';
        require_once 'models/Product.php';
        
        // Отримання списку товарів з бази даних
        $products = Product::getAllProducts();
        
        // Виведення списку товарів
        foreach ($products as $product) {
            echo "<div class='product'>";
            echo "<h3>" . $product['name'] . "</h3>";
            echo "<p>" . $product['description'] . "</p>";
            echo "<p class='price'>" . $product['price'] . " грн</p>";
            echo "</div>";
        }
        ?>
    </main>
    
    <footer>
        <p>© 2023 Мій Інтернет-магазин. Усі права захищено.</p>
    </footer>
</body>
</html>