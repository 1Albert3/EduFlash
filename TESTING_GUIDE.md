# 🧪 GUIDE DE TEST - EDUFLASH

## 🔗 **LIEN GITHUB**
**Repository** : https://github.com/1Albert3/EduFlash

---

## 🚀 **INSTALLATION RAPIDE POUR TESTEURS**

### **Prérequis**
- PHP 8.2+
- Composer
- MySQL/MariaDB
- Git

### **Installation en 5 minutes**
```bash
# 1. Cloner le projet
git clone https://github.com/1Albert3/EduFlash.git
cd EduFlash

# 2. Installer les dépendances
composer install

# 3. Configuration
cp .env.example .env
php artisan key:generate

# 4. Base de données (créer 'eduflash' dans MySQL)
php artisan migrate
php artisan db:seed

# 5. Lancer le serveur
php artisan serve
```

**URL de test** : http://localhost:8000

---

## 👥 **COMPTES DE TEST**

### **Administrateur**
- **Email** : admin@eduflash.com
- **Mot de passe** : password
- **Accès** : Panel admin complet

### **Éditeur**
- **Email** : editor@eduflash.com  
- **Mot de passe** : password
- **Accès** : Gestion contenus

### **Utilisateur Normal**
- **S'inscrire** avec votre email
- **Ou créer** un compte test

---

## 🎯 **SCÉNARIOS DE TEST**

### **Test 1 : Navigation Générale**
- [ ] Page d'accueil s'affiche correctement
- [ ] Menu de navigation fonctionne
- [ ] Recherche de flashcards
- [ ] Changement de langue (FR/EN)
- [ ] Design responsive sur mobile

### **Test 2 : Authentification**
- [ ] Inscription nouvel utilisateur
- [ ] Connexion/Déconnexion
- [ ] Récupération mot de passe
- [ ] Vérification email (logs)

### **Test 3 : Fonctionnalités Utilisateur**
- [ ] Consulter les flashcards
- [ ] Ajouter/Retirer des favoris
- [ ] Faire un quiz interactif
- [ ] Voir le tableau de bord
- [ ] Recherche avancée

### **Test 4 : Système Premium**
- [ ] Page d'abonnement
- [ ] Processus de paiement (démo)
- [ ] Accès contenu Premium
- [ ] Export PDF (Premium)

### **Test 5 : Administration**
- [ ] Connexion admin
- [ ] Gestion des flashcards
- [ ] Création/Modification contenu
- [ ] Statistiques dashboard

---

## 🐛 **SIGNALER DES BUGS**

### **Informations à Fournir**
1. **Navigateur** : Chrome, Firefox, Safari, Edge
2. **Appareil** : Desktop, Mobile, Tablette
3. **Étapes** : Comment reproduire le bug
4. **Résultat attendu** vs **Résultat obtenu**
5. **Capture d'écran** si possible

### **Où Signaler**
- **GitHub Issues** : https://github.com/1Albert3/EduFlash/issues
- **Email** : albertnaba116@gmail.com

### **Template de Bug Report**
```
**Bug Description**
Description claire du problème

**Steps to Reproduce**
1. Aller sur...
2. Cliquer sur...
3. Voir l'erreur...

**Expected Behavior**
Ce qui devrait se passer

**Actual Behavior**
Ce qui se passe réellement

**Environment**
- OS: Windows/Mac/Linux
- Browser: Chrome 120
- Device: Desktop/Mobile
```

---

## ✅ **CHECKLIST DE TEST**

### **Fonctionnalités Critiques**
- [ ] **Accueil** : Affichage flashcards vedettes
- [ ] **Recherche** : Résultats pertinents
- [ ] **Auth** : Inscription/Connexion
- [ ] **Favoris** : Ajout/Suppression
- [ ] **Quiz** : Questions/Réponses/Score
- [ ] **Premium** : Processus paiement
- [ ] **Admin** : Gestion contenu
- [ ] **Mobile** : Interface responsive

### **Performance**
- [ ] **Vitesse** : Pages < 2 secondes
- [ ] **Mobile** : Navigation fluide
- [ ] **Images** : Chargement correct
- [ ] **Formulaires** : Validation temps réel

### **Sécurité**
- [ ] **CSRF** : Protection formulaires
- [ ] **XSS** : Pas d'injection script
- [ ] **Auth** : Accès restreint admin
- [ ] **Données** : Pas d'exposition sensible

---

## 📱 **TEST MULTI-APPAREILS**

### **Desktop**
- **Chrome** (Windows/Mac/Linux)
- **Firefox** (Windows/Mac/Linux)  
- **Safari** (Mac)
- **Edge** (Windows)

### **Mobile**
- **Chrome Mobile** (Android)
- **Safari Mobile** (iOS)
- **Samsung Internet** (Android)

### **Tablette**
- **iPad** (Safari)
- **Android Tablet** (Chrome)

---

## 🎨 **TEST DESIGN & UX**

### **Interface**
- [ ] **Couleurs** : Thème universitaire (gris/or)
- [ ] **Typographie** : Lisible et cohérente
- [ ] **Boutons** : États hover/active
- [ ] **Formulaires** : Design moderne
- [ ] **Cards** : Ombres et espacement

### **Navigation**
- [ ] **Menu** : Intuitif et accessible
- [ ] **Breadcrumbs** : Orientation claire
- [ ] **Pagination** : Fonctionnelle
- [ ] **Recherche** : Facile à utiliser

### **Responsive**
- [ ] **Mobile** : Menu hamburger
- [ ] **Tablette** : Adaptation layout
- [ ] **Desktop** : Utilisation espace
- [ ] **Zoom** : Support 200%

---

## 📊 **DONNÉES DE TEST**

### **Contenu Disponible**
- **5 Catégories** : Langues, Informatique, Business, etc.
- **Flashcards** : Contenu bilingue FR/EN
- **Quiz** : Questions interactives
- **Utilisateurs** : Admin, Éditeur, Test

### **Fonctionnalités Actives**
- ✅ **Authentification** complète
- ✅ **Gestion contenus** admin
- ✅ **Système favoris**
- ✅ **Quiz interactifs**
- ✅ **Abonnement Premium**
- ✅ **Export PDF**
- ✅ **Multilingue** FR/EN
- ✅ **Responsive** design

---

## 🏆 **FEEDBACK ATTENDU**

### **Points d'Évaluation**
1. **Facilité d'utilisation** (1-10)
2. **Design/Esthétique** (1-10)
3. **Performance** (1-10)
4. **Fonctionnalités** (1-10)
5. **Mobile Experience** (1-10)

### **Questions Spécifiques**
- L'interface est-elle intuitive ?
- Le processus d'inscription est-il fluide ?
- Les flashcards sont-elles utiles ?
- Le système Premium est-il clair ?
- Recommanderiez-vous à un étudiant ?

---

## 🎯 **OBJECTIFS DU TEST**

### **Validation Technique**
- Stabilité de l'application
- Performance sur différents appareils
- Compatibilité navigateurs
- Sécurité des données

### **Validation UX**
- Facilité de navigation
- Clarté des fonctionnalités
- Attractivité du design
- Utilité pédagogique

### **Validation Business**
- Compréhension du concept
- Intérêt pour l'abonnement Premium
- Potentiel d'adoption étudiante
- Différenciation concurrentielle

---

## 📞 **CONTACT DÉVELOPPEUR**

- **GitHub** : https://github.com/1Albert3
- **Email** : albertnaba116@gmail.com
- **Issues** : https://github.com/1Albert3/EduFlash/issues

---

**Merci de tester EduFlash ! Votre feedback est précieux pour améliorer la plateforme ! 🙏**