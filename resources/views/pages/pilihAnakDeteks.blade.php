@extends('layouts.app', ['activePage' => 'Pilih Anak', 'titlePage' => __('Pilih Anak')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">

            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Nama Anak') }}</h4>
              </div><br>
              @foreach ($anak as $anak)
              <a class="btn btn-outline-secondary btn-lg btn-block" href="{{ route('kuesioner_detekos',[$anak->id,$id_jenisEdukasi]) }}">{{$anak->nama}}</a>
              <br>
              @endforeach

            </div>
        </div>
      </div>

  </div>
@endsection
