@echo off
echo ========================================
echo    EDUFLASH - DEPLOIEMENT WINDOWS
echo ========================================
echo.

REM Vérifier si Git est installé
git --version >nul 2>&1
if errorlevel 1 (
    echo ❌ Git n'est pas installé !
    echo Téléchargez Git : https://git-scm.com/download/win
    pause
    exit /b 1
)

echo ✅ Git détecté

REM Initialiser le repository si nécessaire
if not exist ".git" (
    echo 📦 Initialisation du repository Git...
    git init
    git add .
    git commit -m "🎓 Initial commit - EduFlash v1.0"
)

REM Demander l'URL du repository GitHub
set /p REPO_URL="🔗 URL de votre repository GitHub (ex: https://github.com/username/eduflash.git): "

if "%REPO_URL%"=="" (
    echo ❌ URL du repository requise !
    pause
    exit /b 1
)

REM Ajouter l'origine remote
git remote remove origin >nul 2>&1
git remote add origin %REPO_URL%

echo 📤 Push vers GitHub...
git branch -M main
git push -u origin main

if errorlevel 0 (
    echo.
    echo ========================================
    echo ✅ SUCCÈS ! Projet poussé vers GitHub
    echo ========================================
    echo.
    echo 🔗 Votre repository : %REPO_URL%
    echo 📋 Prochaines étapes :
    echo    1. Vérifier sur GitHub que tout est là
    echo    2. Configurer les secrets pour le déploiement
    echo    3. Suivre DEPLOYMENT_GUIDE.md
    echo.
) else (
    echo.
    echo ❌ Erreur lors du push !
    echo Vérifiez vos identifiants GitHub
    echo.
)

pause