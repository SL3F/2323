<?php
// models/DbConnection.php

if (!class_exists('DbConnection')) {
    class DbConnection
    {
        private static $instance;
        private $connection;

        private function __construct()
        {
            $host = 'localhost';
            $dbname = 'cursova_db';
            $username = 'db_user';
            $password = 'db_password';

            try {
                $this->connection = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
                $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo 'Connection failed: ' . $e->getMessage();
            }
        }

        public static function getInstance()
        {
            if (!isset(self::$instance)) {
                self::$instance = new DbConnection();
            }

            return self::$instance->connection;
        }
    }
}
?>
