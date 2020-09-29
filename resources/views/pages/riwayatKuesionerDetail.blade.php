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
            <div class="container">
                <div class="row">
                  <div class="col-sm">
                    <div class="card text-center">
                        <h5 class="card-header">Pengetahuan Hipertensi</h5>
                        <div class="card-body ">
                          <a href="#" class="btn btn-primary disabled">
                            @foreach ($skorMerah as $skor)
                            {{ $skor->skorMerah }}
                            @endforeach
                            </a>
                        </div>
                      </div>
                  </div>
                  <div class="col-sm">
                     <div class="card text-center">
                        <h5 class="card-header">Pengetahuan Hipertensi 2</h5>
                        <div class="card-body">
                            <a href="#" class="btn btn-primary disabled">
                              @foreach ($skorOren as $skor)
                              {{ $skor->skorOren }}
                              @endforeach
                              </a>
                          </div>
                      </div>
                  </div>
                  <div class="col-sm">
                     <div class="card text-center">
                        <h5 class="card-header">Modifikasi Diet</h5>
                        <div class="card-body">
                            <a href="#" class="btn btn-primary disabled">
                              @foreach ($skorKuning as $skor)
                              {{ $skor->skorKuning }}
                              @endforeach
                              </a>
                          </div>
                      </div>
                  </div>
                </div>
              </div>
              <div class="container">
                <div class="row">
                  <div class="col-sm">
                     <div class="card text-center">
                        <h5 class="card-header">Sikap</h5>
                        <div class="card-body">
                            <a href="#" class="btn btn-primary disabled">
                              @foreach ($skorHijauM as $skor)
                              {{ $skor->skorHijauM }}
                              @endforeach
                              </a>
                          </div>
                      </div>
                  </div>
                  <div class="col-sm">
                     <div class="card text-center">
                        <h5 class="card-header">Kepatuhan Pengobatan</h5>
                        <div class="card-body">
                            <a href="#" class="btn btn-primary disabled">
                              @foreach ($skorHijau as $skor)
                              {{ $skor->skorHijau }}
                              @endforeach
                              </a>
                          </div>
                      </div>
                  </div>
                  <div class="col-sm">
                     <div class="card text-center">
                        <h5 class="card-header">Penggunaan Obat-obatan</h5>
                        <div class="card-body">
                            <a href="#" class="btn btn-primary disabled">
                              @foreach ($skorBiruMObat as $skor)
                              {{ $skor->skorBiruMObat }}
                              @endforeach
                              </a>
                          </div>
                      </div>
                  </div>
                </div>
              </div>
              <div class="container">
                <div class="row">
                  <div class="col-sm">
                     <div class="card text-center">
                        <h5 class="card-header">Diet</h5>
                        <div class="card-body">
                            <a href="#" class="btn btn-primary disabled">
                              @foreach ($skorBiruMDiet as $skor)
                              {{ $skor->skorBiruMDiet }}
                              @endforeach
                              </a>
                          </div>
                      </div>
                  </div>
                  <div class="col-sm">
                     <div class="card text-center">
                        <h5 class="card-header">Aktivitas Fisik</h5>
                        <div class="card-body">
                            <a href="#" class="btn btn-primary disabled">
                              @foreach ($skorBiruMFisik as $skor)
                              {{ $skor->skorBiruMFisik }}
                              @endforeach
                              </a>
                          </div>
                      </div>
                  </div>
                  <div class="col-sm">
                     <div class="card text-center">
                        <h5 class="card-header">Merokok</h5>
                        <div class="card-body">
                            <a href="#" class="btn btn-primary disabled">
                              @foreach ($skorBiruMRokok as $skor)
                              {{ $skor->skorBiruMRokok }}
                              @endforeach
                              </a>
                          </div>
                      </div>
                  </div>
                </div>
              </div>
              <div class="container">
                <div class="row">
                  <div class="col-sm">
                     <div class="card text-center">
                        <h5 class="card-header">Manajemen Berat badan</h5>
                        <div class="card-body">
                            <a href="#" class="btn btn-primary disabled">
                              @foreach ($skorNavyBB as $skor)
                              {{ $skor->skorNavyBB }}
                              @endforeach
                              </a>
                          </div>
                      </div>
                  </div>
                  <div class="col-sm">
                     <div class="card text-center">
                        <h5 class="card-header">Alkohol</h5>
                        <div class="card-body">
                            <a href="#" class="btn btn-primary disabled">
                              @foreach ($skorNavyAlkohol as $skor)
                              {{ $skor->skorNavyAlkohol }}
                              @endforeach
                              </a>
                          </div>
                      </div>
                  </div>
                  <div class="col-sm">
                     <div class="card text-center">
                        <h5 class="card-header">Stress</h5>
                        <div class="card-body">
                            <a href="#" class="btn btn-primary disabled">
                              @foreach ($skorBiru as $skor)
                              {{ $skor->skorBiru }}
                              @endforeach
                              </a>
                          </div>
                      </div>
                  </div>
                </div>
              </div>
              <h4>Pertanyaan kuesioner yang belum dijawab benar</h4>
              <a href="{{ route('downloadHasilKuesioner') }}" class="btn btn-success my-3" target="_blank">EXPORT EXCEL</a>
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                  <th>
                    Nomor
                  </th>
                  <th>
                    Pertanyaan
                  </th>

                </thead>
                <tbody>
                    @foreach ($response as $response)
                    <tr>

                        <td>{{ $response->id }}</td>
                        <td>{{ $response->pertanyaan}}</td>

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
