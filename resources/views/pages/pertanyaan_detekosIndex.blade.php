@extends('layouts.app', ['activePage' => 'Daftar Pertanyaan Deteks' , 'titlePage' => __('Daftar Pertanyaan Deteks ')])


@section('content')
  <div class="content">
    <h3 style="color:blue;">{{$detekos->nama}}</h3>
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
                            Nomor
                        </th>
                      <th>
                        Pertanyaan
                      </th>

                    <th>
                        Aksi
                    </th>

                    </thead>
                    <tbody>
                        <?php $i=1; ?>
                        @foreach ($pertanyaan_detekos as $pertanyaan_detekos)
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $pertanyaan_detekos->pertanyaan }}</td>

                            <td>
                                <a class="nav-link" href="{{ route('pertanyaan_detekos.edit',$pertanyaan_detekos->id) }}">
                                    <i class="material-icons">edit</i> Edit
                                  </a>
                                   <a class="nav-link" href="{{ route('pertanyaan_detekos.hapus',$pertanyaan_detekos->id) }}">
                                    <i class="material-icons">remove_circle</i> Hapus
                                  </a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    @endforeach

                    </tbody>
                  </table>

                </form>

                </div>
              </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <a href="{{ url('pertanyaan_detekos.insert',$detekos->id) }}" class="btn btn-xs btn-info pull-left ml-auto">Tambah</a>
                </div>
            </div>

  </div>
@endsection
