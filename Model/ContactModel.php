<?php
require_once __DIR__ . '/MailgunService.php';

class ContactModel {

    public function sendContactEmail($nom, $email, $message) {
        try {
            // Utilisation du nouveau MailgunService avec la bibliothèque officielle
            $mailgunService = new MailgunService();
            $emailSent = $mailgunService->sendContactEmail($nom, $email, $message);

            if ($emailSent) {
                // Log de succès
                error_log("✅ Email de contact envoyé avec succès via Mailgun pour: $nom ($email)");
                return true;
            } else {
                error_log("❌ Échec d'envoi d'email via Mailgun pour: $nom ($email)");
                return false;
            }

        } catch (Exception $e) {
            error_log("🚨 Erreur lors de l'envoi d'email Mailgun: " . $e->getMessage());
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
