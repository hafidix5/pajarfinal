@extends('layouts.app', ['activePage' => 'Pertanyaan Ramodif', 'titlePage' => __('Ubah Pertanyaan Ramodif')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('pertanyaan_ramodif.update',[$pertanyaan_ramodif->id,$pertanyaan_ramodif->ramodif_id] ) }}" autocomplete="off" class="form-horizontal">
            @csrf
            @method('PUT')

            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Ubah Informasi Penting') }}</h4>
              </div>
              <div class="card-body ">
                @if (session('status'))
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <i class="material-icons">close</i>
                        </button>
                        <span>{{ session('status') }}</span>
                      </div>
                    </div>
                  </div>
                @endif

                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Nama') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('nama') ? ' has-danger' : '' }}">
                    <input class="form-control{{ $errors->has('nama') ? ' is-invalid' : '' }}" name="pertanyaan" id="input-nama" type="text" placeholder="{{ __('Nama') }}" value="{{$pertanyaan_ramodif->pertanyaan}}" required="true" aria-required="true"/>
                      @if ($errors->has('nama'))
                        <span id="nama-error" class="error text-danger" for="input-nama">{{ $errors->first('nama') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                    <div class="col-sm-7">
                      <div class="form-group{{ $errors->has('ramodif_id') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('ramodif_id') ? ' is-invalid' : '' }}" name="ramodif_id" id="input-ramodif_id" type="hidden" placeholder="{{ __('link ramodif_id') }}" value="{{$pertanyaan_ramodif->id}}" required="true" aria-required="true"/>
                        @if ($errors->has('ramodif_id'))
                          <span id="ramodif_id-error" class="error text-danger" for="input-ramodif_id">{{ $errors->first('ramodif_id') }}</span>
                        @endif
                      </div>
                    </div>
                  </div>

              </div>
              <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-primary">{{ __('Simpan') }}</button>
              </div>
            </div>
          </form>
        </div>
      </div>

    </div>
  </div>
@endsection
