<?php
/**
 * Test simple pour vérifier le fonctionnement du système d'email
 * Utilisez ce fichier pour tester localement avant de déployer sur Heroku
 */

// Inclusion des classes nécessaires
require_once __DIR__ . '/Model/ContactModel.php';

// Test de la classe ContactModel
try {
    echo "<h2>Test du système d'envoi d'email</h2>";

    $contactModel = new ContactModel();

    // Données de test
    $nom = "Test Utilisateur";
    $email = "test@example.com";
    $message = "Ceci est un message de test pour vérifier le système d'envoi d'email.";

    echo "<p><strong>Test des données :</strong></p>";
    echo "<p>Nom: " . htmlspecialchars($nom) . "</p>";
    echo "<p>Email: " . htmlspecialchars($email) . "</p>";
    echo "<p>Message: " . htmlspecialchars($message) . "</p>";

    // Vérification de la variable d'environnement
    $contactEmail = $_ENV['CONTACT_EMAIL'] ?? 'contact@votre-domaine.com';
    echo "<p><strong>Email de destination:</strong> " . htmlspecialchars($contactEmail) . "</p>";

    // Test de l'envoi (commenté pour éviter l'envoi réel lors du test)
    /*
    $result = $contactModel->sendContactEmail($nom, $email, $message);

    if ($result) {
        echo "<p style='color: green;'>✓ Email envoyé avec succès !</p>";
    } else {
        echo "<p style='color: red;'>✗ Échec de l'envoi de l'email</p>";
    }
    */

    echo "<p style='color: blue;'>Test terminé. Décommentez les lignes d'envoi pour tester réellement.</p>";

} catch (Exception $e) {
    echo "<p style='color: red;'>Erreur: " . htmlspecialchars($e->getMessage()) . "</p>";
}
?>
