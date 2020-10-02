@extends('layouts.app', ['activePage' => 'Daftar Detekos', 'titlePage' => __('Daftar Detekos')])

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
                        Jenis Edukasi
                      </th>
                    <th>
                        Aksi
                    </th>
                    </thead>
                    <tbody>
                        @foreach ($detekos as $detekos)
                        <tr>
                            <td>{{ $detekos->nama }}</td>
                            <td>{{ $detekos->video }}</td>
                            <td>{{ $detekos->jenis_edukasi }}</td>
                            <th>
                                <a class="nav-link" href="{{ route('pertanyaan_detekos',$detekos->id) }}">
                                    <i class="material-icons">help_outline</i> Lihat
                                  </a>
                               <a class="nav-link" href="{{ route('detekos.edit',$detekos->id) }}">
                                    <i class="material-icons">edit</i> Edit
                                  </a>
                                   <a class="nav-link" href="{{ route('detekos.hapus',$detekos->id) }}">
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
                    <a href="{{ url('detekos.insert') }}" class="btn btn-xs btn-info pull-left ml-auto">Tambah</a>
                </div>
            </div>

  </div>
@endsection
