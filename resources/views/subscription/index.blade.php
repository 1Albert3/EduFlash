@extends('layouts.app')

@section('title', 'Abonnement Premium - EduFlash')

@section('content')
<section class="py-5" style="background: linear-gradient(135deg, var(--university-gray) 0%, var(--university-light-gray) 100%);">
    <div class="container text-center text-white">
        <h1 class="display-4 fw-bold mb-3">
            <i class="fas fa-crown text-warning me-3"></i>EduFlash Premium
        </h1>
        <p class="lead">Débloquez tout le potentiel de votre apprentissage</p>
    </div>
</section>

<section class="py-5">
    <div class="container">
        @if($user->isPremium())
            <div class="alert alert-success text-center mb-5">
                <i class="fas fa-crown text-warning me-2"></i>
                <strong>Vous êtes Premium !</strong> Votre abonnement expire le {{ $user->subscription_expires_at->format('d/m/Y') }}
            </div>
        @endif

        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="row">
                    <!-- Plan Mensuel -->
                    <div class="col-12 col-md-6 mb-4">
                        <div class="card h-100 {{ !$user->isPremium() ? 'border-warning' : '' }}">
                            <div class="card-header text-center bg-warning text-dark">
                                <h4 class="mb-0">Premium Mensuel</h4>
                            </div>
                            <div class="card-body text-center">
                                <div class="display-4 fw-bold text-warning mb-3">{{ $plans['monthly']['price'] }}€</div>
                                <p class="text-muted">par mois</p>
                                
                                <ul class="list-unstyled mb-4">
                                    <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Accès illimité à toutes les fiches</li>
                                    <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Téléchargement PDF</li>
                                    <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Quiz interactifs</li>
                                    <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Support prioritaire</li>
                                    <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Statistiques détaillées</li>
                                </ul>
                                
                                @if(!$user->isPremium())
                                    <form action="{{ route('subscription.checkout') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="plan" value="monthly">
                                        <div class="mb-3">
                                            <select name="payment_method" class="form-select" required>
                                                <option value="">Choisir un mode de paiement</option>
                                                <option value="stripe">💳 Carte bancaire (Stripe)</option>
                                                <option value="paypal">🅿️ PayPal</option>
                                                <option value="bank_transfer">🏦 Virement bancaire</option>
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-warning btn-lg w-100">
                                            <i class="fas fa-crown me-2"></i>Choisir ce plan
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Plan Annuel -->
                    <div class="col-12 col-md-6 mb-4">
                        <div class="card h-100 border-success position-relative">
                            <div class="position-absolute top-0 start-50 translate-middle">
                                <span class="badge bg-success px-3 py-2">Économisez {{ $plans['yearly']['discount'] }}%</span>
                            </div>
                            <div class="card-header text-center bg-success text-white">
                                <h4 class="mb-0">Premium Annuel</h4>
                            </div>
                            <div class="card-body text-center">
                                <div class="display-4 fw-bold text-success mb-1">{{ $plans['yearly']['price'] }}€</div>
                                <small class="text-muted"><s>119.88€</s></small>
                                <p class="text-muted">par an (8.33€/mois)</p>
                                
                                <ul class="list-unstyled mb-4">
                                    <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Tout du plan mensuel</li>
                                    <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Accès anticipé aux nouvelles fiches</li>
                                    <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Webinaires exclusifs</li>
                                    <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Badge Premium</li>
                                    <li class="mb-2"><i class="fas fa-star text-warning me-2"></i>2 mois gratuits</li>
                                </ul>
                                
                                @if(!$user->isPremium())
                                    <form action="{{ route('subscription.checkout') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="plan" value="yearly">
                                        <div class="mb-3">
                                            <select name="payment_method" class="form-select" required>
                                                <option value="">Choisir un mode de paiement</option>
                                                <option value="stripe">💳 Carte bancaire (Stripe)</option>
                                                <option value="paypal">🅿️ PayPal</option>
                                                <option value="bank_transfer">🏦 Virement bancaire</option>
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-success btn-lg w-100">
                                            <i class="fas fa-crown me-2"></i>Meilleur choix
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- FAQ -->
        <div class="row mt-5">
            <div class="col-lg-8 mx-auto">
                <h3 class="text-center mb-4">Questions fréquentes</h3>
                <div class="accordion" id="faqAccordion">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                                Puis-je annuler mon abonnement à tout moment ?
                            </button>
                        </h2>
                        <div id="faq1" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Oui, vous pouvez annuler votre abonnement à tout moment. Vous conserverez l'accès Premium jusqu'à la fin de votre période payée.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                                Quels modes de paiement acceptez-vous ?
                            </button>
                        </h2>
                        <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Nous acceptons les cartes bancaires (Visa, Mastercard), PayPal et les virements bancaires SEPA.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection