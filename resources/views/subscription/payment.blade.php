@extends('layouts.app')

@section('title', 'Paiement - EduFlash')

@section('content')
<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header text-center">
                        <h3><i class="fas fa-credit-card me-2"></i>Finaliser le paiement</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-md-6 mb-4">
                                <h5>Récapitulatif de commande</h5>
                                <div class="bg-light p-3 rounded mb-4">
                                    <div class="d-flex justify-content-between mb-2">
                                        <span>Plan Premium ({{ $payment->duration_months }} mois)</span>
                                        <strong>{{ $payment->amount }}€</strong>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <span>Mode de paiement</span>
                                        <span>
                                            @if($payment->payment_method === 'stripe')
                                                💳 Carte bancaire
                                            @elseif($payment->payment_method === 'paypal')
                                                🅿️ PayPal
                                            @else
                                                🏦 Virement bancaire
                                            @endif
                                        </span>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-12 col-md-6">
                                @if($payment->payment_method === 'stripe')
                                    <h5>Paiement par carte</h5>
                                    <div class="alert alert-info">
                                        <i class="fas fa-info-circle me-2"></i>
                                        Mode démo - Le paiement sera simulé
                                    </div>
                                    <form action="{{ route('subscription.success', $payment) }}" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <label class="form-label">Numéro de carte</label>
                                            <input type="text" class="form-control" placeholder="4242 4242 4242 4242" readonly>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <label class="form-label">Expiration</label>
                                                <input type="text" class="form-control" placeholder="12/25" readonly>
                                            </div>
                                            <div class="col-6">
                                                <label class="form-label">CVC</label>
                                                <input type="text" class="form-control" placeholder="123" readonly>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-success btn-lg w-100 mt-3">
                                            <i class="fas fa-lock me-2"></i>Payer {{ $payment->amount }}€
                                        </button>
                                    </form>
                                    
                                @elseif($payment->payment_method === 'paypal')
                                    <h5>Paiement PayPal</h5>
                                    <div class="alert alert-info">
                                        <i class="fas fa-info-circle me-2"></i>
                                        Mode démo - Le paiement sera simulé
                                    </div>
                                    <div class="text-center">
                                        <img src="https://www.paypalobjects.com/webstatic/mktg/Logo/pp-logo-200px.png" alt="PayPal" style="max-width: 150px;" class="mb-3">
                                        <br>
                                        <a href="{{ route('subscription.success', $payment) }}" class="btn btn-primary btn-lg">
                                            <i class="fab fa-paypal me-2"></i>Payer avec PayPal
                                        </a>
                                    </div>
                                    
                                @else
                                    <h5>Virement bancaire</h5>
                                    <div class="alert alert-warning">
                                        <i class="fas fa-clock me-2"></i>
                                        Le traitement peut prendre 1-3 jours ouvrés
                                    </div>
                                    <div class="bg-light p-3 rounded">
                                        <h6>Coordonnées bancaires :</h6>
                                        <p class="mb-1"><strong>IBAN :</strong> FR76 1234 5678 9012 3456 7890 123</p>
                                        <p class="mb-1"><strong>BIC :</strong> BNPAFRPPXXX</p>
                                        <p class="mb-1"><strong>Référence :</strong> {{ $payment->payment_id }}</p>
                                        <p class="mb-0"><strong>Montant :</strong> {{ $payment->amount }}€</p>
                                    </div>
                                    <div class="text-center mt-3">
                                        <a href="{{ route('subscription.success', $payment) }}" class="btn btn-success btn-lg">
                                            <i class="fas fa-check me-2"></i>J'ai effectué le virement
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </div>
                        
                        <div class="text-center mt-4">
                            <small class="text-muted">
                                <i class="fas fa-shield-alt me-1"></i>
                                Paiement sécurisé SSL 256-bit
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection