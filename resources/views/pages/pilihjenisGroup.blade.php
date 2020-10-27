@extends('layouts.app', ['activePage' => 'Jenis Edukasi', 'titlePage' => __('Jenis Edukasi')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">

            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Pilih Jenis Group Edukasi WhatsApp') }}</h4>
              </div><br>
              @foreach ($jenisEdukasi as $jenisEdukasi)
              <a class="btn btn-outline-success btn-lg btn-block" href="{{ $jenisEdukasi->link_wa }}" target="_blank">{{$jenisEdukasi->nama}}</a>
              <br>
              @endforeach

            </div>
        </div>
      </div>

  </div>
@endsection
