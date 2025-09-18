<?php require_once __DIR__ . '/../config.php'; ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mes locations - ZYPP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="<?= ASSETS_URL ?>/css/style.css">
    <script src="<?= ASSETS_URL ?>/js/script.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" defer></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body class="d-flex flex-column min-vh-100">
<?php if (session_status() === PHP_SESSION_NONE) session_start(); ?>
<?php include __DIR__ . '/partials/nav.php'; ?>

<div class="container my-5 flex-grow-1">
    <div class="row">
        <div class="col-12">
            <h1 class="mb-4" style="color: #272b7c;">Mes trajets</h1>

            <?php if (isset($error)): ?>
                <div class="alert alert-danger">
                    <?= htmlspecialchars($error) ?>
                </div>
            <?php endif; ?>

            <?php if (empty($locations)): ?>
                <div class="text-center py-5">
                    <i class="fas fa-scooter mb-3" style="font-size: 4rem; color: #97ecd3;"></i>
                    <h3 style="color: #272b7c;">Aucun trajet effectué</h3>
                    <p class="text-muted">Commencez votre première aventure avec ZYPP !</p>
                    <a href="<?= ROOT_URL ?>/" class="btn btn-primary mt-3">Découvrir les trottinettes</a>
                </div>
            <?php else: ?>
                <div class="row">
                    <?php foreach ($locations as $loc):
                        $debut = $loc['date_debut'] ? new DateTime($loc['date_debut']) : null;
                        $fin   = $loc['date_fin'] ? new DateTime($loc['date_fin']) : null;
                        $duree = ($debut && $fin) ? round(($fin->getTimestamp() - $debut->getTimestamp())/60) : null;
                        $isActive = !$fin;
                    ?>
                        <div class="col-md-6 col-lg-4 mb-4">
                            <div class="card h-100">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-start mb-3">
                                        <h5 class="card-title mb-0" style="color: #272b7c;">
                                            <?= htmlspecialchars($loc['trottinette'] ?? 'ZYPPI-' . str_pad($loc['id_location'], 3, '0', STR_PAD_LEFT)) ?>
                                        </h5>
                                        <?php if ($isActive): ?>
                                            <span class="badge bg-warning">En cours</span>
                                        <?php else: ?>
                                            <span class="badge bg-success">Terminé</span>
                                        <?php endif; ?>
                                    </div>

                                    <div class="mb-2">
                                        <small class="text-muted">Début :</small>
                                        <?php if ($debut): ?>
                                            <div><?= $debut->format('d/m/Y à H:i') ?></div>
                                        <?php else: ?>
                                            <div class="text-muted">-</div>
                                        <?php endif; ?>
                                    </div>

                                    <div class="mb-2">
                                        <small class="text-muted">Fin :</small>
                                        <?php if ($fin): ?>
                                            <div><?= $fin->format('d/m/Y à H:i') ?></div>
                                        <?php else: ?>
                                            <div class="text-warning">En cours...</div>
                                        <?php endif; ?>
                                    </div>

                                    <?php if ($duree): ?>
                                        <div class="mt-3">
                                            <small class="text-muted">Durée :</small>
                                            <div class="fw-bold" style="color: #272b7c;"><?= $duree ?> minutes</div>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php include __DIR__ . '/partials/footer.php'; ?>
</body>
</html>
