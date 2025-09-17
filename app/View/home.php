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
    <link rel="stylesheet" href="<?= ASSETS_URL ?>/css/style.css?v=3">
    <script src="<?= ASSETS_URL ?>/js/script.js" defer></script>
</head>
<body class="d-flex flex-column min-vh-100">
<?php include __DIR__ . '/partials/nav.php'; ?>

<section class="py-0 first-hero">
  <img id="heroImage" src="<?= ASSETS_URL ?>/images/Section_trot.png?v=3" alt="Présentation" class="hero-img" />
</section>

<!-- Section offre ZYPP -->
<section class="offer-section py-5">
  <div class="container">
    <h2 class="offer-title">
      ZYPP Vous offre des trottinettes&nbsp;électriques haut<br>
      de gamme en libre service, disponibles à la<br>
      location directement depuis votre téléphone.
    </h2>
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
            <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
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
          <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d46733.51736847962!2d3.8320343!3d43.6112422!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12b6af0725dd9db1%3A0xad8756742894e802!2sMontpellier!5e0!3m2!1sfr!2sfr!4v1637328000000!5m2!1sfr!2sfr"
            allowfullscreen=""
            loading="lazy"
            referrerpolicy="no-referrer-when-downgrade">
          </iframe>
        </div>
      </div>
    </div>
  </div>
</section>

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

<!-- Section avec image zypp.png en pleine taille -->
<section class="zypp-image-section">
    <img src="<?= ASSETS_URL ?>/images/zypp.png" alt="Zypp" class="zypp-full-image">
</section>

<?php include __DIR__ . '/partials/footer.php'; ?>
</body>
</html>
