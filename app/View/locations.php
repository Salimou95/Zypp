<?php require_once __DIR__ . '/../config.php'; ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mes locations</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= ASSETS_URL ?>/css/style.css">
    <script src="<?= ASSETS_URL ?>/js/script.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" defer></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body class="d-flex flex-column min-vh-100">
<?php if (session_status() === PHP_SESSION_NONE) session_start(); ?>
<?php include __DIR__ . '/partials/nav.php'; ?>
<div class="container my-4 flex-grow-1">
    <h1 class="mb-4">Mes locations</h1>
    <?php if (isset($error)): ?>
        <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>
    <?php if (empty($locations)): ?>
        <div class="alert alert-info">Aucune location trouvée.</div>
    <?php else: ?>
        <div class="table-responsive">
            <table class="table table-striped align-middle">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Trottinette</th>
                    <th>Début</th>
                    <th>Fin</th>
                    <th>Durée (min)</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($locations as $loc):
                    $debut = $loc['date_debut'] ? new DateTime($loc['date_debut']) : null;
                    $fin   = $loc['date_fin'] ? new DateTime($loc['date_fin']) : null;
                    $duree = ($debut && $fin) ? round(($fin->getTimestamp() - $debut->getTimestamp())/60) : '-';
                ?>
                    <tr>
                        <td><?= (int)$loc['id_location'] ?></td>
                        <td><?= htmlspecialchars($loc['trottinette'] ?? 'N/A') ?></td>
                        <td><?= $debut ? $debut->format('d/m/Y H:i') : '-' ?></td>
                        <td><?= $fin ? $fin->format('d/m/Y H:i') : '-' ?></td>
                        <td><?= $duree ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>
</div>
<?php include __DIR__ . '/partials/footer.php'; ?>
</body>
</html>

