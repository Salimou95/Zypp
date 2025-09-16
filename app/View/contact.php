<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Contact</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/Zypp/assets/css/style.css">
    <script src="/Zypp/public/assets/js/script.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" defer></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body class="d-flex flex-column min-vh-100">
    <?php include __DIR__ . '/partials/nav.php'; ?>
    <section class="container py-5">
        <h1 class="mb-4 text-center">Contact</h1>
        <div class="row justify-content-center">
            <div class="col-md-7 col-lg-6">
                <form method="post" action="#" class="bg-white p-4 rounded shadow-sm">
                    <div class="mb-3">
                        <label for="nom" class="form-label">Nom</label>
                        <input type="text" class="form-control" id="nom" name="nom" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Message</label>
                        <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                    </div>
                    <button type="submit" class="btn hero-btn w-100">Envoyer</button>
                </form>
            </div>
        </div>
    </section>
    <?php include __DIR__ . '/partials/footer.php'; ?>
</body>
</html>

