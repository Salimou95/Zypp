<?php
require_once __DIR__ . '/../app/config.php';
require_once __DIR__ . '/../Model/UserModel.php';

class AuthController {
    private $userModel = null;

    private function model() {
        if (!$this->userModel instanceof UserModel) {
            $this->userModel = new UserModel();
        }
        return $this->userModel;
    }

    public function register() {
        $message = '';
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $firstName = trim(isset($_POST['firstName']) ? $_POST['firstName'] : '');
            $lastName  = trim(isset($_POST['lastName']) ? $_POST['lastName'] : '');
            $mail      = trim(isset($_POST['mail']) ? $_POST['mail'] : '');
            $password  = isset($_POST['password']) ? $_POST['password'] : '';

            $missing = array();
            if (!$firstName) $missing[] = 'prénom';
            if (!$lastName)  $missing[] = 'nom';
            if (!$mail)      $missing[] = 'email';
            if (!$password)  $missing[] = 'mot de passe';

            if (!empty($missing)) {
                $message = 'Veuillez remplir le(s) champ(s) suivant(s) : ' . implode(', ', $missing) . '.';
            } else {
                if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^\w\d]).{8,}$/', $password)) {
                    $message = 'Le mot de passe doit contenir au moins 8 caractères, une majuscule, une minuscule, un chiffre et un caractère spécial.';
                } else {
                    try {
                        if ($this->model()->register($firstName, $lastName, $mail, $password)) {
                            $message = 'Inscription réussie. Vous pouvez vous connecter.';
                        } else {
                            $message = 'Adresse e-mail déjà utilisée.';
                        }
                    } catch (Exception $e) {
                        $message = 'Service indisponible. Veuillez réessayer plus tard.';
                    }
                }
            }
        }
        include __DIR__ . '/../app/View/register.php';
    }

    public function login() {
        session_start();
        if (isset($_SESSION['user'])) {
            header('Location: ' . ROOT_URL . '/location');
            exit;
        }

        $message = '';
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $mail     = trim(isset($_POST['mail']) ? $_POST['mail'] : '');
            $password = isset($_POST['password']) ? $_POST['password'] : '';

            $missing = array();
            if (!$mail)     $missing[] = 'email';
            if (!$password) $missing[] = 'mot de passe';

            if (!empty($missing)) {
                $message = 'Veuillez remplir le(s) champ(s) suivant(s) : ' . implode(', ', $missing) . '.';
            } else {
                try {
                    $result = $this->model()->login($mail, $password);
                    if ($result === 'success') {
                        $_SESSION['user'] = $mail;
                        header('Location: ' . ROOT_URL . '/location');
                        exit;
                    } elseif ($result === 'email_not_found') {
                        $message = 'Email inconnu.';
                    } elseif ($result === 'wrong_password') {
                        $message = 'Mot de passe incorrect.';
                    } else {
                        $message = 'Erreur lors de la connexion.';
                    }
                } catch (Exception $e) {
                    $message = 'Service indisponible. Veuillez réessayer plus tard.';
                }
            }
        }

        include __DIR__ . '/../app/View/login.php';
    }

    public function logout() {
        session_start();
        session_destroy();
        header('Location: ' . ROOT_URL . '/');
        exit;
    }

    public function index() {
        $this->login();
    }
}
