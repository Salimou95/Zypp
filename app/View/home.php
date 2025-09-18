<?php
require_once __DIR__ . '/../config.php';
if (session_status() === PHP_SESSION_NONE) session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Accueil</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
    <!-- Leaflet CSS pour la carte -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <link rel="stylesheet" href="<?= ASSETS_URL ?>/css/style.css?v=3">
    <link rel="stylesheet" href="<?= ASSETS_URL ?>/css/mobile.css?v=1">
    <script src="<?= ASSETS_URL ?>/js/script.js" defer></script>
    <!-- Leaflet JS pour la carte -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
</head>
<body class="d-flex flex-column min-vh-100">
<?php include __DIR__ . '/partials/nav.php'; ?>

<section class="py-0 first-hero">
  <img id="heroImage" src="<?= ASSETS_URL ?>/images/Section_trot.png?v=3" alt="Présentation" class="hero-img" />
</section>

<!-- Section offre ZYPP -->
<section class="offer-section py-5">
  <div class="container">
    <h1 class="offer-title">
      ZYPP Vous offre des trottinettes&nbsp;électriques haut<br>
      de gamme en libre service, disponibles à la<br>
      location directement depuis votre téléphone.
    </h1>
    <a href="#" class="offer-download-link">Télécharger l'App</a>
  </div>
</section>

<!-- Nouvelle troisième section avec deux articles -->
<section class="discover-section py-5">
  <div class="container">
    <div class="row align-items-center">
      <!-- Article de gauche (70%) -->
      <div class="col-lg-8 col-md-7">
        <article class="discover-content">
          <h2 class="discover-main-title">DÉCOUVREZ NOS TROTTINETTES</h2>
          <h3 class="discover-sub-title">ZYPPI</h3>
          <p class="discover-text">
            Notre trottinette électrique. Conçue pour le libre-service, ses grandes roues et sa double suspension en font le partenaire idéal pour toutes les aventures à trottinette.
          </p>
          <div class="discover-social-icons">
            <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
            <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
            <a href="#" class="social-icon"><i class="fab fa-linkedin-in"></i></a>
            <a href="https://www.instagram.com/zypp.trott?igsh=MTRvaDFrd3M1anp0eQ%3D%3D&utm_source=qr" target="_blank" class="social-icon"><i class="fab fa-instagram"></i></a>
          </div>
          <a href="#" class="discover-btn">En Savoir Plus</a>
        </article>
      </div>

      <!-- Article de droite (30%) avec image -->
      <div class="col-lg-4 col-md-5">
        <article class="discover-image">
          <img src="<?= ASSETS_URL ?>/images/Section2_trot.PNG" alt="Trottinette ZYPPI" class="img-fluid rounded">
        </article>
      </div>
    </div>
  </div>
</section>

<!-- Section Trouver votre ZYPPI -->
<section class="find-zyppi-section">
  <div class="container">
    <h2 class="find-zyppi-title">Trouver votre ZYPPI</h2>
    <p class="find-zyppi-text">Téléchargez l'application ZYPP, créez un compte et repérez votre ZYPPI le plus proche directement sur l'app !</p>
    <a href="#" class="find-zyppi-btn">Commencer</a>
  </div>
</section>

<!-- Section Carte Montpellier -->
<section class="map-section py-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12">
        <div class="map-container">
          <div id="map" style="height: 450px; width: 100%; border-radius: 8px;"></div>
        </div>
      </div>
    </div>
  </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Coordonnées approximatives pour 47 rue des Couronnes, Montpellier
    var lat = 43.6167;
    var lng = 3.8767;

    // Initialiser la carte
    var map = L.map('map').setView([lat, lng], 16);

    // Ajouter les tuiles OpenStreetMap
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    // Ajouter un marqueur rouge sur l'adresse
    var marker = L.marker([lat, lng]).addTo(map);

    // Ajouter une popup avec l'adresse
    marker.bindPopup('<b>ZYPP</b><br>47 rue des Couronnes<br>34020 Montpellier, France').openPopup();
});
</script>

<!-- Section Comment ça marche -->
<section class="how-it-works-section">
  <div class="container">
    <h2 class="how-it-works-title">Comment ça marche ?</h2>
  </div>
