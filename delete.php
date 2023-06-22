<?php
require_once 'config.php';
require_once 'models/Product.php';

$id = $_GET['id'];
$product = Product::getById($id);

if ($product) {
    $product->delete();
}

header('Location: products.php');
exit();
?>
