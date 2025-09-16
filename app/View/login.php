<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
    <h2>Connexion</h2>
    <?php if (!empty($message)) : ?>
        <div class="alert"> <?= htmlspecialchars($message) ?> </div>
    <?php endif; ?>
    <form method="post">
        <label>Email :</label>
        <input type="email" name="mail" required><br>
        <label>Mot de passe :</label>
        <input type="password" name="password" required><br>
        <button type="submit">Se connecter</button>
    </form>
    <p>Pas encore de compte ? <a href="/Zypp/auth/register">Inscription</a></p>
</body>
</html>
