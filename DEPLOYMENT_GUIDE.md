# 🚀 GUIDE DE DÉPLOIEMENT EDUFLASH

## 📋 **PRÉREQUIS SERVEUR**

### **Spécifications Minimales**
- **CPU** : 2 vCPU
- **RAM** : 4 GB
- **Stockage** : 50 GB SSD
- **Bande passante** : 100 Mbps

### **Stack Technique**
- **OS** : Ubuntu 22.04 LTS
- **Web Server** : Nginx 1.18+
- **PHP** : 8.2+
- **Base de données** : MySQL 8.0+
- **Cache** : Redis 6.0+
- **SSL** : Let's Encrypt

---

## 🏗️ **MÉTHODES DE DÉPLOIEMENT**

## **OPTION 1 : HÉBERGEMENT PARTAGÉ (Budget : 5-15€/mois)**

### **Hébergeurs Recommandés**
- **OVH** : Perso 2014 (9.99€/mois)
- **Hostinger** : Premium (2.99€/mois)
- **PlanetHoster** : The World (6€/mois)

### **Procédure Hébergement Partagé**
```bash
# 1. Préparer les fichiers
composer install --optimize-autoloader --no-dev
php artisan config:cache
php artisan route:cache
php artisan view:cache

# 2. Créer l'archive
zip -r eduflash.zip . -x "node_modules/*" "tests/*" ".git/*"

# 3. Upload via FTP/cPanel
# 4. Extraire dans public_html/
# 5. Configurer .env avec données hébergeur
```

### **Configuration .env Hébergement Partagé**
```env
APP_ENV=production
APP_DEBUG=false
APP_URL=https://votre-domaine.com

DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=votre_db
DB_USERNAME=votre_user
DB_PASSWORD=votre_password

CACHE_DRIVER=file
SESSION_DRIVER=file
QUEUE_CONNECTION=sync
```

---

## **OPTION 2 : VPS (Budget : 15-50€/mois)**

### **Fournisseurs VPS Recommandés**
- **DigitalOcean** : Droplet 4GB (24$/mois)
- **Vultr** : High Frequency 2GB (12$/mois)
- **OVH** : VPS SSD 2 (7.19€/mois)
- **Contabo** : VPS S (4.99€/mois)

### **Installation Serveur Ubuntu**
```bash
# 1. Mise à jour système
sudo apt update && sudo apt upgrade -y

# 2. Installation PHP 8.2
sudo add-apt-repository ppa:ondrej/php
sudo apt install php8.2 php8.2-fpm php8.2-mysql php8.2-xml php8.2-curl php8.2-zip php8.2-mbstring php8.2-gd

# 3. Installation MySQL
sudo apt install mysql-server
sudo mysql_secure_installation

# 4. Installation Nginx
sudo apt install nginx

# 5. Installation Composer
curl -sS https://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/composer

# 6. Installation Redis
sudo apt install redis-server

# 7. Installation Certbot (SSL)
sudo apt install certbot python3-certbot-nginx
```

### **Configuration Nginx**
```nginx
# /etc/nginx/sites-available/eduflash
server {
    listen 80;
    server_name votre-domaine.com www.votre-domaine.com;
    root /var/www/eduflash/public;
    index index.php index.html;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php8.2-fpm.sock;
        fastcgi_index index.php;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
    }

    location ~ /\.ht {
        deny all;
    }

    # Gzip compression
    gzip on;
    gzip_types text/css application/javascript text/javascript application/json;
    
    # Cache static files
    location ~* \.(jpg|jpeg|png|gif|ico|css|js)$ {
        expires 1y;
        add_header Cache-Control "public, immutable";
    }
}
```

