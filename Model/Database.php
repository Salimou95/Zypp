<?php
require_once __DIR__ . '/../app/config.php';

class Database {
    private static $instance = null;
    private $pdo = null;

    private function __construct() {}

    private function connect() {
        if ($this->pdo instanceof PDO) {
            return;
        }
        $host = defined('DB_HOST') ? DB_HOST : 'localhost';
        $dbname = defined('DB_NAME') ? DB_NAME : 'zypp';
        $user = defined('DB_USER') ? DB_USER : 'root';
        $pass = defined('DB_PASS') ? DB_PASS : '';
        $charset = defined('DB_CHARSET') ? DB_CHARSET : 'utf8';
        $dsn = "mysql:host={$host};dbname={$dbname};charset={$charset}";
        $options = array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        );
        $this->pdo = new PDO($dsn, $user, $pass, $options);
    }

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    public function getConnection() {
        $this->connect();
        return $this->pdo;
    }
}
