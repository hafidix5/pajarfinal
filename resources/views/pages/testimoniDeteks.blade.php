@extends('layouts.app', ['activePage' => '', 'titlePage' => __('')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="card">
      <div class="card-header card-header-primary">
        <h4 class="card-title">Deteks</h4>
        <p class="card-category">Video Testimoni </p>
      </div>

      <div class="card-body">
        @if (session('status'))
        <div class="row">
          <div class="col-sm-12">
            <div class="alert alert-success">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <i class="material-icons">close</i>
              </button>
              <span><h4>{{ session('status') }}<h4>

            </span>
            </div>
          </div>
        </div>
      @endif
      @foreach ($testimoniDeteks as $testimoniDeteks)

      <div class="embed-responsive embed-responsive-16by9">
      <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{$testimoniDeteks->video}}?rel=0" allowfullscreen></iframe>
      </div>
      <h4>{{$testimoniDeteks->nama}}</h4>
      <br><br>
      @endforeach
      </div>
    </div>
  </div>
</div>
@endsection
