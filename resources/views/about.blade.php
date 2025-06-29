@extends('layouts.app')

@section('title', 'À propos - EduFlash')

@section('content')
<!-- Hero Section -->
<section class="py-5" style="background: linear-gradient(135deg, var(--university-gray) 0%, var(--university-light-gray) 100%);">
    <div class="container text-center text-white">
        <h1 class="display-4 fw-bold mb-3">À propos d'EduFlash</h1>
        <p class="lead">La plateforme de micro-apprentissage qui révolutionne votre façon d'apprendre</p>
    </div>
</section>

<!-- Mission -->
<section class="py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 col-lg-6 mb-4">
                <h2 class="fw-bold mb-4" style="color: var(--university-gray);">Notre Mission</h2>
                <p class="fs-5 mb-4">EduFlash démocratise l'apprentissage en rendant la connaissance accessible à tous, partout et à tout moment. Nous croyons que l'éducation doit s'adapter au rythme de vie moderne.</p>
                <p>Nos fiches de micro-apprentissage sont conçues pour être consommées en 3-5 minutes, parfaites pour les pauses café, les trajets en transport ou les moments d'attente.</p>
            </div>
            <div class="col-12 col-lg-6 text-center">
                <i class="fas fa-lightbulb fa-8x" style="color: var(--university-gold); opacity: 0.8;"></i>
            </div>
        </div>
    </div>
</section>

<!-- Features -->
<section class="py-5 bg-light">
    <div class="container">
        <h2 class="text-center fw-bold mb-5" style="color: var(--university-gray);">Pourquoi choisir EduFlash ?</h2>
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card h-100 border-0 shadow-sm text-center">
                    <div class="card-body">
                        <i class="fas fa-clock fa-3x mb-3" style="color: var(--university-gold);"></i>
                        <h5 class="card-title">Apprentissage Rapide</h5>
                        <p class="card-text">Chaque fiche est conçue pour être lue en 3-5 minutes maximum. Parfait pour les emplois du temps chargés.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100 border-0 shadow-sm text-center">
                    <div class="card-body">
                        <i class="fas fa-globe fa-3x mb-3" style="color: var(--university-gold);"></i>
                        <h5 class="card-title">Contenu Bilingue</h5>
                        <p class="card-text">Toutes nos fiches sont disponibles en français et en anglais pour un apprentissage multilingue.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100 border-0 shadow-sm text-center">
                    <div class="card-body">
                        <i class="fas fa-mobile-alt fa-3x mb-3" style="color: var(--university-gold);"></i>
                        <h5 class="card-title">Accessible Partout</h5>
                        <p class="card-text">Interface responsive qui s'adapte à tous vos appareils : ordinateur, tablette, smartphone.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Stats -->
<section class="py-5">
    <div class="container">
        <div class="row text-center">
            <div class="col-md-3 mb-4">
                <div class="stat-box">
                    <h2 class="display-4 fw-bold" style="color: var(--university-gold);">50+</h2>
                    <p class="fs-5">Fiches disponibles</p>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="stat-box">
                    <h2 class="display-4 fw-bold" style="color: var(--university-gold);">5</h2>
                    <p class="fs-5">Catégories</p>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="stat-box">
                    <h2 class="display-4 fw-bold" style="color: var(--university-gold);">1000+</h2>
                    <p class="fs-5">Utilisateurs actifs</p>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="stat-box">
                    <h2 class="display-4 fw-bold" style="color: var(--university-gold);">98%</h2>
                    <p class="fs-5">Satisfaction</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Team -->
<section class="py-5 bg-light">
    <div class="container">
        <h2 class="text-center fw-bold mb-5" style="color: var(--university-gray);">Notre Équipe</h2>
        <div class="row justify-content-center">
            <div class="col-md-4 mb-4">
                <div class="card border-0 shadow-sm text-center">
                    <div class="card-body">
                        <div class="team-avatar mb-3">
                            <i class="fas fa-user-circle fa-5x" style="color: var(--university-gold);"></i>
                        </div>
                        <h5 class="card-title">Équipe Pédagogique</h5>
                        <p class="card-text">Experts en éducation et spécialistes du micro-apprentissage qui créent du contenu de qualité.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card border-0 shadow-sm text-center">
                    <div class="card-body">
                        <div class="team-avatar mb-3">
                            <i class="fas fa-code fa-5x" style="color: var(--university-gold);"></i>
                        </div>
                        <h5 class="card-title">Équipe Technique</h5>
                        <p class="card-text">Développeurs passionnés qui construisent une plateforme moderne et performante.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Contact CTA -->
<section class="py-5" style="background: linear-gradient(135deg, var(--university-gray) 0%, var(--university-light-gray) 100%);">
    <div class="container text-center text-white">
        <h3 class="mb-3">Rejoignez la révolution de l'apprentissage</h3>
        <p class="mb-4">Commencez dès maintenant votre parcours d'apprentissage avec EduFlash</p>
        <div class="d-flex gap-3 justify-content-center flex-wrap">
            <a href="{{ route('home') }}" class="btn btn-lg" style="background-color: var(--university-gold); border-color: var(--university-gold); color: #000;">
                <i class="fas fa-play me-2"></i>Commencer maintenant
            </a>
            @guest
                <a href="{{ route('register') }}" class="btn btn-outline-light btn-lg">
                    <i class="fas fa-user-plus me-2"></i>Créer un compte
                </a>
            @endguest
        </div>
    </div>
</section>
@endsection