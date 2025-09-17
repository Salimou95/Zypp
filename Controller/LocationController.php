<?php
require_once __DIR__ . '/../app/config.php';
require_once __DIR__ . '/../Model/LocationModel.php';

class LocationController {
    private $model = null;

    private function model() {
        if (!$this->model instanceof LocationModel) {
            $this->model = new LocationModel();
        }
        return $this->model;
    }

    public function index() {
        if (session_status() === PHP_SESSION_NONE) session_start();
        if (!isset($_SESSION['user'])) {
            header('Location: ' . ROOT_URL . '/auth/login');
            exit;
        }
        $mail = $_SESSION['user'];
        $locations = array();
        try {
            $locations = $this->model()->getLocationsByUserMail($mail);
        } catch (Exception $e) {
            $error = 'Impossible de récupérer vos locations pour le moment.';
        }
        include __DIR__ . '/../app/View/locations.php';
    }
}
