@extends('layouts.app', ['activePage' => 'Tambah Pertanyaan Ramodif', 'titlePage' => __('Tambah Pertanyaan Ramodif')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('pertanyaan_ramodif.store') }}" autocomplete="off" class="form-horizontal">
            @csrf
            @method('post')

            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Tambah') }}</h4>
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
                    <label class="col-sm-2 col-form-label">{{ __('Nomor') }}</label>
                    <div class="col-sm-7">
                      <div class="form-group{{ $errors->has('id') ? ' has-danger' : '' }}">
                        <input class="form-control{{ $errors->has('id') ? ' is-invalid' : '' }}" name="id" id="input-id" type="text" placeholder="{{ __('Nomor pertanyaan') }}" value="" required="true" aria-required="true"/>
                        @if ($errors->has('id'))
                          <span id="id-error" class="error text-danger" for="input-id">{{ $errors->first('id') }}</span>
                        @endif
                      </div>
                    </div>
                  </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Pertanyaan') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('pertanyaan') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('pertanyaan') ? ' is-invalid' : '' }}" name="pertanyaan" id="input-pertanyaan" type="text" placeholder="{{ __('pertanyaan') }}" value="" required="true" aria-required="true"/>
                      @if ($errors->has('pertanyaan'))
                        <span id="pertanyaan-error" class="error text-danger" for="input-pertanyaan">{{ $errors->first('pertanyaan') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                    <label class="col-sm-2 col-form-label">{{ __('Tahap Ramodif') }}</label>
                    <div class="col-sm-7">
                      <div class="form-group{{ $errors->has('tahap') ? ' has-danger' : '' }}">
                        <select class="form-control" name="tahap" id="tahap">
                            <option value="1.responding">Responding</option>
                          <option value="2.preventing">Preventing</option>
                          <option value="3.monitoring">Monitoring</option>
                          <option value="4.mentoring">Mentoring</option>
                          <option value="5.modeling">Modeling</option>
                        </select>
                      </div>
                    </div>
                  </div>
                <div class="row">
                    <div class="col-sm-7">
                      <div class="form-group{{ $errors->has('ramodif') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('ramodif') ? ' is-invalid' : '' }}" name="ramodif_id" id="input-ramodif" type="hidden" value="{{$ramodif_id}}" required="true" aria-required="true"/>
                        @if ($errors->has('ramodif'))
                          <span id="ramodif-error" class="error text-danger" for="input-ramodif">{{ $errors->first('ramodif') }}</span>
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
