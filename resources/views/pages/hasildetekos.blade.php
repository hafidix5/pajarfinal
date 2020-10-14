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
                        @foreach ($hasildetekos as $hasildetekos)
                        <tr>
                            <td>{{ $hasildetekos->nama }}</td>
                            <td>{{ $hasildetekos->waktu }}</td>
                            <td>{{ $hasildetekos->detekos }}</td>
                            <td>{{ $hasildetekos->skor }}</td>
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
