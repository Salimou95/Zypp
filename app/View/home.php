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

<?php include __DIR__ . '/partials/footer.php'; ?>
</body>
</html>
