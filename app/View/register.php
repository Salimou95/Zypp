<?php require_once __DIR__ . '/../config.php'; ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription - ZYPP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="<?= ASSETS_URL ?>/css/style.css">
    <link rel="stylesheet" href="<?= ASSETS_URL ?>/css/mobile.css?v=1">
    <script src="<?= ASSETS_URL ?>/js/script.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" defer></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body class="d-flex flex-column min-vh-100">
<?php if (session_status() === PHP_SESSION_NONE) session_start(); ?>
<?php include __DIR__ . '/partials/nav.php'; ?>

<div class="container my-5 flex-grow-1">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <div class="card shadow-lg border-0 auth-card">
                <div class="card-body p-5">
                    <div class="text-center mb-4">
                        <h2 class="fw-bold mb-2" style="color: #0D2139;">Inscription</h2>
                        <p class="mb-0" style="color: #666666; font-size: 0.95rem;">Créez votre compte ZYPP gratuitement</p>
                    </div>

                    <?php if (!empty($message)) : ?>
                        <div class="alert <?= strpos($message, 'réussie') !== false ? 'alert-success' : 'alert-danger' ?> alert-dismissible fade show" role="alert">
                            <?= htmlspecialchars($message) ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    <?php endif; ?>

                    <form method="post">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="firstName" class="form-label" style="color: #333333; font-weight: 600;">Prénom</label>
                                <input type="text" class="form-control" id="firstName" name="firstName" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="lastName" class="form-label" style="color: #333333; font-weight: 600;">Nom</label>
                                <input type="text" class="form-control" id="lastName" name="lastName" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="mail" class="form-label" style="color: #333333; font-weight: 600;">Email</label>
                            <input type="email" class="form-control" id="mail" name="mail" required>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label" style="color: #333333; font-weight: 600;">Mot de passe</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                            <div class="form-text" style="color: #888888; font-size: 0.85rem;">
                                Le mot de passe doit contenir au moins 8 caractères avec une majuscule, une minuscule, un chiffre et un caractère spécial.
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary w-100 mb-3">S'inscrire</button>
                    </form>

                    <div class="text-center">
                        <p class="mb-0" style="color: #666666;">Déjà inscrit ?
                            <a href="<?= ROOT_URL ?>/auth/login" class="text-decoration-none fw-semibold" style="color: #0D2139;">Se connecter</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include __DIR__ . '/partials/footer.php'; ?>
</body>
</html>
