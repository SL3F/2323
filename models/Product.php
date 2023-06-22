<?php
// models/Product.php
require_once 'DbConnection.php';

class Product
{
    private $id;
    private $name;
    private $description;
    private $price;

    public function __construct($id, $name, $description, $price)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function save()
    {
        $connection = DbConnection::getInstance();
        $statement = $connection->prepare('UPDATE products SET name = ?, description = ?, price = ? WHERE id = ?');
        $statement->execute([$this->name, $this->description, $this->price, $this->id]);
    }

    public static function getById($id)
    {
        $connection = DbConnection::getInstance();
        $statement = $connection->prepare('SELECT * FROM products WHERE id = ?');
        $statement->execute([$id]);
        $row = $statement->fetch(PDO::FETCH_ASSOC);
        return new Product($row['id'], $row['name'], $row['description'], $row['price']);
    }

    public static function getAll()
    {
        $connection = DbConnection::getInstance();
        $statement = $connection->query('SELECT * FROM products');
        $products = [];
        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            $products[] = new Product($row['id'], $row['name'], $row['description'], $row['price']);
        }
        return $products;
    }

    public static function createProduct($data)
    {
        $connection = DbConnection::getInstance();
        $statement = $connection->prepare('INSERT INTO products (name, description, price) VALUES (?, ?, ?)');
        return $statement->execute([$data['name'], $data['description'], $data['price']]);
    }

public static function updateProduct($id, $data)
{
    $connection = DbConnection::getInstance();
    $statement = $connection->prepare('UPDATE products SET name = ?, description = ?, price = ? WHERE id = ?');
    return $statement->execute([$data['name'], $data['description'], $data['price'], $id]);
}

public static function deleteProduct($id)
{
    $connection = DbConnection::getInstance();
    $statement = $connection->prepare('DELETE FROM products WHERE id = ?');
    return $statement->execute([$id]);
}

}
?>