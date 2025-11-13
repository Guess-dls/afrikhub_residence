@extends('heritage')
@section('titre', 'accueil')
@section('ux-ui')
    <link rel="stylesheet" href="{{ asset('assets/css/accueil.css') }}">
@endsection

@section('contenu')
    <!-- HEADER -->
    <header class="p-1">
      <div class="col-12 row m-0 align-items-center">
        <div class="col-lg-2 col-md-2 col-3">
          <img class="img-fluid" src="{{ asset('assets/images/logo_01.png') }}" alt="Afrik'Hub Logo" />
        </div>
        <nav class="col-lg-10 col-md-10 col-9">
          <ul class="d-flex justify-content-end py-2">
            <ul id="entete">
              <li><a href="{{ route('inscription') }}" class="bg-dark" aria-label="inscription"><span class="fa fa-sign-in"></span><span class="badge">inscription</span></a></li>
              <li><a href="#hebergement"><span class="fa fa-home"></span><span class="badge">herbergement</span></a></li>
              <li><a href="#location"><span class="fa fa-car"></span><span class="badge">vehicule</span></a></li>
              <li><a href="#contact"><span class="fa fa-phone"></span><span class="badge">contact</span></a></li>
            </ul>
            <li class="nav-item dropdown col-12">
              <a href="#" class="dropdown-toggle">menu</a>
              <ul class="dropdown-menu row m-0 py-2 col-8 col-md-6" aria-label="submenu">
                <li><a class="dropdown-item" href="{{ route('login') }}">connexion</a></li>
                <li><a class="dropdown-item" href="{{ route('register') }}">inscription</a></li>
                <li><a class="dropdown-item" href="../../admins/php/admin_connect.php">admin</a></li>
                <li><a class="dropdown-item" href="#hebergement">Hébergements</a></li>
                <li><a class="dropdown-item" href="#location">Véhicules</a></li>
                <li><a class="dropdown-item" href="#circuits">Circuits</a></li>
                <li><a class="dropdown-item" href="#reservation">Réservation</a></li>
                <li><a class="dropdown-item" href="#contact">Contact</a></li>
              </ul>
            </li>
          </ul>
        </nav>
      </div>
    </header>
<nav class="row col-12 justify-content-center">
        <!-- Section accueil -->
    <section id="accueil" class="text-center py-5">
      <div>
        <h2>Bienvenue</h2>
        <span class="fs-6">Explorez l'Afrique autrement avec Afrik’Hub</span><br><br>
        <a href="../../accueil/php/redirection.php?action=recherche" class="btn-reserver me-2">Réserver</a>
        <a href="../../accueil/php/redirection.php?action=mise_en_ligne" class="btn-reserver">Ajouter un bien</a>
      </div>
    </section>
    <!-- Section hébergement -->
    <section id="hebergement" class="my-2 col-12 row m-0 justify-content-center">
      <h2>hébergements</h2>
      <div class="row g-4 align-items-center col-12 col-md-8 col-lg-6 mx-4">
            <img class="w-20 md:w-28 lg:w-32 h-auto" src="{{ asset('assets/images/hebergement.jpg') }}" alt="Afrik'Hub Logo"/>
        </div>

        <div class="col-12 col-md-8 col-lg-6">
          <div class="accordion" id="accordionHebergement">
            <div class="accordion-item border-0" style="background: #e0f2f1;">
              <h2 class="accordion-header mt-5" id="headingTypes">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTypes" aria-expanded="true" aria-controls="collapseTypes">
                  types d'hébergements
                </button>
              </h2>
              <div id="collapseTypes" class="accordion-collapse collapse" aria-labelledby="headingTypes" data-bs-parent="#accordionHebergement">
                <div class="accordion-body">
                  <div class="mb-3 border-0">
                    <div class="d-flex align-items-center justify-content-between"><strong>Studio</strong><span class="toggle-services"><i class="fa fa-chevron-down"></i></span></div>
                    <ul class="services-list mt-2"><li>wifi gratuit</li><li>ventilateur</li><li>caméra de surveillance</li></ul>
                  </div>
                  <div class="mb-3">
                    <div class="d-flex align-items-center justify-content-between"><strong>Chambre unique</strong><span class="toggle-services"><i class="fa fa-chevron-down"></i></span></div>
                    <ul class="services-list mt-2"><li>wifi gratuit</li><li>climatisation</li><li>petit déjeuner inclus</li></ul>
                  </div>
                  <div class="mb-3">
                    <div class="d-flex align-items-center justify-content-between"><strong>Villa avec piscine</strong><span class="toggle-services"><i class="fa fa-chevron-down"></i></span></div>
                    <ul class="services-list mt-2"><li>wifi gratuit</li><li>piscine privée</li><li>climatisation</li><li>parking gratuit</li></ul>
                  </div>
                </div>
              </div>
            </div>

            <div class="accordion-item border-0" style="background: #e0f2f1;">
              <h2 class="accordion-header" id="headingConditions">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseConditions" aria-expanded="false" aria-controls="collapseConditions">
                  conditions de réservation
                </button>
              </h2>
              <div id="collapseConditions" class="accordion-collapse collapse" aria-labelledby="headingConditions" data-bs-parent="#accordionHebergement">
                <div class="accordion-body">
                  <ul>
                    <li>réservation préalable requise</li>
                    <li>acompte de 20% pour confirmation</li>
                    <li>annulation gratuite jusqu'à 48h avant l'arrivée</li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="text-center">
            <a href="../../annexe/php/recherche.php" class="btn-reserver">réserver</a>
          </div>
        </div>
      </div>
    </section>
