@extends('layouts.app', ['activePage' => 'Isi kuesioner', 'titlePage' => __('Isi kuesioner')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="card">
      <div class="card-header card-header-primary">
        <h4 class="card-title">Ramodif</h4>
        <p class="card-category">Kuesioner Rawat dan Modifikasi</p>
      </div>

      <div class="card-body">
        @if (session('status'))
        <div class="row">
          <div class="col-sm-12">
            <div class="alert alert-success">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <i class="material-icons">close</i>
              </button>
              <span><h4>{{ session('status') }}<h4></span>
            </div>
          </div>
        </div>
      @endif
      <div class="embed-responsive embed-responsive-16by9">
      <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{$video->video}}?rel=0" allowfullscreen></iframe>
      </div>
      <br><br>
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
                Tahap
              </th>
              <th>
                Jawaban&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;
              </th>

            </thead>
            <tbody>
                <form method="post" action="{{ route('kuesioner_ramodifSave',[$id_anak,$video->id]) }}" autocomplete="off" class="form-horizontal">
                    @csrf
                    @method('post')
                    <?php $i=1; ?>
            @foreach ($detail_ramodif as $detail_ramodif)
                <tr>
                    <td>{{ $i }}</td>
                    <td>{{ $detail_ramodif->pertanyaan }}</td>
                    <td>{{ $detail_ramodif->tahap }}</td>
                    <td class="text-left">
                        <span><input type="radio" id={{ $detail_ramodif->id }} name={{ 'pertanyaan'.$detail_ramodif->id }} value="1" required/> Sudah</span><br>
                        <span><input type="radio" id={{ $detail_ramodif->id }} name={{ 'pertanyaan'.$detail_ramodif->id }} value="0"/> Belum</span><br/>
                   </div>
                    </td>

                </tr>
                <?php $i++; ?>
            @endforeach


            </tbody>
          </table>
          <div class="card-footer ml-auto mr-auto">
            <button type="submit" class="btn btn-primary">{{ __('Simpan') }}</button>
          </div>
        </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
