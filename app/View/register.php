<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
    <h2>Inscription</h2>
    <?php if (!empty($message)) : ?>
        <div class="alert"> <?= htmlspecialchars($message) ?> </div>
    <?php endif; ?>
    <form method="post">
        <label>Prénom :</label>
        <input type="text" name="firstName" required><br>
        <label>Nom :</label>
        <input type="text" name="lastName" required><br>
        <label>Email :</label>
        <input type="email" name="mail" required><br>
        <label>Mot de passe :</label>
        <input type="password" name="password" required><br>
        <button type="submit">S'inscrire</button>
    </form>
    <p>Déjà inscrit ? <a href="/Zypp/auth/login">Connexion</a></p>
</body>
</html>
