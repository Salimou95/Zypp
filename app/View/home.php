<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Accueil</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/Zypp/assets/css/style.css">
    <script src="/Zypp/public/assets/js/script.js" defer></script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" defer></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body class="d-flex flex-column min-vh-100">
    <?php include __DIR__ . '/partials/nav.php'; ?>
    <section class="hero-section bg-dark-blue text-white py-5 text-start">
        <h1 class="hero-title mb-4">
            <span>La mobilité</span>
            <span>durable&nbsp;à</span>
            <span>portée de main</span>
        </h1>
        <a href="#" class="btn btn-success hero-btn">En savoir plus</a>
    </section>
    <section class="container my-5">
        <div class="row-bloc-services">
            <article itemscope itemtype="https://schema.org/Service">
                <img src="/Zypp/assets/images/Logo.png" alt="Réparation rapide" itemprop="image">
                <h2 itemprop="name"><span>Réparation</span><br><span>rapide</span></h2>
            </article>
            <article itemscope itemtype="https://schema.org/Service">
                <img src="https://via.placeholder.com/48" alt="Equipement électrique" itemprop="image">
                <h2 itemprop="name"><span>Equipement</span><br><span>électrique</span></h2>
            </article>
            <article itemscope itemtype="https://schema.org/Service">
                <img src="https://via.placeholder.com/48" alt="Accompagnement client" itemprop="image">
                <h2 itemprop="name"><span>Accompagnement</span><br><span>client</span></h2>
            </article>
        </div>
    </section>
    <section class="temoignage-section py-5">
        <div class="container">
            <h2 class="text-center mb-4">Témoignage</h2>
        </div>
    </section>
    <?php include __DIR__ . '/partials/footer.php'; ?>
