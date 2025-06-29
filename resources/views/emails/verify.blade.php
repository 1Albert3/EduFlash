<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Vérifiez votre email - EduFlash</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 20px; background: #f5f5f5; }
        .container { max-width: 600px; margin: 0 auto; background: white; padding: 30px; border-radius: 10px; }
        .header { text-align: center; margin-bottom: 30px; }
        .logo { color: #D4AF37; font-size: 2rem; font-weight: bold; }
        .button { display: inline-block; background: #D4AF37; color: #000; padding: 15px 30px; text-decoration: none; border-radius: 5px; font-weight: bold; margin: 20px 0; }
        .footer { text-align: center; margin-top: 30px; color: #666; font-size: 12px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="logo">🎓 EduFlash</div>
            <h2>Vérifiez votre adresse email</h2>
        </div>
        
        <p>Bonjour,</p>
        <p>Merci de vous être inscrit sur EduFlash ! Pour activer votre compte, veuillez cliquer sur le bouton ci-dessous :</p>
        
        <div style="text-align: center;">
            <a href="{{ $url }}" class="button">Vérifier mon email</a>
        </div>
        
        <p>Si le bouton ne fonctionne pas, copiez et collez ce lien dans votre navigateur :</p>
        <p style="word-break: break-all; color: #666;">{{ $url }}</p>
        
        <p>Ce lien expire dans 60 minutes.</p>
        
        <div class="footer">
            <p>EduFlash - Plateforme de Micro-Apprentissage</p>
            <p>Si vous n'avez pas créé de compte, ignorez cet email.</p>
        </div>
    </div>
</body>
</html>