</section>

<!-- Section numérotée -->
<section class="numbered-section">
  <div class="container">
    <div class="row">
      <div class="col-lg-4 col-md-6 mb-4">
        <article class="numbered-article">
          <div class="article-number">1</div>
          <h3 class="article-title">Scanner le QR code</h3>
          <p class="article-text">Téléchargez l'application ZYPP, créez un compte et repérez les trottinettes ZYPP le plus proche directement sur l'app.</p>
          <a href="#" class="article-btn">Plus d'infos</a>
        </article>
      </div>
      <div class="col-lg-4 col-md-6 mb-4">
        <article class="numbered-article">
          <div class="article-number">2</div>
          <h3 class="article-title">Débloquer la trottinette</h3>
          <p class="article-text">Scannez le QR code pour démarrer votre trottinette, paye le montant afficher ! Pas besoin d’abonnement, galopez autant qu’il vous plaît.</p>
          <a href="#" class="article-btn">Plus d'infos</a>
        </article>
      </div>
      <div class="col-lg-4 col-md-6 mb-4">
        <article class="numbered-article">
          <div class="article-number">3</div>
          <h3 class="article-title">Rouler & Stationner correctement</h3>
          <p class="article-text">Des centaines de parking sont disponibles dans votre ville, repérez le plus proche de votre destination sur l’application </p>
          <a href="#" class="article-btn">Plus d'infos</a>
        </article>
      </div>
    </div>
  </div>
</section>

<!-- Nouvelle section : Fonctionnalités & Avantages -->
<section class="features-section py-5">
  <div class="container">
    <div class="row align-items-center">
      <!-- Contenu principal (70%) -->
      <div class="col-lg-8 col-md-7">
        <article class="features-content">
          <h2 class="features-title">Pourquoi choisir ZYPP ?</h2>
          <p class="features-text">ZYPP met à votre disposition des trottinettes électriques fiables, sécurisées et faciles à utiliser. Profitez d'une autonomie longue durée, d'une assistance mobile et d'une couverture dans les zones urbaines principales.</p>
          <ul class="features-list">
            <li>Grande autonomie et charge rapide</li>
            <li>Système de verrouillage sécurisé</li>
            <li>Application intuitive avec suivi en temps réel</li>
          </ul>
          <!-- Contenu concis et rédigé pour le site (sans mention de date) -->
          <div class="mt-4 features-details">
            <p class="lead"><strong>Lancement à Montpellier</strong> — parc initial de <strong>1000 trottinettes</strong> en libre-service, sans borne d'attache.</p>
            <ul>
              <li>Accès via l'application mobile : déverrouillez et partez en quelques secondes</li>
              <li>Tarif transparent : <strong>1&nbsp;€</strong> à la prise + <strong>0,15&nbsp;€/min</strong> (ex. 15&nbsp;min = <strong>3,25&nbsp;€</strong>)</li>
              <li>Dépôt simple : garez sur un trottoir dans une zone autorisée indiquée par l'application, puis verrouillez pour terminer la course</li>
              <li>Ramassage nocturne (21h–6h) pour recharge et maintenance</li>
              <li>Programme de recharge à domicile : particuliers rémunérés ou bénéficiant d'avantages</li>
            </ul>
            <p class="small text-muted mb-0">Assurance au tiers et assistance 24/7 incluses. Pas d'abonnement obligatoire.</p>
          </div>
         </article>
      </div>

      <!-- Image (30%) -->
      <div class="col-lg-4 col-md-5 mt-4 mt-md-0">
        <article class="features-image text-center">
          <img src="<?= ASSETS_URL ?>/images/trot3.png" alt="Trottinette ZYPP" class="img-fluid" style="border: none;">
        </article>
      </div>
    </div>
  </div>
</section>

<!-- Section avec image zypp.png en pleine taille -->
<section class="zypp-image-section">
    <img src="<?= ASSETS_URL ?>/images/zypp.png" alt="Zypp" class="zypp-full-image">
</section>

<?php include __DIR__ . '/partials/footer.php'; ?>
</body>
</html>
