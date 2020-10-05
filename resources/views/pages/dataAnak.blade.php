@extends('layouts.app', ['activePage' => 'Data Anak', 'titlePage' => __('Data Anak')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="card">
      <div class="card-header card-header-primary">
        <h4 class="card-title">Data Anak</h4>
      </div>

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
                Tanggal Lahir
              </th>
              <th>
                Usia
              </th>
              <th>
                Jenis Kelamin
              </th>
              <th>
                Anak Ke-
              </th>
            <th>
                Aksi
            </th>

            </thead>
            <tbody>
                @foreach ($anak as $anak)
                <tr>
                    <td>{{ $anak->nama }}</td>
                    <td>{{ \Carbon\Carbon::parse($anak->tgl_lahir)->format('d/m/Y')}}</td>
                    <td>{{ \Carbon\Carbon::parse($anak->tgl_lahir)->age}}</td>
                    <td>{{ $anak->jenis_kelamin }}</td>
                    <td>{{ $anak->anak_ke }}</td>
                    <th>
                        <a class="nav-link" href="{{ route('anak.edit',$anak->id) }}">
                            <i class="material-icons">edit</i> Edit
                          </a>
                          <a class="nav-link" href="{{ route('anak.hapus',$anak->id) }}">
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
            <a href="{{ url('dataAnak.insert') }}" class="btn btn-xs btn-info pull-left ml-auto">Tambah</a>
        </div>
    </div>

  </div>
</div>
@endsection
