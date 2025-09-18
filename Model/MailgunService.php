<?php
/**
 * Service Mailgun pour l'envoi d'emails
 * Utilise la bibliothèque officielle mailgun/mailgun-php
 */

// Include the Autoloader (see "Libraries" for install instructions)
require_once __DIR__ . '/../vendor/autoload.php';

// Use the Mailgun class from mailgun/mailgun-php v4.2
use Mailgun\Mailgun;

class MailgunService {
    
    private $mg;
    private $domain;
    
    public function __construct() {
        // Instantiate the client.
        $this->mg = Mailgun::create(getenv('MAILGUN_API_KEY') ?: $_ENV['MAILGUN_API_KEY'] ?? 'API_KEY');
        
        // When you have an EU-domain, you must specify the endpoint:
        // $this->mg = Mailgun::create(getenv('MAILGUN_API_KEY') ?: 'API_KEY', 'https://api.eu.mailgun.net');
        
        $this->domain = getenv('MAILGUN_DOMAIN') ?: $_ENV['MAILGUN_DOMAIN'] ?? 'sandboxcf8b3b29890f4bd8a6eb0a76cca7ba24.mailgun.org';
    }
    
    /**
     * Envoie un email de contact via Mailgun
     */
    public function sendContactEmail($nom, $email, $message) {
        $to = $_ENV['CONTACT_EMAIL'] ?? 'salimoudiaby95@gmail.com';
        $subject = 'Nouveau message de contact - ' . $nom;
        
        // Construction du message HTML
        $htmlMessage = $this->buildHtmlMessage($nom, $email, $message);
        
        try {
            // Compose and send your message.
            $result = $this->mg->messages()->send(
                $this->domain,
                [
                    'from' => 'Contact Zypp <postmaster@' . $this->domain . '>',
                    'to' => $to,
                    'subject' => $subject,
                    'html' => $htmlMessage,
                    'text' => strip_tags($htmlMessage),
                    'h:Reply-To' => $email
                ]
            );
            
            error_log("✅ Email envoyé avec succès via Mailgun vers: $to pour: $nom ($email)");
            error_log("Message ID: " . $result->getMessage());
            
            return true;
            
        } catch (Exception $e) {
            error_log("❌ Erreur Mailgun: " . $e->getMessage());
            return false;
        }
    }
    
    /**
     * Envoie un email de test (basé sur votre exemple)
     */
    public function sendTestEmail() {
        try {
            // Compose and send your message.
            $result = $this->mg->messages()->send(
                $this->domain,
                [
                    'from' => 'Mailgun Sandbox <postmaster@' . $this->domain . '>',
                    'to' => 'Heroku <0454a18d-24b6-4f5e-ae14-0e58a1694786@heroku.com>',
                    'subject' => 'Hello Heroku',
                    'text' => 'Congratulations Heroku, you just sent an email with Mailgun! You are truly awesome!'
                ]
            );
            
            print_r($result->getMessage());
            return true;
            
        } catch (Exception $e) {
            error_log("❌ Erreur lors du test Mailgun: " . $e->getMessage());
            return false;
        }
    }
    
    /**
     * Construit le message HTML pour les emails de contact
     */
    private function buildHtmlMessage($nom, $email, $message) {
        return "
        <html>
        <head>
            <meta charset='UTF-8'>
            <title>Nouveau message de contact</title>
        </head>
        <body style='font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto; padding: 20px;'>
            <div style='background-color: #f8f9fa; padding: 30px; border-radius: 10px;'>
                <h2 style='color: #333; margin-bottom: 20px;'>📧 Nouveau message de contact</h2>
                
                <div style='background-color: white; padding: 20px; border-radius: 8px; margin-bottom: 20px;'>
                    <h3 style='color: #007bff; margin-bottom: 15px;'>Informations du contact</h3>
                    <p><strong>Nom :</strong> " . htmlspecialchars($nom) . "</p>
                    <p><strong>Email :</strong> " . htmlspecialchars($email) . "</p>
                </div>
                
                <div style='background-color: white; padding: 20px; border-radius: 8px;'>
                    <h3 style='color: #007bff; margin-bottom: 15px;'>Message</h3>
                    <div style='background-color: #f8f9fa; padding: 15px; border-left: 4px solid #007bff; font-style: italic;'>
                        " . nl2br(htmlspecialchars($message)) . "
                    </div>
                </div>
                
                <div style='margin-top: 20px; padding: 15px; background-color: #e9ecef; border-radius: 8px; font-size: 12px; color: #6c757d;'>
                    <p>📅 Reçu le : " . date('d/m/Y à H:i:s') . "</p>
                    <p>🌐 Site : Zypp Contact System</p>
                </div>
            </div>
        </body>
        </html>";
    }
}
