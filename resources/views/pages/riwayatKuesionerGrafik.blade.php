@extends('layouts.app', ['activePage' => 'Riwayat Kuesioner', 'titlePage' => __('Riwayat Kuesioner')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Detail Riwayat Kuesioner</h4>
            <p class="card-category"></p>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                  <th>
                    Nomor
                  </th>
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
                    Hasil
                  </th>
                  <th>
                    Aksi
                  </th>
                </thead>
                <tbody>
                  <tr>
                    <td>
                      1
                    </td>
                    <td>
                      Dakota Rice
                    </td>
                    <td>
                      082839123312
                    </td>
                    <td>
                      Nama puskesmas
                    </td>
                    <td>
                        Resiko tinggi
                    </td>
                    <td>
                        <a class="nav-link" href="{{ route('dataDiri') }}">
                            <i class="material-icons">visibility</i>
                          </a>
                    </td>
                  </tr>

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
