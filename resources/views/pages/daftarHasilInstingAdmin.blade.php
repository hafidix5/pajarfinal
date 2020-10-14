@extends('layouts.app', ['activePage' => 'Daftar Hasil Insting', 'titlePage' => __('Daftar Hasil Insting')])

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
                        Nama Orang Tua
                      </th>
                      <th>
                        Puskesmas
                      </th>
                    <th>
                        Aksi
                    </th>
                    </thead>
                    <tbody>
                        @foreach ($daftarhasil as $daftarhasil)
                        <tr>
                            <td>{{ $daftarhasil->namaAnak }}</td>
                            <td>{{ $daftarhasil->namaOrtu }}</td>
                            <td>{{ $daftarhasil->namaPuskesmas }}</td>
                            <th>
                                <a class="nav-link" href="{{ route('hasil_kuesioner_instingAdmin',[$daftarhasil->id,$id_jenisEdukasi]) }}">
                                    <i class="material-icons">help_outline</i> Lihat
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
  </div>
@endsection
