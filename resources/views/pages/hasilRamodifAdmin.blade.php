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
              <a  href="{{ route('ramodifAdminExport',[$idAnak,$idJenisEdukasi]) }}" class="btn btn-success my-3" target="_blank">EXPORT EXCEL</a>
                <div class="table-responsive">
                  <table class="table table-hover">
                    <thead class="">
                      <th>
                        Tanggal
                      </th>
                      <th>
                        Nama Anak
                      </th>
                      <th>
                        Tahap
                      </th>
                      <th>
                        Pertanyaan
                      </th>
                    <th>
                        Jawaban
                    </th>
                    </thead>
                    <tbody>
                        @foreach ($hasilRamodif as $hasilRamodif)
                        <tr>
                            <td>{{ $hasilRamodif->waktu }}</td>
                            <td>{{ $hasilRamodif->namaAnak }}</td>
                            <td>{{ $hasilRamodif->tahap }}</td>
                            <td>{{ $hasilRamodif->pertanyaan }}</td>
                            <td>{{ $hasilRamodif->jawaban }}</td>
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
