<div class="sidebar" data-color="green" data-background-color="white" data-image="{{ asset('material') }}/img/sidebar-1.jpg">
  <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
  <div class="logo">
    <a href="#" class="simple-text logo-normal">
      {{ __('WEB PAJAR') }}
    </a>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">
        @if(Auth::check()&& Auth::user()->role  == "1")
        <li class="nav-item{{ $activePage ?? '' }}">
            <a class="nav-link" href="{{ route('dataDiri') }}">
              <i class="material-icons">content_paste</i>
                <p>{{ __('Data Diri') }}</p>
            </a>
          </li>
          <li class="nav-item{{ $activePage ?? '' }}">
            <a class="nav-link" href="{{ route('dataAnak') }}">
              <i class="material-icons">how_to_reg</i>
                <p>{{ __('Data Anak') }}</p>
            </a>
          </li>

      <li class="nav-item{{ $activePage ?? '' }}">
        <a href="#instingpSubmenu" data-toggle="collapse" aria-expanded="false" class="nav-link">
             <i class="material-icons">library_books</i>
             INSTING
            </a>
        <ul class="collapse list-unstyled" id="instingpSubmenu">
            <li class="nav-link">
                <a  href="{{ route('pilihEdukasi') }}">Lihat</a>
            </li>
            <li class="nav-link">
              <a  href="{{ route('pilihEdukasi') }}">Hasil</a>
            </li>
        </ul>
      </li>

      <li class="nav-item{{ $activePage ?? '' }}">
        <a href="#detekospSubmenu" data-toggle="collapse" aria-expanded="false" class="nav-link">
             <i class="material-icons">assignment_turned_in</i>
             DETEKS
            </a>
        <ul class="collapse list-unstyled" id="detekospSubmenu">
            <li class="nav-link">
                <a  href="{{ route('pilihEdukasiDeteks') }}">Lihat</a>
            </li>
            <li class="nav-link">
              <a  href="{{ route('pilihEdukasiDeteks') }}">Hasil</a>
            </li>
        </ul>
      </li>
      <li class="nav-item{{ $activePage ?? '' }}">
        <a href="#ramodifSubmenu" data-toggle="collapse" aria-expanded="false" class="nav-link">
             <i class="material-icons">grading</i>
             RAMODIF
            </a>
        <ul class="collapse list-unstyled" id="ramodifSubmenu">
            <li class="nav-link">
                <a  href="{{ route('pilihEdukasiRamodif') }}">Lihat</a>
            </li>
            <li class="nav-link">
              <a  href="{{ route('pilihEdukasiRamodif') }}">Hasil</a>
            </li>
        </ul>
      </li>


        @endif

      @if(Auth::check()&& Auth::user()->role  == "2")
      <li class="nav-item{{ $activePage ?? '' }}">
        <a class="nav-link" href="{{ route('home') }}">
          <i class="material-icons">dashboard</i>
            <p>{{ __('Beranda') }}</p>
        </a>
      </li>
    </li>

      <li class="nav-item{{ $activePage ?? '' }}">
          <a class="nav-link" href="{{ route('jenisEdukasi') }}">
            <i class="material-icons">face</i>
            <p>{{ __('Jenis Edukasi') }}</p>
          </a>
        </li>

          <li class="nav-item{{ $activePage ?? '' }}">
            <a href="#instingSubmenu" data-toggle="collapse" aria-expanded="false" class="nav-link">
                 <i class="material-icons">library_books</i>
                 INSTING
                </a>
            <ul class="collapse list-unstyled" id="instingSubmenu">
                <li class="nav-link">
                    <a  href="{{ route('insting') }}">Lihat</a>
                </li>
                <li class="nav-link">
                  <a  href="{{ route('insting') }}">Hasil</a>
                </li>
            </ul>
          </li>
          <li class="nav-item{{ $activePage ?? '' }}">
            <a href="#deteksSubmenu" data-toggle="collapse" aria-expanded="false" class="nav-link">
                 <i class="material-icons">assignment_turned_in</i>
                 DETEKS
                </a>
            <ul class="collapse list-unstyled" id="deteksSubmenu">
                <li class="nav-link">
                    <a  href="{{ route('detekos') }}">Lihat</a>
                </li>
                <li class="nav-link">
                  <a  href="{{ route('detekos') }}">Hasil</a>
                </li>
            </ul>
          </li>
          <li class="nav-item{{ $activePage ?? '' }}">
            <a class="nav-link" href="{{ route('testimoni') }}">
              <i class="material-icons">assignment_turned_in</i>
                <p>{{ __('TESTIMONI DETEKS') }}</p>
            </a>
          </li>
          <li class="nav-item{{ $activePage ?? '' }}">
            <a href="#ramodifSubmenu" data-toggle="collapse" aria-expanded="false" class="nav-link">
                 <i class="material-icons">grading</i>
                 RAMODIF
                </a>
            <ul class="collapse list-unstyled" id="ramodifSubmenu">
                <li class="nav-link">
                    <a  href="{{ route('ramodif') }}">Lihat</a>
                </li>
                <li class="nav-link">
                  <a  href="{{ route('ramodif') }}">Hasil</a>
                </li>
            </ul>
          </li>

          <li class="nav-item{{ $activePage ?? '' }}">
            <a class="nav-link" href="{{ route('puskesmas') }}">
              <i class="material-icons">grading</i>
              <p>{{ __('Puskesmas') }}</p>
            </a>
          </li>


      @endif
      <li class="nav-item{{ $activePage ?? '' }}">
        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ __('Keluar') }}

        <i class="material-icons">settings_power</i>

        </a>
      </li>


    </ul>
  </div>
</div>
