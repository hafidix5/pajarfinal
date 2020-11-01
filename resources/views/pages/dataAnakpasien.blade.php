@extends('layouts.app', ['activePage' => 'Data Anak', 'titlePage' => __('Ubah Data Anak')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('anak.update',$anak->id ) }}" autocomplete="off" class="form-horizontal">
            @csrf
            @method('post')

            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Ubah Data Anak') }}</h4>
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
                <input class="form-control{{ $errors->has('id') ? ' is-invalid' : '' }}" name="id" id="id" type="text" placeholder="{{ __('') }}" value="{{ $anak->id }}" required="true" aria-required="true" hidden/>

                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Nama') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('nama') ? ' has-danger' : '' }}">
                    <input class="form-control{{ $errors->has('nama') ? ' is-invalid' : '' }}" name="nama" id="input-nama" type="text" placeholder="{{ __('Nama') }}" value="{{$anak->nama}}" required="true" aria-required="true" readonly/>
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
                        <input class="form-control{{ $errors->has('tgl_lahir') ? ' is-invalid' : '' }}" name="tgl_lahir" id="input-tgl_lahir" type="date" placeholder="{{ __('') }}" value="{{$anak->tgl_lahir}}" required readonly/>
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
                      <input class="form-control{{ $errors->has('usia') ? ' is-invalid' : '' }}" name="usia" id="input-usia" type="text" placeholder="{{ __('usia') }}" value="{{$anak->usia}}" required="true" aria-required="true" readonly/>
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
                            @if($anak->jenis_kelamin)
                            <option value="{{ $anak->jenis_kelamin ?? ''  }}" selected>{{ $anak->jenis_kelamin ?? ''  }}</option>

                            @endif
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
                      <input class="form-control{{ $errors->has('anak_ke') ? ' is-invalid' : '' }}" name="anak_ke" id="input-anak_ke" type="text" placeholder="{{ __('anak_ke') }}" value="{{$anak->anak_ke}}" required="true" aria-required="true" readonly/>
                        @if ($errors->has('anak_ke'))
                          <span id="anak_ke-error" class="error text-danger" for="input-anak_ke">{{ $errors->first('anak_ke') }}</span>
                        @endif
                      </div>
                    </div>
                  </div>

              </div>
              {{-- <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-primary">{{ __('Simpan') }}</button>
              </div> --}}
            </div>
          </form>
        </div>
      </div>

    </div>
  </div>
@endsection
