<?php
if (session_status() === PHP_SESSION_NONE) session_start();
?>
<nav class="navbar navbar-expand-lg shadow-sm mb-4">
  <div class="container-fluid">
    <a class="navbar-brand d-flex align-items-center" href="/Zypp/public/">
      <img src="/Zypp/assets/images/Logo.png" alt="Logo" class="me-2">
    </a>
    <div class="ms-auto">
      <ul class="navbar-nav flex-row gap-3">
        <li class="nav-item">
          <a class="nav-link fw-bold text-primary" href="/Zypp/public/">Accueil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link fw-bold text-primary" href="/Zypp/public/service">Service</a>
        </li>
        <li class="nav-item">
          <a class="nav-link fw-bold text-primary" href="/Zypp/public/contact">Contact</a>
        </li>
        <?php if (isset($_SESSION['user'])): ?>
        <li class="nav-item">
          <a class="nav-link fw-bold text-danger" href="/Zypp/auth/logout">Se déconnecter</a>
        </li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>
