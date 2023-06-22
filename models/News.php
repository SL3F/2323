<?php

class News
{
    private $id;
    private $title;
    private $content;

    // Конструктор класу
    public function __construct($id = null, $title = '', $content = '')
    {
        $this->id = $id;
        $this->title = $title;
        $this->content = $content;
    }

    // Геттери і сеттери для властивостей
    public function getId()
    {
        return $this->id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function setContent($content)
    {
        $this->content = $content;
    }

    // Метод для збереження новини в базі даних
    public function save()
    {
        $pdo = Database::getInstance();
        $stmt = $pdo->prepare('INSERT INTO news (title, content) VALUES (?, ?)');
        $stmt->execute([$this->title, $this->content]);
        $this->id = $pdo->lastInsertId();
    }

    // Метод для оновлення новини в базі даних
    public function update()
    {
        $pdo = Database::getInstance();
        $stmt = $pdo->prepare('UPDATE news SET title = ?, content = ? WHERE id = ?');
        $stmt->execute([$this->title, $this->content, $this->id]);
    }

    // Метод для видалення новини з бази даних
    public function delete()
    {
        $pdo = Database::getInstance();
        $stmt = $pdo->prepare('DELETE FROM news WHERE id = ?');
        $stmt->execute([$this->id]);
    }

    // Метод для отримання всіх новин з бази даних
    public static function getAll()
    {
        $pdo = Database::getInstance();
        $stmt = $pdo->query('SELECT * FROM news');
        $newsList = [];
        while ($row = $stmt->fetch()) {
            $news = new News($row['id'], $row['title'], $row['content']);
            $newsList[] = $news;
        }
        return $newsList;
    }

    // Метод для отримання новини за її id
    public static function getById($id)
    {
        $pdo = Database::getInstance();
        $stmt = $pdo->prepare('SELECT * FROM news WHERE id = ?');
        $stmt->execute([$id]);
        if ($row = $stmt->fetch()) {
            return new News($row['id'], $row['title'], $row['content']);
        }
        return null;
    }
}
