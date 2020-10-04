@extends('layouts.app', ['activePage' => 'Testimoni', 'titlePage' => __('Ubah Testimoni')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('testimoni.update',$testimoni->id ) }}" autocomplete="off" class="form-horizontal">
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
                    <input class="form-control{{ $errors->has('nama') ? ' is-invalid' : '' }}" name="nama" id="input-nama" type="text" placeholder="{{ __('Nama') }}" value="{{$testimoni->nama}}" required="true" aria-required="true"/>
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
                      <input class="form-control{{ $errors->has('video') ? ' is-invalid' : '' }}" name="video" id="input-video" type="text" placeholder="{{ __('link video') }}" value="{{$testimoni->video}}" required="true" aria-required="true"/>
                        @if ($errors->has('video'))
                          <span id="video-error" class="error text-danger" for="input-video">{{ $errors->first('video') }}</span>
                        @endif
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <label class="col-sm-2 col-form-label">{{ __('Pilih Deteks') }}</label>
                    <div class="col-sm-7">
                      <div class="form-group{{ $errors->has('detekos_id') ? ' has-danger' : '' }}">
                        <select class="form-control" class="form-control" name="detekos_id" id="detekos_id">

                            @foreach ($detekos as $detekos) {
                                @if($testimoni->idjenis==$detekos->id)
                                <option value="{{ $detekos->id }}" selected>{{ $detekos->nama }}</option>
                                @endif
                          <option value="{{ $detekos->id }}">{{ $detekos->nama }}</option>
                            }
                            @endforeach
                          </select>
                        @if ($errors->has('detekos_id'))
                          <span id="detekos_id-error" class="error text-danger" for="input-detekos_id">{{ $errors->first('detekos_id') }}</span>
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
