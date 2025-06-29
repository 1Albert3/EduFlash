<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>{{ $flashcard->getTitle(app()->getLocale()) }}</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .header { border-bottom: 2px solid #D4AF37; padding-bottom: 10px; margin-bottom: 20px; }
        .title { color: #4A4A4A; font-size: 24px; font-weight: bold; }
        .category { color: #D4AF37; font-size: 14px; }
        .content { line-height: 1.6; }
        .summary { background: #f5f5f5; padding: 15px; margin: 20px 0; border-left: 4px solid #D4AF37; }
        .footer { margin-top: 30px; text-align: center; color: #666; font-size: 12px; }
    </style>
</head>
<body>
    <div class="header">
        <div class="title">{{ $flashcard->getTitle(app()->getLocale()) }}</div>
        <div class="category">{{ $flashcard->category->getName(app()->getLocale()) }}</div>
    </div>
    
    <div class="summary">
        <strong>Résumé :</strong><br>
        {{ $flashcard->getSummary(app()->getLocale()) }}
    </div>
    
    <div class="content">
        {!! nl2br($flashcard->getContent(app()->getLocale())) !!}
    </div>
    
    <div class="footer">
        <p>EduFlash - Généré le {{ date('d/m/Y à H:i') }}</p>
        <p>www.eduflash.com</p>
    </div>
</body>
</html>