@extends('layouts.app', ['activePage' => 'Riwayat Kuesioner', 'titlePage' => __('Riwayat Kuesioner')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Riwayat Kuesioner</h4>
            <p class="card-category"></p>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">

                  <th>
                    Nama
                  </th>
                  <th>
                    HP
                  </th>
                  <th>
                    Puskesmas
                  </th>
                  <th>
                    Tanggal
                  </th>
                  <th>
                    Poin
                  </th>
                  <th>
                    Aksi
                  </th>
                </thead>
                <tbody>

                    @foreach ($response as $response)
                    <tr>

                        <td>{{ $response->nama }}</td>
                        <td>{{ $response->hp}}</td>
                        <td>{{ $response->namaPuskesmas }}</td>
                        <td>{{ $response->tanggal }}</td>
                        <td>{{ $response->skor }}</td>
                        <td>
                            <a class="nav-link" href="{{ route('riwayatDetailKuesioner',['tanggal'=>$response->tanggal,'id'=>$response->id]) }}">
                                <i class="material-icons">visibility</i>
                              </a>
                        </td>
                    </tr>

                @endforeach


                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>
@endsection
