<?php
require_once __DIR__ . '/../Model/ContactModel.php';

class ContactController {
    private $contactModel;

    public function __construct() {
        $this->contactModel = new ContactModel();
    }

    public function index() {
        $message = '';
        $messageType = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $result = $this->handleContactForm();
            $message = $result['message'];
            $messageType = $result['type'];
        }

        include __DIR__ . '/../app/View/contact.php';
    }

    private function handleContactForm() {
        // Validation des données
        $nom = trim($_POST['nom'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $messageContent = trim($_POST['message'] ?? '');

        if (empty($nom) || empty($email) || empty($messageContent)) {
            return ['message' => 'Tous les champs sont requis.', 'type' => 'danger'];
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return ['message' => 'Adresse email invalide.', 'type' => 'danger'];
        }

        // Tentative d'envoi de l'email
        try {
            $emailSent = $this->contactModel->sendContactEmail($nom, $email, $messageContent);

            if ($emailSent) {
                return ['message' => 'Votre message a été envoyé avec succès !', 'type' => 'success'];
            } else {
                return ['message' => 'Erreur lors de l\'envoi du message. Veuillez réessayer.', 'type' => 'danger'];
            }
        } catch (Exception $e) {
            error_log('Erreur envoi email: ' . $e->getMessage());
            return ['message' => 'Erreur technique. Veuillez réessayer plus tard.', 'type' => 'danger'];
        }
    }
}
