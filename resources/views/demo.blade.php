@extends('layouts.app')

@section('title', 'Démonstration Thème - EduFlash')

@section('content')
<!-- Hero Section -->
<section class="hero-section text-white py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h1 class="display-4 fw-bold mb-3">Thème Universitaire</h1>
                <p class="lead mb-4">Découvrez notre nouveau design avec les couleurs gris et or d'université</p>
                
                <div class="d-flex gap-3 flex-wrap">
                    <button class="btn btn-primary btn-lg">Bouton Principal</button>
                    <button class="btn btn-outline-primary btn-lg">Bouton Secondaire</button>
                    <button class="btn btn-light btn-lg">Bouton Clair</button>
                </div>
            </div>
            <div class="col-lg-4 text-center">
                <i class="fas fa-university fa-8x opacity-75"></i>
            </div>
        </div>
    </div>
</section>

<!-- Palette de couleurs -->
<section class="py-5">
    <div class="container">
        <h2 class="mb-4">Palette de Couleurs</h2>
        <div class="row">
            <div class="col-md-2 mb-3">
                <div class="card text-center">
                    <div class="card-body p-4" style="background-color: var(--university-gold);">
                        <h6 class="text-dark mb-0">Or Principal</h6>
                        <small class="text-dark">#D4AF37</small>
                    </div>
                </div>
            </div>
            <div class="col-md-2 mb-3">
                <div class="card text-center">
                    <div class="card-body p-4" style="background-color: var(--university-dark-gold);">
                        <h6 class="text-dark mb-0">Or Foncé</h6>
                        <small class="text-dark">#B8941F</small>
                    </div>
                </div>
            </div>
            <div class="col-md-2 mb-3">
                <div class="card text-center">
                    <div class="card-body p-4" style="background-color: var(--university-gray);">
                        <h6 class="text-white mb-0">Gris Principal</h6>
                        <small class="text-white">#4A4A4A</small>
                    </div>
                </div>
            </div>
            <div class="col-md-2 mb-3">
                <div class="card text-center">
                    <div class="card-body p-4" style="background-color: var(--university-light-gray);">
                        <h6 class="text-white mb-0">Gris Clair</h6>
                        <small class="text-white">#6C6C6C</small>
                    </div>
                </div>
            </div>
            <div class="col-md-2 mb-3">
                <div class="card text-center">
                    <div class="card-body p-4" style="background-color: var(--university-dark-gray);">
                        <h6 class="text-white mb-0">Gris Foncé</h6>
                        <small class="text-white">#2C2C2C</small>
                    </div>
                </div>
            </div>
            <div class="col-md-2 mb-3">
                <div class="card text-center">
                    <div class="card-body p-4" style="background-color: var(--university-bg-gray);">
                        <h6 class="text-dark mb-0">Arrière-plan</h6>
                        <small class="text-dark">#F5F5F5</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Exemples de composants -->
<section class="py-5 bg-light">
    <div class="container">
        <h2 class="mb-4">Composants Stylisés</h2>
        
        <div class="row">
            <!-- Cartes exemple -->
            <div class="col-md-4 mb-4">
                <div class="card flashcard-item">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <span class="badge category-badge">Langues</span>
                            <i class="fas fa-star"></i>
                        </div>
                        <h5 class="card-title">Exemple de Flashcard</h5>
                        <p class="card-text text-muted">Ceci est un exemple de carte avec le nouveau thème universitaire.</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <small class="text-muted">
                                <i class="fas fa-eye me-1"></i>125 vues
                            </small>
                            <button class="btn btn-primary btn-sm">Lire Plus</button>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Formulaire Exemple</h5>
                        <form>
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" placeholder="votre@email.com">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Catégorie</label>
                                <select class="form-select">
                                    <option>Choisir une catégorie</option>
                                    <option>Langues</option>
                                    <option>Informatique</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Envoyer</button>
                        </form>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Badges et Alertes</h5>
                        <div class="mb-3">
                            <span class="badge bg-primary me-2">Principal</span>
                            <span class="badge category-badge me-2">Catégorie</span>
                            <span class="badge bg-secondary">Secondaire</span>
                        </div>
                        <div class="alert alert-success">
                            <i class="fas fa-check-circle me-2"></i>
                            Succès avec le nouveau thème !
                        </div>
                        <div class="d-grid gap-2">
                            <button class="btn btn-outline-primary">Bouton Outline</button>
                            <button class="btn btn-light">Bouton Clair</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section statistiques -->
<section class="py-5">
    <div class="container">
        <h2 class="mb-4">Statistiques Exemple</h2>
        <div class="row">
            <div class="col-md-3 mb-3">
                <div class="card text-white" style="background-color: var(--university-gray);">
                    <div class="card-body text-center">
                        <i class="fas fa-graduation-cap fa-3x mb-3"></i>
                        <h3>1,250</h3>
                        <p class="mb-0">Étudiants</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="card text-white" style="background-color: var(--university-gold); color: #000 !important;">
                    <div class="card-body text-center">
                        <i class="fas fa-book fa-3x mb-3" style="color: #000;"></i>
                        <h3 style="color: #000;">450</h3>
                        <p class="mb-0" style="color: #000;">Flashcards</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="card text-white" style="background-color: var(--university-light-gray);">
                    <div class="card-body text-center">
                        <i class="fas fa-eye fa-3x mb-3"></i>
                        <h3>25,000</h3>
                        <p class="mb-0">Vues</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="card text-white" style="background-color: var(--university-dark-gold); color: #000 !important;">
                    <div class="card-body text-center">
                        <i class="fas fa-star fa-3x mb-3" style="color: #000;"></i>
                        <h3 style="color: #000;">98%</h3>
                        <p class="mb-0" style="color: #000;">Satisfaction</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection