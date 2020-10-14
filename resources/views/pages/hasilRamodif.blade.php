@extends('layouts.app', ['activePage' => 'Hasil Kuesioner Ramodif', 'titlePage' => __('Hasil Kuesioner Ramodif')])

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
                        Nama Anak
                      </th>
                      <th>
                        Tanggal
                      </th>
                      <th>
                        Jenis Edukasi
                      </th>
                    <th>
                        Hasil
                    </th>
                    </thead>
                    <tbody>
                        @foreach ($hasilramodif as $hasilramodif)
                        <tr>
                            <td>{{ $hasilramodif->nama }}</td>
                            <td>{{ $hasilramodif->waktu }}</td>
                            <td>{{ $hasilramodif->namaramodif }}</td>
                            <td>{{ $hasilramodif->skor }}</td>
                        </tr>
                    @endforeach

                    </tbody>
                  </table>

                </form>

                </div>
              </div>
            </div>

  </div>
@endsection
