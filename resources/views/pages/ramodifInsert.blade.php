@extends('layouts.app', ['activePage' => 'Ramodif', 'titlePage' => __('Ramodif')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('ramodif.store') }}" autocomplete="off" class="form-horizontal">
            @csrf
            @method('post')

            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Tambah Rawat Modifikasi') }}</h4>
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
                      <input class="form-control{{ $errors->has('nama') ? ' is-invalid' : '' }}" name="nama" id="input-nama" type="text" placeholder="{{ __('Nama') }}" value="" required="true" aria-required="true"/>
                      @if ($errors->has('nama'))
                        <span id="nama-error" class="error text-danger" for="input-nama">{{ $errors->first('nama') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                    <label class="col-sm-2 col-form-label">{{ __('Link Video') }}</label>
                    <div class="col-sm-7">
                      <div class="form-group{{ $errors->has('video') ? ' has-danger' : '' }}">
                        <input class="form-control{{ $errors->has('video') ? ' is-invalid' : '' }}" name="video" id="input-video" type="text" placeholder="{{ __('link video') }}" value="" required="true" aria-required="true"/>
                        @if ($errors->has('video'))
                          <span id="video-error" class="error text-danger" for="input-video">{{ $errors->first('video') }}</span>
                        @endif
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <label class="col-sm-2 col-form-label">{{ __('Jenis Edukasi') }}</label>
                    <div class="col-sm-7">
                  <div class="form-group{{ $errors->has('jenisEdukasi_id') ? ' has-danger' : '' }}">
                    <select class="form-control" class="form-control" name="jenisEdukasi_id" id="jenisEdukasi_id">

                        @foreach ($jenisEdukasi as $jenisEdukasi) {

                      <option value="{{ $jenisEdukasi->id }}">{{ $jenisEdukasi->nama }}</option>
                        }
                        @endforeach
                      </select>
                    @if ($errors->has('jenisEdukasi_id'))
                      <span id="jenisEdukasi_id-error" class="error text-danger" for="input-jenisEdukasi_id">{{ $errors->first('jenisEdukasi_id') }}</span>
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
