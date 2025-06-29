# 📂 GUIDE GITHUB - EDUFLASH

## 🚀 **ÉTAPES RAPIDES**

### **1. Créer le Repository GitHub**
1. Aller sur [github.com](https://github.com)
2. Cliquer **"New repository"**
3. Nom : `eduflash`
4. Description : `Plateforme de micro-apprentissage universitaire`
5. **Public** ou **Private** (selon préférence)
6. ✅ **Ne pas** cocher "Add README" (on a déjà le nôtre)
7. Cliquer **"Create repository"**

### **2. Initialiser Git Local (Windows)**
```bash
# Ouvrir PowerShell/CMD dans le dossier du projet
cd c:\xampp\htdocs\Gestion\eduflash

# Initialiser Git
git init

# Ajouter tous les fichiers
git add .

# Premier commit
git commit -m "🎓 Initial commit - EduFlash v1.0"

# Lier au repository GitHub (remplacer YOUR_USERNAME)
git remote add origin https://github.com/YOUR_USERNAME/eduflash.git

# Pousser vers GitHub
git push -u origin main
```

### **3. Fichiers à Ignorer (.gitignore)**
```gitignore
# Déjà configuré dans le projet
/node_modules
/public/hot
/public/storage
/storage/*.key
/vendor
.env
.env.backup
.phpunit.result.cache
Homestead.json
Homestead.yaml
npm-debug.log*
yarn-error.log
/.idea
/.vscode
```

---

## 🔧 **COMMANDES GIT ESSENTIELLES**

### **Workflow Quotidien**
```bash
# Vérifier le statut
git status

# Ajouter les modifications
git add .

# Commit avec message
git commit -m "✨ Nouvelle fonctionnalité"

# Pousser vers GitHub
git push origin main
```

### **Types de Commits**
```bash
git commit -m "✨ feat: Nouvelle fonctionnalité"
git commit -m "🐛 fix: Correction bug"
git commit -m "📝 docs: Mise à jour documentation"
git commit -m "💄 style: Amélioration UI"
git commit -m "♻️ refactor: Refactorisation code"
git commit -m "⚡ perf: Optimisation performance"
git commit -m "🔒 security: Correction sécurité"
```

---

## 🌿 **GESTION DES BRANCHES**

### **Créer une Branche de Développement**
```bash
# Créer et basculer sur develop
git checkout -b develop

# Pousser la branche
git push -u origin develop

# Créer une feature
git checkout -b feature/nouvelle-fonctionnalite

# Merger dans develop
git checkout develop
git merge feature/nouvelle-fonctionnalite
git push origin develop
```

---

## 🔐 **SÉCURITÉ & VARIABLES**

### **Variables d'Environnement GitHub**
1. Aller dans **Settings** > **Secrets and variables** > **Actions**
2. Ajouter ces secrets :

```
HOST=votre-serveur.com
USERNAME=votre-user
SSH_KEY=votre-clé-privée
DB_PASSWORD=mot-de-passe-db
```

### **Fichier .env.example**
```env
APP_NAME=EduFlash
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_TIMEZONE=UTC
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=eduflash
DB_USERNAME=root
DB_PASSWORD=

CACHE_STORE=file
SESSION_DRIVER=file
QUEUE_CONNECTION=sync

MAIL_MAILER=log
MAIL_HOST=127.0.0.1
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="noreply@eduflash.com"
MAIL_FROM_NAME="EduFlash"
```

---

## 📋 **README GITHUB**

### **Badges à Ajouter**
```markdown
![Laravel](https://img.shields.io/badge/Laravel-12.19.3-red)
![PHP](https://img.shields.io/badge/PHP-8.2+-blue)
![MySQL](https://img.shields.io/badge/MySQL-8.0+-orange)
![License](https://img.shields.io/badge/License-MIT-green)
![Status](https://img.shields.io/badge/Status-Production%20Ready-brightgreen)
```

---

## 🚀 **DÉPLOIEMENT DEPUIS GITHUB**

### **Option 1 : Déploiement Manuel**
```bash
# Sur le serveur
git clone https://github.com/YOUR_USERNAME/eduflash.git
cd eduflash
composer install --no-dev
cp .env.example .env
php artisan key:generate
php artisan migrate --force
```

### **Option 2 : GitHub Actions (Automatique)**
Le fichier `.github/workflows/ci-cd.yml` est déjà configuré !

---

## 📊 **STRUCTURE REPOSITORY**

```
eduflash/
├── 📋 CAHIER_DES_CHARGES.md
├── 🏗️ STRUCTURE_APPLICATION.md  
├── 🚀 DEPLOYMENT_GUIDE.md
├── 📈 MARKETING_PLAN.md
├── 📂 GITHUB_SETUP.md
├── 📖 README.md
├── ⚙️ .github/workflows/
├── 🎨 public/css/
├── 📱 resources/views/
├── 🔧 app/
├── 🗄️ database/
└── 📦 composer.json
```

---

## ✅ **CHECKLIST GITHUB**

### **Avant de Pousser**
- [ ] Fichier `.env` dans `.gitignore`
- [ ] Pas de mots de passe en dur
- [ ] Tests passent localement
- [ ] Documentation à jour

### **Après Push**
- [ ] Repository visible sur GitHub
- [ ] README s'affiche correctement
- [ ] Actions GitHub fonctionnent
- [ ] Branches protégées configurées

---

## 🔗 **LIENS UTILES**

- **Git pour Windows** : https://git-scm.com/download/win
- **GitHub Desktop** : https://desktop.github.com/
- **Documentation Git** : https://git-scm.com/docs
- **GitHub Actions** : https://docs.github.com/actions

---

## 🆘 **DÉPANNAGE WINDOWS**

### **Erreurs Communes**
```bash
# Erreur CRLF (fins de ligne Windows)
git config --global core.autocrlf true

# Erreur permissions
git config --global user.name "Votre Nom"
git config --global user.email "votre@email.com"

# Erreur authentification
git config --global credential.helper manager-core
```

### **Alternative GitHub Desktop**
Si les commandes Git posent problème :
1. Télécharger **GitHub Desktop**
2. Se connecter avec son compte GitHub
3. **Add Local Repository** → Sélectionner le dossier eduflash
4. **Publish repository** vers GitHub

---

**Votre projet EduFlash sera maintenant sur GitHub et prêt pour le déploiement ! 🎯**