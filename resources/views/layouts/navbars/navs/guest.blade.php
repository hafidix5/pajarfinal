<!-- Navbar -->

<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top text-white">
  <div class="container">
    <div class="navbar-wrapper">
      <a class="navbar-brand" href="{{ route('home') }}">{{ $title ?? '' }}</a>
    </div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
      <span class="sr-only">Toggle navigation</span>
      <span class="navbar-toggler-icon icon-bar"></span>
      <span class="navbar-toggler-icon icon-bar"></span>
      <span class="navbar-toggler-icon icon-bar"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end">
      <ul class="navbar-nav">
        <div class="card-header card-header-primary text-center">
            <li class="nav-item{{ $activePage ?? '' }}">
                <a href="{{ route('register') }}" class="nav-link">
                  <i class="material-icons">person_add</i> {{ __('Daftar') }}
                </a>
              </li>
              <li class="nav-item{{ $activePage ?? '' }}">
                {{-- <a href="{{ route('login') }}" class="nav-link">
                    <i class="material-icons">fingerprint</i> {{ __('Masuk') }}
                </a> --}}
                <a href="{{ asset('material') }}/img/panduan_pajar.html" target="_blank" class="text-light">
                    <button >   <h4>{{ __('Lihat Panduan') }}</h4> </button>
                </a>
              </li>
          </div>

      </ul>
    </div>
  </div>
</nav>
<!-- End Navbar -->