### **Déploiement sur VPS**
```bash
# 1. Cloner le projet
cd /var/www
sudo git clone https://github.com/votre-repo/eduflash.git
sudo chown -R www-data:www-data eduflash

# 2. Installation dépendances
cd eduflash
composer install --optimize-autoloader --no-dev

# 3. Configuration
cp .env.example .env
php artisan key:generate

# 4. Base de données
mysql -u root -p
CREATE DATABASE eduflash;
CREATE USER 'eduflash'@'localhost' IDENTIFIED BY 'mot_de_passe_fort';
GRANT ALL PRIVILEGES ON eduflash.* TO 'eduflash'@'localhost';

# 5. Migrations
php artisan migrate --force
php artisan db:seed --force

# 6. Permissions
sudo chown -R www-data:www-data storage bootstrap/cache
sudo chmod -R 775 storage bootstrap/cache

# 7. Optimisations
php artisan config:cache
php artisan route:cache
php artisan view:cache

# 8. SSL
sudo certbot --nginx -d votre-domaine.com -d www.votre-domaine.com
```

---

## **OPTION 3 : CLOUD HOSTING (Budget : 20-100€/mois)**

### **Plateformes Cloud Recommandées**

#### **AWS Lightsail**
```bash
# Instance 2GB RAM - 20$/mois
# 1. Créer instance Ubuntu 22.04
# 2. Suivre procédure VPS
# 3. Configurer Load Balancer si nécessaire
```

#### **Google Cloud Platform**
```bash
# Compute Engine e2-medium - 25$/mois
# 1. Créer VM Ubuntu 22.04
# 2. Configurer firewall (ports 80, 443)
# 3. Suivre procédure VPS
```

#### **Heroku (PaaS)**
```bash
# Dyno Standard-1X - 25$/mois
# 1. Installer Heroku CLI
heroku create eduflash-app

# 2. Configurer variables
heroku config:set APP_ENV=production
heroku config:set APP_KEY=base64:votre-clé

# 3. Ajouter base de données
heroku addons:create cleardb:ignite

# 4. Déployer
git push heroku main
heroku run php artisan migrate --force
```

---

## **OPTION 4 : DÉPLOIEMENT AUTOMATISÉ**

### **Script de Déploiement**
```bash
#!/bin/bash
# deploy.sh

echo "🚀 Déploiement EduFlash..."

# Variables
REPO_URL="https://github.com/votre-repo/eduflash.git"
DEPLOY_PATH="/var/www/eduflash"
BACKUP_PATH="/var/backups/eduflash"

# Sauvegarde
echo "📦 Sauvegarde..."
sudo mysqldump eduflash > $BACKUP_PATH/db_$(date +%Y%m%d_%H%M%S).sql
sudo tar -czf $BACKUP_PATH/files_$(date +%Y%m%d_%H%M%S).tar.gz $DEPLOY_PATH

# Mise à jour code
echo "📥 Mise à jour du code..."
cd $DEPLOY_PATH
sudo git pull origin main

# Dépendances
echo "📦 Installation dépendances..."
composer install --optimize-autoloader --no-dev

# Base de données
echo "🗄️ Migrations..."
php artisan migrate --force

# Cache
echo "⚡ Optimisations..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Permissions
sudo chown -R www-data:www-data storage bootstrap/cache

# Redémarrage services
sudo systemctl reload nginx
sudo systemctl restart php8.2-fpm

echo "✅ Déploiement terminé !"
```

### **GitHub Actions (CI/CD)**
```yaml
# .github/workflows/deploy.yml
name: Deploy to Production

on:
  push:
    branches: [ main ]

jobs:
  deploy:
    runs-on: ubuntu-latest
    
    steps:
    - name: Deploy to server
      uses: appleboy/ssh-action@v0.1.5
      with:
        host: ${{ secrets.HOST }}
        username: ${{ secrets.USERNAME }}
        key: ${{ secrets.SSH_KEY }}
        script: |
          cd /var/www/eduflash
          ./deploy.sh
```

---

## 🔧 **CONFIGURATION PRODUCTION**

### **Optimisations Performance**
```bash
# PHP-FPM
sudo nano /etc/php/8.2/fpm/pool.d/www.conf
# pm.max_children = 50
# pm.start_servers = 5
# pm.min_spare_servers = 5
# pm.max_spare_servers = 35

# MySQL
sudo nano /etc/mysql/mysql.conf.d/mysqld.cnf
# innodb_buffer_pool_size = 1G
# query_cache_size = 64M

# Redis
sudo nano /etc/redis/redis.conf
# maxmemory 256mb
# maxmemory-policy allkeys-lru
```