</nav>

    <div class="row">
        <div class="col-12 main-content">
            @if ($residences->isEmpty())
                <div class="alert alert-warning text-center fw-bold rounded-3 p-4">
                    <i class="fas fa-exclamation-triangle me-2"></i> Désolé, aucune résidence trouvée pour cette recherche.
                </div>
            @else
                <div class="row g-4 justify-content-center mb-4">
                    @foreach($residences as $residence)
                        @php
                            $images = is_string($residence->img) ? json_decode($residence->img, true) : ($residence->img ?? []);
                            // Fallback pour la première image
                            $firstImage = $images[0] ?? asset('assets/images/placeholder.jpg');
                        @endphp

                        <div class="col-sm-6 col-md-4 col-lg-3 d-flex">
                            <div class="card shadow h-100 border-0 rounded-4 overflow-hidden w-100">
                                <a href="javascript:void(0)"
                                   class="glightbox-trigger-{{ $residence->id }}">
                                    <img src="{{ $firstImage }}"
                                         alt="Image de la résidence {{ $residence->nom }}"
                                         class="card-img-top"
                                         loading="lazy">
                                </a>

                                {{-- Liens GLightbox CACHÉS pour la galerie --}}
                                @foreach($images as $key => $image)
                                    <a href="{{ $image }}"
                                       class="glightbox"
                                       data-gallery="gallery-{{ $residence->id }}"
                                       data-title="{{ $residence->nom }} - Image {{ $key + 1 }}"
                                       style="display: none;"
                                       aria-label="Voir l'image {{ $key + 1 }}"
                                       data-index="{{ $key }}"
                                       data-trigger=".glightbox-trigger-{{ $residence->id }}"
                                    ></a>
                                @endforeach

                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title fw-bold text-dark">{{ $residence->nom }}</h5>
                                    <p class="card-text text-muted card-text-truncate" title="{{ $residence->description }}">
                                        {{ Str::limit($residence->description, 100) }}
                                    </p>
                                    <ul class="list-unstyled small mb-3 mt-2">
                                        <li><i class="fas fa-bed me-2 text-primary"></i> <strong>Chambres :</strong> {{ $residence->nombre_chambres ?? '-' }}</li>
                                        <i class="fas fa-bed me-2 text-primary"></i> <strong>Salon :</strong> {{ $residence->nombre_salons ?? '-' }}</li>
                                        <li><i class="fas fa-map-marker-alt me-2 text-primary"></i> <strong>Situation :</strong> {{ $residence->pays ?? '-' }}/{{ $residence->ville ?? '-' }}</li>
                                        <li class="fw-bold mt-2">
                                            <i class="fas fa-money-bill-wave me-2 text-success"></i>
                                            Prix/jour : {{ number_format($residence->prix_journalier ?? 0, 0, ',', ' ') }} FCFA
                                        </li>
                                        <li class="fw-bold mt-2 text-danger fw-600">
                                            <i class="fas fa-calendar-check me-2"></i>
                                            Prochaine disponibilité : {{ \Carbon\Carbon::parse($residence->date_disponible)->translatedFormat('d F Y') }}
                                        </li>
                                    </ul>

                                    <a href="#" class="btn btn-dark rounded mt-auto">
                                        Voir les Détails <i class="fas fa-arrow-right ms-2"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>

@endsection

@section('footer')
    <footer>
        <p id="contact">&copy; 2025 afrik’hub. tous droits réservés.<br />afrikhub@gmail.com</p>
    </footer>
@endsection

    <!-- Scripts -->
@section('script')
    <script>
      document.querySelectorAll(".accordion-button").forEach(button => {
        button.addEventListener("click", (e) => {
          e.stopPropagation();
          const parent = button.closest(".accordion-item");
          const content = parent.querySelector(".accordion-collapse");
          if (parent.classList.contains("active")) {
            parent.classList.remove("active");
            content.style.maxHeight = null;
          } else {
            document.querySelectorAll(".accordion-item.active").forEach(item => {
              item.classList.remove("active");
              item.querySelector(".accordion-collapse").style.maxHeight = null;
            });
            parent.classList.add("active");
            content.style.maxHeight = content.scrollHeight + "px";
          }
        });
      });
      document.addEventListener("click", () => {
        document.querySelectorAll(".accordion-item.active").forEach(item => {
          item.classList.remove("active");
          item.querySelector(".accordion-collapse").style.maxHeight = null;
        });
      });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" defer></script>
@endsection
