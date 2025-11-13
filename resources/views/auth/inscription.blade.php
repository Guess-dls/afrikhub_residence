@extends('heritage')
@section('titre', 'inscription')
@section('ux-ui')
    <link rel="stylesheet" href="{{ asset('assets/css/inscription.css') }}">
@endsection


@section('header')
    <header class="navbar navbar-expand-lg px-4 py-3 mb-4">
        <div class="container-fluid">
            <div class="col-6 col-md-3">
                <a class="navbar-brand fw-bold text-light" href="#">
                    <i class="fas fa-user-plus me-2"></i>Inscription
                </a>
            </div>
            <div class="col-6 col-md-9 d-flex justify-content-end align-items-center position-relative">
                <input type="checkbox" id="menuToggle" class="d-none" />
                <label for="menuToggle" class="menu-label d-md-none"><i class="fas fa-bars"></i></label>
                <div id="menu" class="menu-links mt-2 mt-md-0 text-center">
                    <a href="accueil.php" class="btn btn-outline-light">Accueil</a>
                    <a href="connexion.php" class="btn btn-outline-light">Se connecter</a>
                </div>
            </div>
        </div>
    </header>
@endsection

@section('contenu')
    <div class="container mt-2">
        <h2 class="mb-4">Formulaire d'inscription</h2>

        @if ($errors->any())
            <div class="alert alert-danger text-center">
                    @foreach ($errors->all() as $message)
                        <strong>{{ $message }}</strong>
                    @endforeach
            </div>
        @endif


        <form method="POST" action="{{ route('register') }}" class="row g-3 p-4 rounded shadow-sm needs-validation">

            @csrf
            <!-- Nom complet -->
            <div class="col-12 col-md-6">
                <label for="nom" class="form-label">Nom complet</label>
                <input type="text" class="form-control" id="nom" name="nom"
                    value="{{ old('nom') }}" required />
                <div class="invalid-feedback">Veuillez entrer votre nom complet.</div>
            </div>

            <!-- Email -->
            <div class="col-12 col-md-6">
                <label for="email" class="form-label">Adresse e-mail</label>
                <input type="email" class="form-control" id="email" name="email"value="{{ old('email') }}" required/>

                <div class="invalid-feedback">Veuillez entrer une adresse email valide.</div>
            </div>

            <!-- Mot de passe -->
            <div class="col-12 col-md-6">
                <label for="password" class="form-label">Mot de passe</label>
                <input type="password" class="form-control" id="password" name="password"
                value="{{ old('password') }}" required />
                <div class="invalid-feedback">Veuillez saisir un mot de passe.</div>
            </div>

            <!-- Confirmation -->
            <div class="col-12 col-md-6">
                <label for="password_confirmation" class="form-label">Confirmez le mot de passe</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
                value="{{ old('password') }}" required />
                <div class="invalid-feedback">Veuillez confirmer le mot de passe.</div>
            </div>

            <!-- Téléphone -->
            <div class="col-12">
                <label for="contact" class="form-label">Numéro de téléphone</label>
                <input type="tel" class="form-control" id="phone" name="contact"
                    value="{{ old('contact') }}" pattern="^\+?[0-9\s\-]{7,15}$" required />
                <div class="invalid-feedback">Veuillez entrer un numéro valide.</div>
            </div>

            <!-- Ville -->
            <div class="col-md-6">
                <label for="ville" class="form-label">Ville</label>
                <input type="text" class="form-control" id="ville" name="ville"
                    value="{{ old('ville') }}" required />
                <div class="invalid-feedback">Veuillez indiquer une ville.</div>
            </div>

            <!-- Pays -->
            <div class="col-md-6">
                <label for="pays" class="form-label">Pays</label>
                <input type="text" class="form-control" id="pays" name="pays"
                    value="{{ old('pays') }}" required />
                <div class="invalid-feedback">Veuillez indiquer un pays.</div>
            </div>

            <!-- Type de compte -->
            <div class="col-md-6">
                <label for="type_compte" class="form-label">Type de compte</label>
                <select class="form-select" id="type_compte" name="type_compte" required>
                    <option value="">-- sélectionnez un type de compte --</option>
                    <option value="client" <?= ($_POST['type_compte'] ?? '') === 'client' ? 'selected' : '' ?>>Client</option>
                    <option value="professionnel" <?= ($_POST['type_compte'] ?? '') === 'professionnel' ? 'selected' : '' ?>>Professionnel</option>
                </select>
                <div class="invalid-feedback">Veuillez choisir un type de compte.</div>
            </div>

            <!-- Adresse -->
            <div class="col-md-6">
                <label for="adresse" class="form-label">Adresse</label>
                <input type="text" class="form-control" id="adresse" name="adresse"
                    value="{{ old('adresse') }}" required />
                <div class="invalid-feedback">Veuillez indiquer votre adresse.</div>
            </div>

            <!-- CGU -->
            <div class="col-12">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="cgu" name="cgu" required />
                    <label class="form-check-label" for="cgu">
                        J’accepte les conditions générales d’utilisation
                    </label>
                    <div class="invalid-feedback">Vous devez accepter les conditions.</div>
                </div>
            </div>
            <!-- Boutons -->
            <div class="d-flex justify-content-center gap-3">
                <button type="submit" class="btn btn-light px-4 shadow" name="valider">S’inscrire</button>
                <a href="{{ route('login') }}" class="btn btn-dark px-4 text-light">Se connecter</a>
                <a href="{{ route('accueil') }}" class="btn btn-primary px-4 text-light">accueil</a>
            </div>
        </form>
    </div>
@endsection

@section('script')
    <!-- Scripts -->
    <script>
        (function() {
            'use strict';
            const forms = document.querySelectorAll('.needs-validation');
            Array.from(forms).forEach(function(form) {
                form.addEventListener('submit', function(event) {
                    if (!form.checkValidity()) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        })();
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@endsection
