# Configuration Email pour Heroku - OPTIMISÉ MAILGUN

## 🚀 OPTION 1 : Mailgun (RECOMMANDÉE - 5000 emails/mois gratuits)

### Étape 1 : Créer un compte Mailgun
1. Allez sur https://www.mailgun.com/
2. Créez un compte gratuit (5000 emails/mois)
3. Vérifiez votre email

### Étape 2 : Obtenir vos clés API
1. Dans votre dashboard Mailgun, allez dans "API Keys"
2. Copiez votre "Private API key"
3. Notez votre domaine sandbox (ex: sandbox123.mailgun.org)

### Étape 3 : Configuration Heroku
Dans votre dashboard Heroku > Settings > Config Vars, ajoutez :
```
MAILGUN_API_KEY=key-votre-clé-privée-mailgun
MAILGUN_DOMAIN=sandbox123.mailgun.org
CONTACT_EMAIL=salimoudiaby95@gmail.com
```

### Étape 4 : Déployer
```bash
git add .
git commit -m "Configuration Mailgun pour emails"
git push heroku main
```

## ✅ RÉSULTAT
- Les emails du formulaire de contact arriveront instantanément dans salimoudiaby95@gmail.com
- Template HTML professionnel
- Reply-To configuré pour répondre directement au visiteur

## 🔄 OPTION 2 : SendGrid (Alternative)
Si vous préférez SendGrid :
```bash
heroku addons:create sendgrid:starter
```
Puis ajoutez seulement :
```
CONTACT_EMAIL=salimoudiaby95@gmail.com
```

## 🛠️ OPTION 3 : Fallback automatique
Si aucun service n'est configuré, les messages sont sauvegardés automatiquement dans les logs Heroku.

## 📧 TEST EN PRODUCTION
1. Visitez votre-site.herokuapp.com/contact
2. Remplissez le formulaire
3. Vérifiez salimoudiaby95@gmail.com
4. Consultez les logs avec : `heroku logs --tail`

Le système priorise maintenant Mailgun ! 🎉
