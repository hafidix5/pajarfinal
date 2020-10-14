<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\pasien;
use App\insting;
use App\detail_insting;
use Carbon\Carbon;
use App\pertanyaan_insting;

class detail_instingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$idAnak,$idinsting)
    {

        $date=Carbon::now();
        $date=$date->toDateString();
        $jumlahpertanyaan=pertanyaan_insting::where('insting_id', $idinsting)->count();
           // dd($jumlahpertanyaan);
       // $no=pertanyaan_insting::where('insting_id', $idinsting)->min();
        $nomor=pertanyaan_insting::where('insting_id', $idinsting)
        ->select('id')
        ->orderBy('id','asc')
        ->first();
        $no=$nomor->id;
        $data=$request->except(['_token', '_method']);
       // dd($data);
        $cek = detail_insting::where('waktu',$date)->first();
        if($cek=='4')
        {
            return back()->withStatus(__('Kuesioner hanya bisa diisi Satu kali per hari'));

        }
        else
        {

            foreach($data as $input){

                DB::table('detail_insting')->insert([
                  'waktu'=>$date,
                  'jawaban'=>$input,
                  'pertanyaan_insting_id'=>$no,
                  'anak_id'=>$idAnak,

                ]);
                $no++;

            }
            $rendah=0.5*$jumlahpertanyaan;
            $tinggi=1*$jumlahpertanyaan;
            $skor=DB::selectOne('
                        SELECT (case when SUM(di.jawaban)<='.$rendah.' then "Pengetahuan Rendah"
                                    when SUM(di.jawaban)<='.$tinggi.' then "Pengetahuan Tinggi"
                            END)
                            AS skor FROM detail_insting AS di JOIN pertanyaan_insting AS pei ON
                            di.pertanyaan_insting_id=pei.id JOIN insting AS i ON pei.insting_id=i.id JOIN anak AS a ON
                             di.anak_id=a.id WHERE i.id='.$idinsting.' AND a.id='.$idAnak.' AND di.waktu="'.$date.'" limit 1
        ');
            //$skorfinal=collect($skor);
          //dd($skor->skor);
           // dd($idinsting);
           return back()->withStatus(__('Hasil : '.$skor->skor));

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($idAnak,$idJenisEdukasi)
    {
        if(pasien::where('user_id','=',auth()->user()->id)->first())
        {
            $detail_insting=insting::where('insting.jenis_edukasi_id', $idJenisEdukasi)
            ->Join('pertanyaan_insting','insting.id','=',
            'pertanyaan_insting.insting_id')
            ->select('pertanyaan_insting.pertanyaan as pertanyaan',
            'pertanyaan_insting.id as id')
            ->get();
            $video=insting::where('insting.jenis_edukasi_id', $idJenisEdukasi)
            ->select('insting.video as video','insting.id as id')->first();
           // dd($idAnak);
            return view('pages.kuesioner_insting',['detail_insting'=>$detail_insting,
            'video'=>$video,'id_anak'=>$idAnak]);
        }
        else
        {

            return redirect()->route('dataDiri')->withStatus(__('Anda harus mengisi Data Diri terlebih dahulu'));
        }
    }

    public function showHasilInsting($idAnak,$idJenisEdukasi)
    {
        $id_insting=DB::SelectOne('
        SELECT i.id AS id_insting FROM jenis_edukasi AS je JOIN insting AS i ON je.id=i.jenis_edukasi_id
WHERE je.id='.$idJenisEdukasi.'
        ');
        $jumlahpertanyaan=pertanyaan_insting::where('insting_id', $id_insting->id_insting)->count();

        $rendah=0.5*$jumlahpertanyaan;
        $tinggi=1*$jumlahpertanyaan;

        $hasilInsting=DB::select('
        SELECT a.nama AS nama,di.waktu AS waktu,i.nama as insting,(case when SUM(di.jawaban)<='.$rendah.' then "Pengetahuan Rendah"
        when SUM(di.jawaban)<='.$tinggi.' then "Pengetahuan Tinggi" END)
        AS skor FROM detail_insting AS di left JOIN pertanyaan_insting AS pei ON
        di.pertanyaan_insting_id=pei.id JOIN insting AS i ON pei.insting_id=i.id JOIN anak AS a ON
        di.anak_id=a.id WHERE i.id='.$id_insting->id_insting.' AND a.id='.$idAnak.' GROUP BY di.waktu Order by di.waktu desc

    ');
          //  dd($hasilInsting);
             return view('pages.hasilInsting',['hasilInsting'=>$hasilInsting]);

    }

    public function showHasilInstingAdmin($idAnak,$idJenisEdukasi)
    {
        $id_insting=DB::SelectOne('
        SELECT i.id AS id_insting FROM jenis_edukasi AS je JOIN insting AS i ON je.id=i.jenis_edukasi_id
WHERE je.id='.$idJenisEdukasi.'
        ');
        $jumlahpertanyaan=pertanyaan_insting::where('insting_id', $id_insting->id_insting)->count();

        $rendah=0.5*$jumlahpertanyaan;
        $tinggi=1*$jumlahpertanyaan;

        $hasilInsting=DB::select('
        SELECT di.waktu AS waktu,a.nama AS namaAnak,pei.pertanyaan AS pertanyaan, di.jawaban AS jawaban
 FROM anak AS a JOIN detail_insting AS di ON a.id=di.anak_id JOIN pertanyaan_insting AS pei
ON di.pertanyaan_insting_id=pei.id JOIN insting AS i ON pei.insting_id=i.id
WHERE a.id='.$idAnak.' AND i.jenis_edukasi_id='.$idJenisEdukasi.' ORDER BY di.waktu DESC, pei.id asc
    ');
          //  dd($hasilInsting);
             return view('pages.hasilInstingAdmin',['hasilInsting'=>$hasilInsting]);

    }

    public function showHasilDetekosAdmin($idAnak,$idJenisEdukasi)
    {
        $id_insting=DB::SelectOne('
        SELECT i.id AS id_insting FROM jenis_edukasi AS je JOIN insting AS i ON je.id=i.jenis_edukasi_id
WHERE je.id='.$idJenisEdukasi.'
        ');
        $jumlahpertanyaan=pertanyaan_insting::where('insting_id', $id_insting->id_insting)->count();

        $rendah=0.5*$jumlahpertanyaan;
        $tinggi=1*$jumlahpertanyaan;

        $hasilDetekos=DB::select('
        SELECT di.waktu AS waktu,a.nama AS namaAnak,pei.pertanyaan AS pertanyaan, di.jawaban AS jawaban
 FROM anak AS a JOIN detail_detekos AS di ON a.id=di.anak_id JOIN pertanyaan_detekos AS pei
ON di.pertanyaan_detekos_id=pei.id JOIN detekos AS i ON pei.detekos_id=i.id
WHERE a.id='.$idAnak.' AND i.jenis_edukasi_id='.$idJenisEdukasi.' ORDER BY di.waktu DESC, pei.id asc
    ');
          //  dd($hasildetekos);
             return view('pages.hasilDetekosAdmin',['hasilDetekos'=>$hasilDetekos]);

    }

    public function showHasilRamodifAdmin($idAnak,$idJenisEdukasi)
    {
        $id_insting=DB::SelectOne('
        SELECT i.id AS id_insting FROM jenis_edukasi AS je JOIN insting AS i ON je.id=i.jenis_edukasi_id
WHERE je.id='.$idJenisEdukasi.'
        ');
        $jumlahpertanyaan=pertanyaan_insting::where('insting_id', $id_insting->id_insting)->count();

        $rendah=0.5*$jumlahpertanyaan;
        $tinggi=1*$jumlahpertanyaan;

        $hasilRamodif=DB::select('
        SELECT di.waktu AS waktu,a.nama AS namaAnak,pei.pertanyaan AS pertanyaan, di.jawaban AS jawaban,
        pei.tahap as tahap
 FROM anak AS a JOIN detail_Ramodif AS di ON a.id=di.anak_id JOIN pertanyaan_Ramodif AS pei
ON di.pertanyaan_Ramodif_id=pei.id JOIN Ramodif AS i ON pei.Ramodif_id=i.id
WHERE a.id='.$idAnak.' AND i.jenis_edukasi_id='.$idJenisEdukasi.' ORDER BY di.waktu DESC, pei.id asc
    ');
          //  dd($hasilRamodif);
             return view('pages.hasilRamodifAdmin',['hasilRamodif'=>$hasilRamodif]);

    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
