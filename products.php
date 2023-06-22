<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Список продуктів</title>
    <!-- Підключення CSS стилів -->
    <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>
    <h1>Список продуктів</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Назва</th>
            <th>Ціна</th>
            <th>Дії</th>
        </tr>
        <?php foreach ($products as $product): ?>
            <tr>
                <td><?php echo $product['id']; ?></td>
                <td><?php echo $product['name']; ?></td>
                <td><?php echo $product['price']; ?></td>
                <td>
                    <a href="edit.php?id=<?php echo $product['id']; ?>">Редагувати</a>
                    <a href="delete.php?id=<?php echo $product['id']; ?>">Видалити</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <a href="create.php">Додати новий продукт</a>
</body>
</html>
