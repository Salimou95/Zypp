<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Contact</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <?php require_once __DIR__ . '/../config.php'; ?>
    <link rel="stylesheet" href="<?= ASSETS_URL ?>/css/style.css">
    <link rel="stylesheet" href="<?= ASSETS_URL ?>/css/mobile.css?v=1">
    <script src="<?= ASSETS_URL ?>/js/script.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" defer></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="d-flex flex-column min-vh-100">
<?php include __DIR__ . '/partials/nav.php'; ?>

<!-- Section Contact -->
<section class="contact-section">
    <div class="container-fluid p-0">
        <div class="row g-0">
            <!-- Article de gauche - Informations de contact -->
            <div class="col-lg-3 contact-info-col">
                <div class="contact-info">
                    <div class="contact-info-content">
                        <h2 class="contact-title">Contactez-nous</h2>
                        <p class="contact-address">47 rue des Couronnes<br>34020 Montpellier, France</p>
                        <p class="contact-details">01 23 45 67 89</p>
                        <p class="contact-details">info@zypp.fr</p>

                        <!-- Icônes des réseaux sociaux -->
                        <div class="contact-social-icons">
                            <a href="#" class="contact-social-icon">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="#" class="contact-social-icon">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="#" class="contact-social-icon">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                            <a href="#" class="contact-social-icon">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </div>

                        <!-- Texte légal RGPD -->
                        <div class="contact-legal-text">
                            <p>Les informations recueillies via ce formulaire sont enregistrées par Zypp afin de répondre à votre demande de contact. Elles ne seront pas utilisées à d'autres fins. Conformément au RGPD, vous pouvez exercer vos droits d'accès, de rectification et de suppression de vos données en écrivant à : contact@zypp.fr</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Article de droite - Formulaire -->
            <div class="col-lg-9 contact-form-col">
                <div class="contact-form-container">
                    <form method="post" action="#" class="contact-form">
                        <!-- Prénom et Nom côte à côte -->
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="prenom" class="form-label">Prénom</label>
                                <input type="text" class="form-control" id="prenom" name="prenom" required>
                            </div>
                            <div class="col-md-6">
                                <label for="nom" class="form-label">Nom de famille</label>
                                <input type="text" class="form-control" id="nom" name="nom" required>
                            </div>
                        </div>

                        <!-- Email seul -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Email*</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>

                        <!-- Message -->
                        <div class="mb-4">
                            <label for="message" class="form-label">Message</label>
                            <textarea class="form-control" id="message" name="message" rows="6" required></textarea>
                        </div>

                        <!-- Bouton Envoyer -->
                        <button type="submit" class="btn contact-submit-btn">Envoyer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>


<?php include __DIR__ . '/partials/footer.php'; ?>
</body>
</html>
