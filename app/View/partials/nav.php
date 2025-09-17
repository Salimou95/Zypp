<?php
require_once __DIR__ . '/../../config.php';
if (session_status() === PHP_SESSION_NONE) session_start();
?>
<nav class="navbar navbar-expand-lg shadow-sm mb-4">
  <div class="container-fluid">
    <a class="navbar-brand d-flex align-items-center" href="<?= ROOT_URL ?>/">
      <img src="<?= ASSETS_URL ?>/images/Logo.png" alt="Logo" class="me-2">
    </a>
    <div class="ms-auto">
      <ul class="navbar-nav flex-row gap-3 align-items-center">
        <li class="nav-item">
          <a class="nav-link fw-bold text-primary" href="<?= ROOT_URL ?>/">Accueil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link fw-bold text-primary" href="<?= ROOT_URL ?>/contact">Contact</a>
        </li>
        <?php if (isset($_SESSION['user'])): ?>
          <li class="nav-item">
            <a class="btn-login" href="<?= ROOT_URL ?>/auth/logout">Se déconnecter</a>
          </li>
        <?php else: ?>
          <li class="nav-item">
            <a class="btn-login" href="<?= ROOT_URL ?>/auth/login">Connexion</a>
          </li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>
