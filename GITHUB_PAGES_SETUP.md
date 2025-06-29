# 🔧 ACTIVATION GITHUB PAGES

## 📋 **ÉTAPES OBLIGATOIRES**

### **1. Aller sur votre Repository**
https://github.com/1Albert3/EduFlash

### **2. Cliquer sur "Settings"**
- En haut à droite du repository
- Onglet avec l'icône ⚙️

### **3. Descendre jusqu'à "Pages"**
- Dans le menu de gauche
- Section "Code and automation"

### **4. Configurer la Source**
- **Source** : `Deploy from a branch`
- **Branch** : `main`
- **Folder** : `/docs`
- **Save**

### **5. Attendre 2-5 minutes**
- GitHub génère le site
- Rafraîchir la page Settings

### **6. Votre lien sera :**
https://1albert3.github.io/EduFlash/

---

## 🔍 **VÉRIFICATIONS**

### **Fichier présent ?**
✅ `docs/index.html` existe dans votre repo

### **Branch correcte ?**
✅ Fichier dans la branche `main`

### **Permissions ?**
- Repository doit être **Public** pour GitHub Pages gratuit
- Ou avoir GitHub Pro pour repo privé

---

## 🚨 **SI ÇA NE MARCHE PAS**

### **Option 1 : Repository Public**
1. Settings → General
2. Danger Zone → Change repository visibility
3. Make public

### **Option 2 : Branche gh-pages**
```bash
# Créer branche spéciale
git checkout --orphan gh-pages
git rm -rf .
cp docs/index.html index.html
git add index.html
git commit -m "GitHub Pages"
git push origin gh-pages

# Puis dans Settings → Pages → Branch : gh-pages
```

### **Option 3 : Root du Repository**
```bash
# Déplacer le fichier
mv docs/index.html index.html
git add index.html
git commit -m "Move demo to root"
git push origin main

# Settings → Pages → Folder : / (root)
```

---

## ✅ **VÉRIFICATION FINALE**

Une fois configuré, vous verrez :
```
✅ Your site is published at https://1albert3.github.io/EduFlash/
```

**Temps d'activation : 2-10 minutes**