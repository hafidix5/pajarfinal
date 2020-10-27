@extends('layouts.app', ['activePage' => 'Beranda', 'titlePage' => __('Beranda')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-warning card-header-icon">
              <div class="card-icon">
                <i class="material-icons">face</i>
              </div>
              <p class="card-category">Pasien</p>
              <h3 class="card-title">{{ $jpasien }} <small>Orang</small>
              </h3>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-success card-header-icon">
              <div class="card-icon">
                <i class="material-icons">home</i>
              </div>
              <p class="card-category">Puskesmas</p>
              <h3 class="card-title">{{ $jpuskesmas }}
                <small>Lokasi</small>
              </h3>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-danger card-header-icon">
              <div class="card-icon">
                <i class="material-icons">description</i>
              </div>
              <p class="card-category">Pertanyaan</p>
              <h3 class="card-title">{{$jpertanyaan}} </h3>
            </div>

          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-info card-header-icon">
              <div class="card-icon">
                <i class="material-icons">grading</i>
              </div>
              <p class="card-category">Data</p>
              <h3 class="card-title">{{$hasil}} <small>Hasil</small></h3>
            </div>

          </div>
        </div>
      </div>


    </div>
  </div>
@endsection

@push('js')
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      md.initDashboardPageCharts();
    });
  </script>
@endpush
