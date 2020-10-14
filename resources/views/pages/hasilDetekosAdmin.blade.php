@extends('layouts.app', ['activePage' => 'Hasil Kuesioner Deteks', 'titlePage' => __('Hasil Kuesioner Deteks')])

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
                        @foreach ($hasilDetekos as $hasilDetekos)
                        <tr>
                            <td>{{ $hasilDetekos->waktu }}</td>
                            <td>{{ $hasilDetekos->namaAnak }}</td>
                            <td>{{ $hasilDetekos->pertanyaan }}</td>
                            <td>{{ $hasilDetekos->jawaban }}</td>
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
