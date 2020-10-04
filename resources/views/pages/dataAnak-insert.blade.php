@extends('layouts.app', ['activePage' => 'Data Anak', 'titlePage' => __('Data Anak')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('anak.store') }}" autocomplete="off" class="form-horizontal">
            @csrf
            @method('post')

            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Data Anak') }}</h4>
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
                    <label class="col-sm-2 col-form-label">{{ __('Tanggal lahir') }}</label>
                    <div class="col-sm-7">
                      <div class="form-group{{ $errors->has('tgl_lahir') ? ' has-danger' : '' }}">
                        <input class="form-control{{ $errors->has('tgl_lahir') ? ' is-invalid' : '' }}" name="tgl_lahir" id="input-tgl_lahir" type="date" placeholder="{{ __('') }}" value="" required />
                        @if ($errors->has('tgl_lahir'))
                          <span id="tgl_lahir-error" class="error text-danger" for="input-tgl_lahir">{{ $errors->first('tgl_lahir') }}</span>
                        @endif
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <label class="col-sm-2 col-form-label">{{ __('Usia') }}</label>
                    <div class="col-sm-7">
                      <div class="form-group{{ $errors->has('usia') ? ' has-danger' : '' }}">
                        <input class="form-control{{ $errors->has('usia') ? ' is-invalid' : '' }}" name="usia" id="input-usia" type="text" placeholder="{{ __('') }}" value="" required />
                        @if ($errors->has('usia'))
                          <span id="usia-error" class="error text-danger" for="input-usia">{{ $errors->first('usia') }}</span>
                        @endif
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <label class="col-sm-2 col-form-label">{{ __('Jenis kelamin') }}</label>
                    <div class="col-sm-7">
                      <div class="form-group{{ $errors->has('jk') ? ' has-danger' : '' }}">
                        <select class="form-control" name="jk" id="jk">

                            <option value="laki-laki">Laki-laki</option>
                            <option value="perempuan">Perempuan</option>
                          </select>
                        @if ($errors->has('jk'))
                          <span id="jk-error" class="error text-danger" for="input-jk">{{ $errors->first('jk') }}</span>
                        @endif
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <label class="col-sm-2 col-form-label">{{ __('Anak ke-') }}</label>
                    <div class="col-sm-7">
                      <div class="form-group{{ $errors->has('anak_ke') ? ' has-danger' : '' }}">
                        <input class="form-control{{ $errors->has('anak_ke') ? ' is-invalid' : '' }}" name="anak_ke" id="input-anak_ke" type="text" placeholder="{{ __('') }}" value="" required />
                        @if ($errors->has('anak_ke'))
                          <span id="anak_ke-error" class="error text-danger" for="input-anak_ke">{{ $errors->first('anak_ke') }}</span>
                        @endif
                      </div>
                    </div>
                  </div>


                  <div class="row">
                    <div class="col-sm-7">
                      <div class="form-group{{ $errors->has('pasien_id') ? ' has-danger' : '' }}">
                        <input class="form-control{{ $errors->has('pasien_id') ? ' is-invalid' : '' }}" name="pasien_id" id="pasien_id" type="text" placeholder="{{ __('') }}" value="{{ $pasien_id }}" required="true" aria-required="true" hidden/>
                        @if ($errors->has('pasien_id'))
                          <span id="pasien_id-error" class="error text-danger" for="input-pasien_id">{{ $errors->first('pasien_id') }}</span>
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
