<x-guest-layout>
    <h3 class="text-center mb-4" style="color: var(--university-gray);">{{ __('login') }}</h3>
    
    @if (session('status'))
        <div class="alert alert-success mb-4">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="mb-3">
            <label for="email" class="form-label">
                <i class="fas fa-envelope me-2" style="color: var(--university-gold);"></i>{{ __('Email') }}
            </label>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" 
                   name="email" value="{{ old('email') }}" required autofocus autocomplete="username"
                   placeholder="admin@eduflash.com">
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">
                <i class="fas fa-lock me-2" style="color: var(--university-gold);"></i>{{ __('Password') }}
            </label>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" 
                   name="password" required autocomplete="current-password"
                   placeholder="••••••••">
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="remember_me" name="remember">
            <label class="form-check-label" for="remember_me">
                {{ __('Remember me') }}
            </label>
        </div>

        <div class="d-grid mb-3">
            <button type="submit" class="btn btn-primary btn-lg">
                <i class="fas fa-sign-in-alt me-2"></i>{{ __('Log in') }}
            </button>
        </div>

        <div class="text-center">
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="text-decoration-none" style="color: var(--university-gold);">
                    <i class="fas fa-key me-1"></i>{{ __('Forgot your password?') }}
                </a>
            @endif
        </div>
        
        <hr class="my-4">
        
        <div class="text-center">
            <p class="mb-2">Pas encore de compte ?</p>
            <a href="{{ route('register') }}" class="btn btn-outline-primary">
                <i class="fas fa-user-plus me-2"></i>S'inscrire
            </a>
        </div>
        
        <div class="mt-4 p-3 bg-light rounded">
            <h6 class="mb-2"><i class="fas fa-info-circle me-2" style="color: var(--university-gold);"></i>Comptes de test :</h6>
            <small class="d-block"><strong>Admin :</strong> admin@eduflash.com / password</small>
            <small class="d-block"><strong>Éditeur :</strong> editor@eduflash.com / password</small>
        </div>
    </form>
</x-guest-layout>
