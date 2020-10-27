@extends('layouts.app', ['activePage' => 'Jenis Edukasi', 'titlePage' => __('Ubah Jenis Edukasi')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('jenisEdukasi.update',$jenisEdukasi->id ) }}" autocomplete="off" class="form-horizontal">
            @csrf
            @method('PUT')

            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Ubah Jenis Edukasi') }}</h4>
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
                    <input class="form-control{{ $errors->has('nama') ? ' is-invalid' : '' }}" name="nama" id="input-nama" type="text" placeholder="{{ __('Nama') }}" value="{{$jenisEdukasi->nama}}" required="true" aria-required="true"/>
                      @if ($errors->has('nama'))
                        <span id="nama-error" class="error text-danger" for="input-nama">{{ $errors->first('nama') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                    <label class="col-sm-2 col-form-label">{{ __('Singkatan') }}</label>
                    <div class="col-sm-7">
                      <div class="form-group{{ $errors->has('singkatan') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('singkatan') ? ' is-invalid' : '' }}" name="singkatan" id="input-singkatan" type="text" placeholder="{{ __('singkatan') }}" value="{{$jenisEdukasi->singkatan}}" required="true" aria-required="true"/>
                        @if ($errors->has('singkatan'))
                          <span id="singkatan-error" class="error text-danger" for="input-singkatan">{{ $errors->first('singkatan') }}</span>
                        @endif
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <label class="col-sm-2 col-form-label">{{ __('Link Group WA') }}</label>
                    <div class="col-sm-7">
                      <div class="form-group{{ $errors->has('link_wa') ? ' has-danger' : '' }}">
                        <input class="form-control{{ $errors->has('link_wa') ? ' is-invalid' : '' }}" name="link_wa" id="input-link_wa" type="text" placeholder="{{ __('link_wa') }}" value="{{$jenisEdukasi->link_wa}}"  required="true" aria-required="true"/>
                        @if ($errors->has('link_wa'))
                          <span id="link_wa-error" class="error text-danger" for="input-link_wa">{{ $errors->first('link_wa') }}</span>
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
