@extends('layouts.app')

@section('title', 'Vérification Email - EduFlash')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">
                    <h4><i class="fas fa-envelope-open-text text-warning me-2"></i>Vérifiez votre adresse email</h4>
                </div>
                <div class="card-body text-center">
                    <div class="mb-4">
                        <i class="fas fa-envelope fa-5x text-muted mb-3"></i>
                        <p class="mb-4">
                            Merci de vous être inscrit ! En mode développement, les emails sont enregistrés dans les logs Laravel.
                            Vérifiez le fichier <code>storage/logs/laravel.log</code> pour voir le lien de vérification.
                        </p>
                        <div class="alert alert-info">
                            <i class="fas fa-info-circle me-2"></i>
                            <strong>Mode Développement :</strong> Les emails ne sont pas envoyés mais sauvegardés dans les logs.
                        </div>
                    </div>

                    @if (session('status') == 'verification-link-sent')
                        <div class="alert alert-success mb-4">
                            <i class="fas fa-check-circle me-2"></i>
                            Un nouveau lien de vérification a été envoyé à votre adresse email.
                        </div>
                    @endif

                    <div class="d-flex justify-content-between">
                        <form method="POST" action="{{ route('verification.send') }}">
                            @csrf
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-paper-plane me-2"></i>Renvoyer l'email de vérification
                            </button>
                        </form>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-outline-secondary">
                                <i class="fas fa-sign-out-alt me-2"></i>Se déconnecter
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection