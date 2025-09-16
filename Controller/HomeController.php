<?php
class HomeController {
    public function index() {
        require_once __DIR__ . '/../Model/HomeModel.php';
        $model = new HomeModel();
        // Suppression du message de bienvenue
        require __DIR__ . '/../app/View/home.php';
    }
}
