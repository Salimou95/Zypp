<?php
require_once __DIR__ . '/../../config.php';
if (session_status() === PHP_SESSION_NONE) session_start();
?>
<nav class="navbar navbar-expand-lg shadow-sm mb-4">
  <div class="container-fluid">
    <a class="navbar-brand d-flex align-items-center" href="<?= ROOT_URL ?>/">
      <?php
      // Utiliser Logo.png si on est dans public/, sinon logo.png pour la racine
      $logoFile = (strpos(ASSETS_URL, '/public/') !== false) ? 'Logo.png' : 'logo.png';
      ?>
      <img src="<?= ASSETS_URL ?>/images/<?= $logoFile ?>" alt="Logo" class="me-2">
    </a>

    <!-- Menu burger pour mobile -->
    <button class="mobile-menu-toggle d-md-none" type="button" id="mobileMenuToggle">
      <span></span>
      <span></span>
      <span></span>
    </button>

    <!-- Navigation desktop (cachée sur mobile) -->
    <div class="ms-auto d-none d-md-block">
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

    <!-- Navigation mobile (cachée par défaut) -->
    <ul class="navbar-nav d-md-none" id="mobileMenu">
      <li class="nav-item">
        <a class="nav-link" href="<?= ROOT_URL ?>/">Accueil</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= ROOT_URL ?>/contact">Contact</a>
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
</nav>

<!-- Overlay pour le menu mobile -->
<div class="mobile-menu-overlay d-md-none" id="mobileMenuOverlay"></div>
