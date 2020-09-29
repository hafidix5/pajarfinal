@extends('layouts.app', ['activePage' => 'Isi kuesioner', 'titlePage' => __('Isi kuesioner')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="card">
      <div class="card-header card-header-primary">
        <h4 class="card-title">Ramodif</h4>
        <p class="card-category">Rawat dan Modifikasi</p>
      </div>

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
                Jawaban&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;
              </th>

            </thead>
            <tbody>
                <form method="post" action="{{ route('isi_kuesionerSave') }}" autocomplete="off" class="form-horizontal">
                    @csrf
                    @method('post')

            @foreach ($kuesionerOren as $kuesionerOren)
                <tr>
                    <td>{{ $kuesionerOren->id }}</td>
                    <td>{{ $kuesionerOren->pertanyaan }}</td>
                    <td class="text-left">
                        <span><input type="radio" id={{ $kuesionerOren->id }} name={{ 'pertanyaan'.$kuesionerOren->id }} value="1"/> Benar</span><br>
                        <span><input type="radio" id={{ $kuesionerOren->id }} name={{ 'pertanyaan'.$kuesionerOren->id }} value="0"/> Salah</span><br/>
                       <span><input type="radio" id={{ $kuesionerOren->id }} name={{ 'pertanyaan'.$kuesionerOren->id }} value="0"/> Tidak Tahu</span>
                   </div>
                    </td>
                </tr>
            @endforeach
            @foreach ($kuesionerKuning as $kuesionerKuning)
                <tr>
                    <td>{{ $kuesionerKuning->id }}</td>
                    <td>{{ $kuesionerKuning->pertanyaan }}</td>
                    <td class="text-left">
                        <span><input type="radio" id={{ $kuesionerKuning->id }} name={{ 'pertanyaan'.$kuesionerKuning->id }} value="1"/> Sangat Setuju</span><br>
                        <span><input type="radio" id={{ $kuesionerKuning->id }} name={{ 'pertanyaan'.$kuesionerKuning->id }} value="0"/> Ragu-ragu</span><br/>
                       <span><input type="radio" id={{ $kuesionerKuning->id }} name={{ 'pertanyaan'.$kuesionerKuning->id }} value="0"/> Tidak Setuju</span>
                   </div>
                    </td>
                </tr>
            @endforeach

            @foreach ($kuesionerHijau as $kuesionerHijau)
            <tr>
                <td>{{ $kuesionerHijau->id }}</td>
                <td>{{ $kuesionerHijau->pertanyaan }}</td>
                <td class="text-left">
                    <span><input type="radio" id={{ $kuesionerHijau->id }} name={{ 'pertanyaan'.$kuesionerHijau->id }} value="1"/> Iya </span><br>
                    <span><input type="radio" id={{ $kuesionerHijau->id }} name={{ 'pertanyaan'.$kuesionerHijau->id }} value="0"/> Tidak</span><br/>
               </div>
                </td>
            </tr>
            @endforeach

            @foreach ($kuesionerBiruMObat as $kuesionerBiruMObat)
            <tr>
                <td>{{ $kuesionerBiruMObat->id }}</td>
                <td>{{ $kuesionerBiruMObat->pertanyaan }}</td>
                <td class="text-left">
                    <span>Kegiatan selama 7 hari terakhir</span><br>
                    <span><input type="radio" id={{ $kuesionerBiruMObat->id }} name={{ 'pertanyaan'.$kuesionerBiruMObat->id }} value="0"/> 0</span>&nbsp;
                    <span><input type="radio" id={{ $kuesionerBiruMObat->id }} name={{ 'pertanyaan'.$kuesionerBiruMObat->id }} value="1"/> 1</span>&nbsp;
                    <span><input type="radio" id={{ $kuesionerBiruMObat->id }} name={{ 'pertanyaan'.$kuesionerBiruMObat->id }} value="2"/> 2</span>&nbsp;
                    <span><input type="radio" id={{ $kuesionerBiruMObat->id }} name={{ 'pertanyaan'.$kuesionerBiruMObat->id }} value="3"/> 3</span>&nbsp;
                    <span><input type="radio" id={{ $kuesionerBiruMObat->id }} name={{ 'pertanyaan'.$kuesionerBiruMObat->id }} value="4"/> 4</span>&nbsp;
                    <span><input type="radio" id={{ $kuesionerBiruMObat->id }} name={{ 'pertanyaan'.$kuesionerBiruMObat->id }} value="5"/> 5</span>&nbsp;
                    <span><input type="radio" id={{ $kuesionerBiruMObat->id }} name={{ 'pertanyaan'.$kuesionerBiruMObat->id }} value="6"/> 6</span>&nbsp;
                    <span><input type="radio" id={{ $kuesionerBiruMObat->id }} name={{ 'pertanyaan'.$kuesionerBiruMObat->id }} value="7"/> 7</span>
               </div>
                </td>
            </tr>
            @endforeach
            @foreach ($kuesionerBiruMDiet as $kuesionerBiruMDiet)
            <tr>
                <td>{{ $kuesionerBiruMDiet->id }}</td>
                <td>{{ $kuesionerBiruMDiet->pertanyaan }}</td>
                <td class="text-left">
                    <span>Kegiatan selama 7 hari terakhir</span><br>
                    <span><input type="radio" id={{ $kuesionerBiruMDiet->id }} name={{ 'pertanyaan'.$kuesionerBiruMDiet->id }} value="0"/> 0</span>&nbsp;
                    <span><input type="radio" id={{ $kuesionerBiruMDiet->id }} name={{ 'pertanyaan'.$kuesionerBiruMDiet->id }} value="1"/> 1</span>&nbsp;
                    <span><input type="radio" id={{ $kuesionerBiruMDiet->id }} name={{ 'pertanyaan'.$kuesionerBiruMDiet->id }} value="2"/> 2</span>&nbsp;
                    <span><input type="radio" id={{ $kuesionerBiruMDiet->id }} name={{ 'pertanyaan'.$kuesionerBiruMDiet->id }} value="3"/> 3</span>&nbsp;
                    <span><input type="radio" id={{ $kuesionerBiruMDiet->id }} name={{ 'pertanyaan'.$kuesionerBiruMDiet->id }} value="4"/> 4</span>&nbsp;
                    <span><input type="radio" id={{ $kuesionerBiruMDiet->id }} name={{ 'pertanyaan'.$kuesionerBiruMDiet->id }} value="5"/> 5</span>&nbsp;
                    <span><input type="radio" id={{ $kuesionerBiruMDiet->id }} name={{ 'pertanyaan'.$kuesionerBiruMDiet->id }} value="6"/> 6</span>&nbsp;
                    <span><input type="radio" id={{ $kuesionerBiruMDiet->id }} name={{ 'pertanyaan'.$kuesionerBiruMDiet->id }} value="7"/> 7</span>
               </div>
                </td>
            </tr>
            @endforeach
            @foreach ($kuesionerBiruMFisik as $kuesionerBiruMFisik)
            <tr>
                <td>{{ $kuesionerBiruMFisik->id }}</td>
                <td>{{ $kuesionerBiruMFisik->pertanyaan }}</td>
                <td class="text-left">
                    <span>Kegiatan selama 7 hari terakhir</span><br>
                    <span><input type="radio" id={{ $kuesionerBiruMFisik->id }} name={{ 'pertanyaan'.$kuesionerBiruMFisik->id }} value="0"/> 0</span>&nbsp;
                    <span><input type="radio" id={{ $kuesionerBiruMFisik->id }} name={{ 'pertanyaan'.$kuesionerBiruMFisik->id }} value="1"/> 1</span>&nbsp;
                    <span><input type="radio" id={{ $kuesionerBiruMFisik->id }} name={{ 'pertanyaan'.$kuesionerBiruMFisik->id }} value="2"/> 2</span>&nbsp;
                    <span><input type="radio" id={{ $kuesionerBiruMFisik->id }} name={{ 'pertanyaan'.$kuesionerBiruMFisik->id }} value="3"/> 3</span>&nbsp;
                    <span><input type="radio" id={{ $kuesionerBiruMFisik->id }} name={{ 'pertanyaan'.$kuesionerBiruMFisik->id }} value="4"/> 4</span>&nbsp;
                    <span><input type="radio" id={{ $kuesionerBiruMFisik->id }} name={{ 'pertanyaan'.$kuesionerBiruMFisik->id }} value="5"/> 5</span>&nbsp;
                    <span><input type="radio" id={{ $kuesionerBiruMFisik->id }} name={{ 'pertanyaan'.$kuesionerBiruMFisik->id }} value="6"/> 6</span>&nbsp;
                    <span><input type="radio" id={{ $kuesionerBiruMFisik->id }} name={{ 'pertanyaan'.$kuesionerBiruMFisik->id }} value="7"/> 7</span>
               </div>
                </td>
            </tr>
            @endforeach
            @foreach ($kuesionerBiruMRokok as $kuesionerBiruMRokok)
            <tr>
                <td>{{ $kuesionerBiruMRokok->id }}</td>
                <td>{{ $kuesionerBiruMRokok->pertanyaan }}</td>
                <td class="text-left">
                    <span>Kegiatan selama 7 hari terakhir</span><br>
                    <span><input type="radio" id={{ $kuesionerBiruMRokok->id }} name={{ 'pertanyaan'.$kuesionerBiruMRokok->id }} value="0"/> 0</span>&nbsp;
                    <span><input type="radio" id={{ $kuesionerBiruMRokok->id }} name={{ 'pertanyaan'.$kuesionerBiruMRokok->id }} value="1"/> 1</span>&nbsp;
                    <span><input type="radio" id={{ $kuesionerBiruMRokok->id }} name={{ 'pertanyaan'.$kuesionerBiruMRokok->id }} value="2"/> 2</span>&nbsp;
                    <span><input type="radio" id={{ $kuesionerBiruMRokok->id }} name={{ 'pertanyaan'.$kuesionerBiruMRokok->id }} value="3"/> 3</span>&nbsp;
                    <span><input type="radio" id={{ $kuesionerBiruMRokok->id }} name={{ 'pertanyaan'.$kuesionerBiruMRokok->id }} value="4"/> 4</span>&nbsp;
                    <span><input type="radio" id={{ $kuesionerBiruMRokok->id }} name={{ 'pertanyaan'.$kuesionerBiruMRokok->id }} value="5"/> 5</span>&nbsp;
                    <span><input type="radio" id={{ $kuesionerBiruMRokok->id }} name={{ 'pertanyaan'.$kuesionerBiruMRokok->id }} value="6"/> 6</span>&nbsp;
                    <span><input type="radio" id={{ $kuesionerBiruMRokok->id }} name={{ 'pertanyaan'.$kuesionerBiruMRokok->id }} value="7"/> 7</span>
               </div>
                </td>
            </tr>
            @endforeach
            @foreach ($kuesionerNavyBB as $kuesionerNavyBB)
            <tr>
                <td>{{ $kuesionerNavyBB->id }}</td>
                <td>{{ $kuesionerNavyBB->pertanyaan }}</td>
                <td class="text-left">
                    <span>Kegiatan selama 7 hari terakhir</span><br>
                    <span><input type="radio" id={{ $kuesionerNavyBB->id }} name={{ 'pertanyaan'.$kuesionerNavyBB->id }} value="0"/> 0</span>&nbsp;
                    <span><input type="radio" id={{ $kuesionerNavyBB->id }} name={{ 'pertanyaan'.$kuesionerNavyBB->id }} value="1"/> 1</span>&nbsp;
                    <span><input type="radio" id={{ $kuesionerNavyBB->id }} name={{ 'pertanyaan'.$kuesionerNavyBB->id }} value="2"/> 2</span>&nbsp;
                    <span><input type="radio" id={{ $kuesionerNavyBB->id }} name={{ 'pertanyaan'.$kuesionerNavyBB->id }} value="3"/> 3</span>&nbsp;
                    <span><input type="radio" id={{ $kuesionerNavyBB->id }} name={{ 'pertanyaan'.$kuesionerNavyBB->id }} value="4"/> 4</span>&nbsp;
                    <span><input type="radio" id={{ $kuesionerNavyBB->id }} name={{ 'pertanyaan'.$kuesionerNavyBB->id }} value="5"/> 5</span>&nbsp;

                </td>
            </tr>
            @endforeach
            @foreach ($kuesionerNavyAlkohol as $kuesionerNavyAlkohol)
            <tr>
                <td>{{ $kuesionerNavyAlkohol->id }}</td>
                <td>{{ $kuesionerNavyAlkohol->pertanyaan }}</td>
                <td class="text-left">
                    <span>Konsumsi alkohol 7 hari terakhir</span><br>
                    <span><input type="radio" id={{ $kuesionerNavyAlkohol->id }} name={{ 'pertanyaan'.$kuesionerNavyAlkohol->id }} value="0"/> 0</span>&nbsp;
                    <span><input type="radio" id={{ $kuesionerNavyAlkohol->id }} name={{ 'pertanyaan'.$kuesionerNavyAlkohol->id }} value="1"/> 1</span>&nbsp;
                    <span><input type="radio" id={{ $kuesionerNavyAlkohol->id }} name={{ 'pertanyaan'.$kuesionerNavyAlkohol->id }} value="2"/> 2</span>&nbsp;
                    <span><input type="radio" id={{ $kuesionerNavyAlkohol->id }} name={{ 'pertanyaan'.$kuesionerNavyAlkohol->id }} value="3"/> 3</span>&nbsp;
                    <span><input type="radio" id={{ $kuesionerNavyAlkohol->id }} name={{ 'pertanyaan'.$kuesionerNavyAlkohol->id }} value="4"/> 4</span>&nbsp;
                    <span><input type="radio" id={{ $kuesionerNavyAlkohol->id }} name={{ 'pertanyaan'.$kuesionerNavyAlkohol->id }} value="5"/> 5</span>&nbsp;
                    <span><input type="radio" id={{ $kuesionerNavyAlkohol->id }} name={{ 'pertanyaan'.$kuesionerNavyAlkohol->id }} value="6"/> 6</span>&nbsp;
                    <span><input type="radio" id={{ $kuesionerNavyAlkohol->id }} name={{ 'pertanyaan'.$kuesionerNavyAlkohol->id }} value="7"/> 7</span>
                </div>
                </td>
            </tr>
            @endforeach
            @foreach ($kuesionerNavyAlkoholbotol as $kuesionerNavyAlkoholbotol)
            <tr>
                <td>{{ $kuesionerNavyAlkoholbotol->id }}</td>
                <td>{{ $kuesionerNavyAlkoholbotol->pertanyaan }}</td>
                <td class="text-left">
                    <span>Konsumsi alkohol 7 hari terakhir(botol)</span><br>
                    <span><input type="radio" id={{ $kuesionerNavyAlkoholbotol->id }} name={{ 'pertanyaan'.$kuesionerNavyAlkoholbotol->id }} value="0"/> 0</span>&nbsp;
                    <span><input type="radio" id={{ $kuesionerNavyAlkoholbotol->id }} name={{ 'pertanyaan'.$kuesionerNavyAlkoholbotol->id }} value="1"/> 1</span>&nbsp;
                    <span><input type="radio" id={{ $kuesionerNavyAlkoholbotol->id }} name={{ 'pertanyaan'.$kuesionerNavyAlkoholbotol->id }} value="2"/> 2</span>&nbsp;
                    <span><input type="radio" id={{ $kuesionerNavyAlkoholbotol->id }} name={{ 'pertanyaan'.$kuesionerNavyAlkoholbotol->id }} value="3"/> 3</span>&nbsp;
                    <span><input type="radio" id={{ $kuesionerNavyAlkoholbotol->id }} name={{ 'pertanyaan'.$kuesionerNavyAlkoholbotol->id }} value="4"/> 4</span>&nbsp;
                    <span><input type="radio" id={{ $kuesionerNavyAlkoholbotol->id }} name={{ 'pertanyaan'.$kuesionerNavyAlkoholbotol->id }} value="5"/> 5</span>&nbsp;
                    <span><input type="radio" id={{ $kuesionerNavyAlkoholbotol->id }} name={{ 'pertanyaan'.$kuesionerNavyAlkoholbotol->id }} value="6"/> 6</span>&nbsp;
                    <span><input type="radio" id={{ $kuesionerNavyAlkoholbotol->id }} name={{ 'pertanyaan'.$kuesionerNavyAlkoholbotol->id }} value="7"/> 7</span>
                </div>
                </td>
            </tr>
            @endforeach
            @foreach ($kuesionerNavyAlkoholtotal as $kuesionerNavyAlkoholtotal)
            <tr>
                <td>{{ $kuesionerNavyAlkoholtotal->id }}</td>
                <td>{{ $kuesionerNavyAlkoholtotal->pertanyaan }}</td>
                <td class="text-left">
                    <span>Konsumsi alkohol 1 bulan terakhir</span><br>
                    <span><input type="number" id={{ $kuesionerNavyAlkoholtotal->id }} name={{ 'pertanyaan'.$kuesionerNavyAlkoholtotal->id }} value="" placeholder="botol"/> </span>&nbsp;
                    </div>
                </td>
            </tr>
            @endforeach
            @foreach ($kuesionerNavyAlkoholmerek as $kuesionerNavyAlkoholmerek)
            <tr>
                <td>{{ $kuesionerNavyAlkoholmerek->id }}</td>
                <td>{{ $kuesionerNavyAlkoholmerek->pertanyaan }}</td>
                <td class="text-left">
                    <span><input type="text" id={{ $kuesionerNavyAlkoholmerek->id }} name={{ 'pertanyaan'.$kuesionerNavyAlkoholmerek->id }} value="" placeholder="merek"/> </span>&nbsp;
                    </div>
                </td>
            </tr>
            @endforeach
            @foreach ($kuesionerBiru as $kuesionerBiru)
            <tr>
                <td>{{ $kuesionerBiru->id }}</td>
                <td>{{ $kuesionerBiru->pertanyaan }}</td>
                <td class="text-left">
                    <span><input type="radio" id={{ $kuesionerBiru->id }} name={{ 'pertanyaan'.$kuesionerBiru->id }} value="0"/> Tidak pernah</span><br>
                    <span><input type="radio" id={{ $kuesionerBiru->id }} name={{ 'pertanyaan'.$kuesionerBiru->id }} value="1"/> Jarang</span><br/>
                    <span><input type="radio" id={{ $kuesionerBiru->id }} name={{ 'pertanyaan'.$kuesionerBiru->id }} value="2"/> Kadang-kadang Yakin</span><br/>
                    <span><input type="radio" id={{ $kuesionerBiru->id }} name={{ 'pertanyaan'.$kuesionerBiru->id }} value="3"/> Sering</span><br/>
                    <span><input type="radio" id={{ $kuesionerBiru->id }} name={{ 'pertanyaan'.$kuesionerBiru->id }} value="4"/> Sangat Sering</span><br/>
               </div>
                </td>
            </tr>
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
