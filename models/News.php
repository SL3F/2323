<?php
require_once 'DbConnection.php';

class News {
    private $id;
    private $title;
    private $content;
    private $date;

    public function __construct($id, $title, $content, $date) {
        $this->id = $id;
        $this->title = $title;
        $this->content = $content;
        $this->date = $date;
    }

    public function getId() {
        return $this->id;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getContent() {
        return $this->content;
    }

    public function getDate() {
        return $this->date;
    }

    public function setTitle($title) {
        $this->title = $title;
    }

    public function setContent($content) {
        $this->content = $content;
    }

    public function setDate($date) {
        $this->date = $date;
    }

    public static function getAll() {
        $connection = DbConnection::getInstance();
        $statement = $connection->query('SELECT * FROM news');
        $news = [];
        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            $news[] = new News($row['id'], $row['title'], $row['content'], $row['date']);
        }
        return $news;
    }

    public static function getById($id) {
        $connection = DbConnection::getInstance();
        $statement = $connection->prepare('SELECT * FROM news WHERE id = ?');
        $statement->execute([$id]);
        $row = $statement->fetch(PDO::FETCH_ASSOC);
        return new News($row['id'], $row['title'], $row['content'], $row['date']);
    }

    public function delete() {
        $connection = DbConnection::getInstance();
        $statement = $connection->prepare('DELETE FROM news WHERE id = ?');
        $statement->execute([$this->id]);
    }
}
?>
