<?php

class DbConnection {
    private $host = "localhost"; // Хост бази даних
    private $username = 'db_user'; // Замініть на ім'я користувача бази даних
private $password = 'db_password'; // Замініть на пароль користувача бази даних
private $database = 'cursova_db'; // Замініть на назву вашої бази даних


    protected $connection;

    public function __construct() {
        $this->connection = $this->connect();
    }

    protected function connect() {
        $connection = mysqli_connect($this->host, $this->username, $this->password, $this->database);

        if (!$connection) {
            die("Помилка з'єднання з базою даних: " . mysqli_connect_error());
        }

        return $connection;
    }

    public function getConnection() {
        return $this->connection;
    }
}
?>
