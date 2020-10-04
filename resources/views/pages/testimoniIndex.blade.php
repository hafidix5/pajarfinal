@extends('layouts.app', ['activePage' => 'Daftar Testimoni', 'titlePage' => __('Daftar Testimoni')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">

            <div class="card-body">
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
                <div class="table-responsive">
                  <table class="table table-hover">
                    <thead class="">
                      <th>
                        Nama
                      </th>
                      <th>
                        Video
                      </th>
                      <th>
                        Deteks
                      </th>
                    <th>
                        Aksi
                    </th>
                    </thead>
                    <tbody>
                        @foreach ($testimoni as $testimoni)
                        <tr>
                            <td>{{ $testimoni->nama }}</td>
                            <td>{{ $testimoni->video }}</td>
                            <td>{{ $testimoni->detekos }}</td>
                            <th>

                               <a class="nav-link" href="{{ route('testimoni.edit',$testimoni->id) }}">
                                    <i class="material-icons">edit</i> Edit
                                  </a>
                                   <a class="nav-link" href="{{ route('testimoni.hapus',$testimoni->id) }}">
                                    <i class="material-icons">remove_circle</i> Hapus
                                  </a>

                            </th>
                        </tr>
                    @endforeach

                    </tbody>
                  </table>

                </form>

                </div>
              </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <a href="{{ url('testimoni.insert') }}" class="btn btn-xs btn-info pull-left ml-auto">Tambah</a>
                </div>
            </div>

  </div>
@endsection
