<?php
require_once __DIR__ . '/SimpleMailer.php';

class ContactModel {

    public function sendContactEmail($nom, $email, $message) {
        try {
            // Utilisation de SimpleMailer pour l'envoi d'email
            $emailSent = SimpleMailer::sendContactEmail($nom, $email, $message);

            if ($emailSent) {
                // Log de succès
                error_log("Email de contact envoyé avec succès pour: $nom ($email)");
                return true;
            } else {
                error_log("Échec d'envoi d'email pour: $nom ($email)");
                return false;
            }

        } catch (Exception $e) {
            error_log("Erreur lors de l'envoi d'email: " . $e->getMessage());
            throw new Exception("Erreur d'envoi: " . $e->getMessage());
        }
    }

    /**
     * Méthode pour sauvegarder le message en base de données (optionnel)
     * Utile pour garder une trace des messages même si l'email échoue
     */
    public function saveContactMessage($nom, $email, $message) {
        // Cette méthode peut être implémentée plus tard pour sauvegarder en BDD
        // Utile pour Heroku où les emails peuvent parfois échouer
        return true;
    }
}
