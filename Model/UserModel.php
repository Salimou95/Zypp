<?php
require_once __DIR__ . '/Database.php';

class UserModel {
    private $pdo = null;

    public function __construct() {
        // Connexion paresseuse: réalisée à la demande via $this->pdo()
    }

    private function pdo() {
        if (!$this->pdo instanceof PDO) {
            $this->pdo = Database::getInstance()->getConnection();
        }
        return $this->pdo;
    }

    public function register($firstName, $lastName, $mail, $password) {
        $stmt = $this->pdo()->prepare('SELECT id FROM users WHERE mail = ?');
        $stmt->execute([$mail]);
        if ($stmt->fetch()) {
            return false; // Email déjà utilisé
        }
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $this->pdo()->prepare('INSERT INTO users (firstName, lastName, mail, password) VALUES (?, ?, ?, ?)');
        return $stmt->execute([$firstName, $lastName, $mail, $hash]);
    }

    public function login($mail, $password) {
        $stmt = $this->pdo()->prepare('SELECT password FROM users WHERE mail = ?');
        $stmt->execute([$mail]);
        $user = $stmt->fetch();
        if (!$user) {
            return 'email_not_found';
        }
        if (password_verify($password, $user['password'])) {
            return 'success';
        }
        return 'wrong_password';
    }

    public function getAll() {
        $stmt = $this->pdo()->query('SELECT id, firstName, lastName, mail FROM users');
        return $stmt->fetchAll();
    }
}
