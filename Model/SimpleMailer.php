<?php
/**
 * Classe d'envoi d'email compatible Heroku
 * Utilise une API externe car Heroku ne supporte pas mail()
 */
class SimpleMailer {

    public static function sendContactEmail($nom, $email, $message) {
        $to = $_ENV['CONTACT_EMAIL'] ?? 'salimoudiaby95@gmail.com';
        $subject = 'Nouveau message de contact - ' . $nom;

        // Construction du message HTML
        $htmlMessage = self::buildHtmlMessage($nom, $email, $message);

        // Essayer d'abord avec SendGrid si configuré
        if (isset($_ENV['SENDGRID_API_KEY'])) {
            return self::sendWithSendGrid($to, $subject, $htmlMessage, $email, $nom);
        }

        // Sinon essayer avec Mailgun si configuré
        if (isset($_ENV['MAILGUN_API_KEY']) && isset($_ENV['MAILGUN_DOMAIN'])) {
            return self::sendWithMailgun($to, $subject, $htmlMessage, $email, $nom);
        }

        // Fallback : sauvegarder en fichier pour récupération manuelle
        return self::saveToFile($nom, $email, $message, $to);
    }

    private static function sendWithSendGrid($to, $subject, $htmlMessage, $fromEmail, $fromName) {
        $apiKey = $_ENV['SENDGRID_API_KEY'];

        $data = [
            'personalizations' => [
                [
                    'to' => [['email' => $to]],
                    'subject' => $subject
                ]
            ],
            'from' => [
                'email' => 'noreply@votre-domaine.com',
                'name' => 'Contact Zypp'
            ],
            'reply_to' => [
                'email' => $fromEmail,
                'name' => $fromName
            ],
            'content' => [
                [
                    'type' => 'text/html',
                    'value' => $htmlMessage
                ]
            ]
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://api.sendgrid.com/v3/mail/send');
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Authorization: Bearer ' . $apiKey,
            'Content-Type: application/json'
        ]);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        $success = ($httpCode >= 200 && $httpCode < 300);

        if ($success) {
            error_log("Email envoyé avec succès via SendGrid vers: $to pour: $fromName ($fromEmail)");
        } else {
            error_log("Échec SendGrid (HTTP $httpCode): $response");
        }

        return $success;
    }

    private static function sendWithMailgun($to, $subject, $htmlMessage, $fromEmail, $fromName) {
        $apiKey = $_ENV['MAILGUN_API_KEY'];
        $domain = $_ENV['MAILGUN_DOMAIN'];

        $data = [
            'from' => "Contact Zypp <noreply@$domain>",
            'to' => $to,
            'subject' => $subject,
            'html' => $htmlMessage,
            'h:Reply-To' => $fromEmail
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://api.mailgun.net/v3/$domain/messages");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_USERPWD, "api:$apiKey");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        $success = ($httpCode >= 200 && $httpCode < 300);

        if ($success) {
            error_log("Email envoyé avec succès via Mailgun vers: $to pour: $fromName ($fromEmail)");
        } else {
            error_log("Échec Mailgun (HTTP $httpCode): $response");
        }

        return $success;
    }

    private static function saveToFile($nom, $email, $message, $to) {
        // Fallback : sauvegarder le message dans un fichier
        $logDir = __DIR__ . '/../logs';
        if (!is_dir($logDir)) {
            mkdir($logDir, 0755, true);
        }

        $filename = $logDir . '/contact_messages_' . date('Y-m') . '.log';
        $timestamp = date('Y-m-d H:i:s');

        $logEntry = "[$timestamp] NOUVEAU MESSAGE DE CONTACT\n";
        $logEntry .= "Destination: $to\n";
        $logEntry .= "Nom: $nom\n";
        $logEntry .= "Email: $email\n";
        $logEntry .= "Message: $message\n";
        $logEntry .= str_repeat('-', 50) . "\n\n";

        $saved = file_put_contents($filename, $logEntry, FILE_APPEND | LOCK_EX);

        if ($saved) {
            error_log("Message de contact sauvegardé dans: $filename");
            return true;
        } else {
            error_log("Échec de sauvegarde du message de contact");
            return false;
        }
    }

    private static function buildHtmlMessage($nom, $email, $message) {
        $html = '
        <!DOCTYPE html>
        <html>
        <head>
            <meta charset="UTF-8">
            <style>
                body { font-family: Arial, sans-serif; line-height: 1.6; }
                .container { max-width: 600px; margin: 0 auto; padding: 20px; }
                .header { background-color: #f8f9fa; padding: 20px; border-radius: 5px; margin-bottom: 20px; }
                .content { padding: 20px; background-color: #ffffff; border: 1px solid #dee2e6; border-radius: 5px; }
                .footer { background-color: #e9ecef; padding: 15px; text-align: center; font-size: 12px; margin-top: 20px; border-radius: 5px; }
                .field { margin-bottom: 15px; }
                .field strong { color: #495057; }
            </style>
        </head>
        <body>
            <div class="container">
                <div class="header">
                    <h2 style="margin: 0; color: #212529;">Nouveau message de contact</h2>
                </div>
                <div class="content">
                    <div class="field">
                        <strong>Nom:</strong> ' . htmlspecialchars($nom) . '
                    </div>
                    <div class="field">
                        <strong>Email:</strong> ' . htmlspecialchars($email) . '
                    </div>
                    <div class="field">
                        <strong>Message:</strong><br>
                        ' . nl2br(htmlspecialchars($message)) . '
                    </div>
                </div>
                <div class="footer">
                    <p>Ce message a été envoyé depuis le formulaire de contact de votre site web.</p>
                    <p>Date: ' . date('d/m/Y à H:i:s') . '</p>
                </div>
            </div>
        </body>
        </html>';

        return $html;
    }
}
