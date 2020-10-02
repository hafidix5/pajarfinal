@extends('layouts.app', ['activePage' => 'Tambah Pertanyaan Deteks', 'titlePage' => __('Tambah Pertanyaan Deteks')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('pertanyaan_detekos.store') }}" autocomplete="off" class="form-horizontal">
            @csrf
            @method('post')

            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Tambah Informasi Penting') }}</h4>
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
                    <div class="col-sm-7">
                      <div class="form-group{{ $errors->has('insting') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('insting') ? ' is-invalid' : '' }}" name="detekos_id" id="input-insting" type="hidden" value="{{$detekos_id}}" required="true" aria-required="true"/>
                        @if ($errors->has('insting'))
                          <span id="insting-error" class="error text-danger" for="input-insting">{{ $errors->first('insting') }}</span>
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
