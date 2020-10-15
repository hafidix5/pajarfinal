@extends('layouts.app', ['activePage' => 'Hasil Kuesioner Insting', 'titlePage' => __('Hasil Kuesioner Insting')])

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
              <a  href="{{ route('instingAdminExport',[$idAnak,$idJenisEdukasi]) }}" class="btn btn-success my-3" target="_blank">EXPORT EXCEL</a>
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
                        Pertanyaan
                      </th>
                    <th>
                        Jawaban
                    </th>
                    </thead>
                    <tbody>
                        @foreach ($hasilInsting as $hasilInsting)
                        <tr>
                            <td>{{ $hasilInsting->waktu }}</td>
                            <td>{{ $hasilInsting->namaAnak }}</td>
                            <td>{{ $hasilInsting->pertanyaan }}</td>
                            <td>{{ $hasilInsting->jawaban }}</td>
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
