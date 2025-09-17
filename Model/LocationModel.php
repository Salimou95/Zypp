<?php
// Modèle pour récupérer les locations d'un utilisateur
require_once __DIR__ . '/Database.php';

class LocationModel {
    private $pdo = null;

    private function pdo() {
        if (!$this->pdo instanceof PDO) {
            $this->pdo = Database::getInstance()->getConnection();
        }
        return $this->pdo;
    }

    /**
     * Retourne les locations (avec nom trottinette) pour un email utilisateur.
     * @param string $mail Email de l'utilisateur (stocké en session)
     * @return array Liste des locations (peut être vide)
     */
    public function getLocationsByUserMail($mail) {
        $sql = "SELECT l.id_location, l.date_debut, l.date_fin, t.nom AS trottinette
                FROM location l
                INNER JOIN users u ON u.id = l.id_utilisateur
                LEFT JOIN trottinette t ON t.id_trottinette = l.id_trottinette
                WHERE u.mail = ?
                ORDER BY l.date_debut DESC";
        $stmt = $this->pdo()->prepare($sql);
        $stmt->execute([$mail]);
        return $stmt->fetchAll();
    }
}
