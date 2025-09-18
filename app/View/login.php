<?php require_once __DIR__ . '/../config.php'; ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion - ZYPP</title>
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
        <div class="col-md-6 col-lg-4">
            <div class="card shadow-lg border-0 auth-card">
                <div class="card-body p-5">
                    <div class="text-center mb-4">
                        <h1 class="fw-bold mb-2" style="color: #0D2139;">Connexion</h1>
                        <p class="mb-0" style="color: #666666; font-size: 0.95rem;">Connectez-vous à votre compte ZYPP</p>
                    </div>

                    <?php if (!empty($message)) : ?>
                        <div class="alert <?= strpos($message, 'réussie') !== false ? 'alert-success' : 'alert-danger' ?> alert-dismissible fade show" role="alert">
                            <?= htmlspecialchars($message) ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    <?php endif; ?>

                    <form method="post">
                        <div class="mb-3">
                            <label for="mail" class="form-label" style="color: #333333; font-weight: 600;">Email</label>
                            <input type="email" class="form-control" id="mail" name="mail" required>
                        </div>

                        <div class="mb-4">
                            <label for="password" class="form-label" style="color: #333333; font-weight: 600;">Mot de passe</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>

                        <button type="submit" class="btn btn-primary w-100 mb-3">Se connecter</button>
                    </form>

                    <div class="text-center">
                        <p class="mb-0" style="color: #666666;">Pas encore de compte ?
                            <a href="<?= ROOT_URL ?>/auth/register" class="text-decoration-none fw-semibold" style="color: #0D2139;">Créer un compte</a>
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
