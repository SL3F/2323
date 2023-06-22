<?php
// config.php

class DbConnection {
    private static $instance = null;
    private $connection;

    private function __construct() {
        $this->connection = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASSWORD);
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new DbConnection();
        }
        return self::$instance->connection;
    }
}

define('DB_HOST', 'localhost');
define('DB_USER', 'db_user'); // Замініть на ім'я користувача бази даних
define('DB_PASSWORD', 'db_password'); // Замініть на пароль користувача бази даних
define('DB_NAME', 'cursova_db'); // Замініть на назву вашої бази даних
?>
