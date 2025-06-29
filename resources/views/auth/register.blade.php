<x-guest-layout>
    <h3 class="text-center mb-4" style="color: var(--university-gray);">{{ __('register') }}</h3>
    
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">
                <i class="fas fa-user me-2" style="color: var(--university-gold);"></i>{{ __('Name') }}
            </label>
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" 
                   name="name" value="{{ old('name') }}" required autofocus autocomplete="name"
                   placeholder="Votre nom complet">
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">
                <i class="fas fa-envelope me-2" style="color: var(--university-gold);"></i>{{ __('Email') }}
            </label>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" 
                   name="email" value="{{ old('email') }}" required autocomplete="username"
                   placeholder="votre@email.com">
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">
                <i class="fas fa-lock me-2" style="color: var(--university-gold);"></i>{{ __('Password') }}
            </label>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" 
                   name="password" required autocomplete="new-password"
                   placeholder="Minimum 8 caractères">
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="password_confirmation" class="form-label">
                <i class="fas fa-lock me-2" style="color: var(--university-gold);"></i>{{ __('Confirm Password') }}
            </label>
            <input id="password_confirmation" type="password" class="form-control" 
                   name="password_confirmation" required autocomplete="new-password"
                   placeholder="Confirmez votre mot de passe">
        </div>

        <div class="d-grid mb-3">
            <button type="submit" class="btn btn-primary btn-lg">
                <i class="fas fa-user-plus me-2"></i>{{ __('register') }}
            </button>
        </div>

        <div class="text-center">
            <p class="mb-0">Déjà un compte ?</p>
            <a href="{{ route('login') }}" class="text-decoration-none" style="color: var(--university-gold);">
                <i class="fas fa-sign-in-alt me-1"></i>Se connecter
            </a>
        </div>
        
        <div class="mt-4 p-3 bg-light rounded">
            <h6 class="mb-2"><i class="fas fa-info-circle me-2" style="color: var(--university-gold);"></i>Informations :</h6>
            <small class="d-block">Votre compte sera créé avec le rôle "utilisateur"</small>
            <small class="d-block">Contactez l'administrateur pour obtenir des privilèges éditeur</small>
        </div>
    </form>
</x-guest-layout>