### **Monitoring & Logs**
```bash
# Logrotate
sudo nano /etc/logrotate.d/eduflash
/var/www/eduflash/storage/logs/*.log {
    daily
    missingok
    rotate 14
    compress
    notifempty
    create 644 www-data www-data
}

# Crontab pour maintenance
sudo crontab -e
# Nettoyage logs
0 2 * * * find /var/www/eduflash/storage/logs -name "*.log" -mtime +30 -delete
# Sauvegarde DB
0 3 * * * mysqldump eduflash > /var/backups/eduflash/db_$(date +\%Y\%m\%d).sql
```

---

## 🔒 **SÉCURITÉ PRODUCTION**

### **Firewall UFW**
```bash
sudo ufw enable
sudo ufw allow ssh
sudo ufw allow 'Nginx Full'
sudo ufw deny 3306  # MySQL uniquement en local
```

### **Fail2Ban**
```bash
sudo apt install fail2ban
sudo nano /etc/fail2ban/jail.local

[nginx-http-auth]
enabled = true
filter = nginx-http-auth
logpath = /var/log/nginx/error.log
maxretry = 3
bantime = 3600
```

### **SSL/TLS**
```bash
# Renouvellement automatique
sudo crontab -e
0 12 * * * /usr/bin/certbot renew --quiet
```

---

## 📊 **MONITORING**

### **Uptime Monitoring**
- **UptimeRobot** : Gratuit (5 min intervals)
- **Pingdom** : 10$/mois (1 min intervals)

### **Performance Monitoring**
```bash
# Installation New Relic
echo 'deb http://apt.newrelic.com/debian/ newrelic non-free' | sudo tee /etc/apt/sources.list.d/newrelic.list
wget -O- https://download.newrelic.com/548C16BF.gpg | sudo apt-key add -
sudo apt update
sudo apt install newrelic-php5
```

---

## 💰 **COÛTS ESTIMÉS**

### **Hébergement Partagé**
- **Domaine** : 10€/an
- **Hébergement** : 120€/an
- **SSL** : Inclus
- **Total** : **130€/an**

### **VPS**
- **Domaine** : 10€/an
- **VPS** : 300€/an
- **Monitoring** : 120€/an
- **Backups** : 60€/an
- **Total** : **490€/an**

### **Cloud**
- **Domaine** : 10€/an
- **Hosting** : 600€/an
- **CDN** : 120€/an
- **Monitoring** : 240€/an
- **Total** : **970€/an**

---

## ✅ **CHECKLIST DÉPLOIEMENT**

### **Pré-déploiement**
- [ ] Tests passent (PHPUnit)
- [ ] Code review terminé
- [ ] Base de données sauvegardée
- [ ] Variables .env configurées
- [ ] SSL certificat prêt

### **Déploiement**
- [ ] Code déployé
- [ ] Migrations exécutées
- [ ] Cache optimisé
- [ ] Permissions correctes
- [ ] Services redémarrés

### **Post-déploiement**
- [ ] Site accessible
- [ ] Fonctionnalités testées
- [ ] Monitoring actif
- [ ] Logs vérifiés
- [ ] Performance validée

---

## 🆘 **DÉPANNAGE**

### **Erreurs Communes**
```bash
# Erreur 500
sudo tail -f /var/log/nginx/error.log
sudo tail -f /var/www/eduflash/storage/logs/laravel.log

# Permissions
sudo chown -R www-data:www-data /var/www/eduflash
sudo chmod -R 755 /var/www/eduflash
sudo chmod -R 775 /var/www/eduflash/storage
sudo chmod -R 775 /var/www/eduflash/bootstrap/cache

# Cache
php artisan cache:clear
php artisan config:clear
php artisan view:clear
```

### **Rollback**
```bash
# Restaurer base de données
mysql -u root -p eduflash < /var/backups/eduflash/db_backup.sql

# Restaurer fichiers
sudo tar -xzf /var/backups/eduflash/files_backup.tar.gz -C /var/www/
```

---

**EduFlash est maintenant prêt pour la production ! 🚀**