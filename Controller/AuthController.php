<?php
require_once __DIR__ . '/../Model/UserModel.php';

class AuthController {
    private $userModel;

    public function __construct() {
        $this->userModel = new UserModel();
    }

    public function register() {
        $message = '';
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $firstName = trim($_POST['firstName'] ?? '');
            $lastName = trim($_POST['lastName'] ?? '');
            $mail = trim($_POST['mail'] ?? '');
            $password = $_POST['password'] ?? '';
            $missing = [];
            if (!$firstName) $missing[] = 'prénom';
            if (!$lastName) $missing[] = 'nom';
            if (!$mail) $missing[] = 'email';
            if (!$password) $missing[] = 'mot de passe';
            if (!empty($missing)) {
                $message = 'Veuillez remplir le(s) champ(s) suivant(s) : ' . implode(', ', $missing) . '.';
            } else {
                // Validation de la robustesse du mot de passe
                if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^\w\d]).{8,}$/', $password)) {
                    $message = 'Le mot de passe doit contenir au moins 8 caractères, une majuscule, une minuscule, un chiffre et un caractère spécial.';
                } else {
                    if ($this->userModel->register($firstName, $lastName, $mail, $password)) {
                        $message = 'Inscription réussie. Vous pouvez vous connecter.';
                    } else {
                        $message = 'Adresse e-mail déjà utilisée.';
                    }
                }
            }
        }
        include __DIR__ . '/../app/View/register.php';
    }

    public function login() {
        session_start();
        if (isset($_SESSION['user'])) {
            header('Location: /Zypp/');
            exit;
        }
        $message = '';
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $mail = trim($_POST['mail'] ?? '');
            $password = $_POST['password'] ?? '';
            $missing = [];
            if (!$mail) $missing[] = 'email';
            if (!$password) $missing[] = 'mot de passe';
            if (!empty($missing)) {
                $message = 'Veuillez remplir le(s) champ(s) suivant(s) : ' . implode(', ', $missing) . '.';
            } else {
                $result = $this->userModel->login($mail, $password);
                if ($result === 'success') {
                    $_SESSION['user'] = $mail;
                    header('Location: /Zypp/');
                    exit;
                } elseif ($result === 'email_not_found') {
                    $message = 'Email inconnu.';
                } elseif ($result === 'wrong_password') {
                    $message = 'Mot de passe incorrect.';
                } else {
                    $message = 'Erreur lors de la connexion.';
                }
            }
        }
        include __DIR__ . '/../app/View/login.php';
    }

    public function logout() {
        session_start();
        session_destroy();
        header('Location: /Zypp/');
        exit;
    }

    public function index() {
        // Affiche la page de connexion par défaut
        $this->login();
    }
}
