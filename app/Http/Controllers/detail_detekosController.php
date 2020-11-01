<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\pasien;
use App\detekos;
use App\detail_detekos;
use Carbon\Carbon;
use App\pertanyaan_detekos;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use App\Exports\hasilDetekosExport;
use Session;

class detail_detekosController extends Controller
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
    public function store(Request $request,$idAnak,$iddetekos)
    {

        $date=Carbon::now();
        $date=$date->toDateString();
        $jumlahpertanyaan=pertanyaan_detekos::where('detekos_id', $iddetekos)->count();
       // $no=pertanyaan_detekos::where('detekos_id', $iddetekos)->min();
        $nomor=pertanyaan_detekos::where('detekos_id', $iddetekos)
        ->select('id')
        ->orderBy('id','asc')
        ->first();
        $no=$nomor->id;
        $data=$request->except(['_token', '_method']);
       // dd($data);
        $cek = detail_detekos::where('waktu',$date)->where('anak_id',$idAnak)->first();
        if($cek)
        {
            return back()->withStatus(__('Kuesioner hanya bisa diisi Satu kali per hari'));
          // return redirect()->back()->with('error','Kuesioner hanya bisa diisi Satu kali per hari');
        }
        else
        {

            foreach($data as $input){

                DB::table('detail_detekos')->insert([
                  'waktu'=>$date,
                  'jawaban'=>$input,
                  'pertanyaan_detekos_id'=>$no,
                  'anak_id'=>$idAnak,

                ]);
                $no++;

            }
            $rendah=0.33*$jumlahpertanyaan;
            $normal=0.67*$jumlahpertanyaan;
            $tinggi=1*$jumlahpertanyaan;
            $skor=DB::selectOne('
                        SELECT (case when SUM(dd.jawaban)<='.$rendah.' then "Resiko Rendah"
                                    when SUM(dd.jawaban)<='.$normal.' then "Normal"
                                    when SUM(dd.jawaban)<='.$tinggi.' then "Resiko Tinggi"
                            END)
                            AS skor FROM detail_detekos AS dd JOIN pertanyaan_detekos AS pd ON
                            dd.pertanyaan_detekos_id=pd.id JOIN detekos AS d ON pd.detekos_id=d.id JOIN anak AS a ON
                             dd.anak_id=a.id WHERE d.id='.$iddetekos.' AND a.id='.$idAnak.' AND dd.waktu="'.$date.'" limit 1
        ');

        return back()->withStatus(__('Hasil :'.$skor->skor));
          //  return back()->withStatus(__('jawaban Kuesioner berhasil disimpan'));

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
            $detail_detekos=detekos::where('detekos.jenis_edukasi_id', $idJenisEdukasi)
            ->Join('pertanyaan_detekos','detekos.id','=',
            'pertanyaan_detekos.detekos_id')
            ->select('pertanyaan_detekos.pertanyaan as pertanyaan',
            'pertanyaan_detekos.id as id')
            ->get();
            $video=detekos::where('detekos.jenis_edukasi_id', $idJenisEdukasi)
            ->select('detekos.video as video','detekos.id as id')->first();
           // dd($idAnak);
            return view('pages.kuesioner_detekos',['detail_detekos'=>$detail_detekos,
            'video'=>$video,'id_anak'=>$idAnak]);
        }
        else
        {

            return redirect()->route('dataDiri')->withStatus(__('Anda harus mengisi Data Diri terlebih dahulu'));
        }
    }

    public function showHasilDetekos($idAnak,$idJenisEdukasi)
    {
        $id_detekos=DB::SelectOne('
        SELECT i.id AS id_detekos FROM jenis_edukasi AS je JOIN detekos AS i ON je.id=i.jenis_edukasi_id
WHERE je.id='.$idJenisEdukasi.'
        ');
        $jumlahpertanyaan=pertanyaan_detekos::where('detekos_id', $id_detekos->id_detekos)->count();

        $rendah=0.5*$jumlahpertanyaan;
        $normal=0*$jumlahpertanyaan;
        $tinggi=1*$jumlahpertanyaan;

        $hasildetekos=DB::select('
        SELECT a.nama AS nama,di.waktu AS waktu,i.nama as detekos,
         (case when SUM(di.jawaban)<='.$normal.' then "Normal"
                                    when SUM(di.jawaban)<='.$rendah.' then "Resiko Rendah"
                                    when SUM(di.jawaban)<='.$tinggi.' then "Resiko Tinggi"
                            END)
        AS skor FROM detail_detekos AS di left JOIN pertanyaan_detekos AS pei ON
        di.pertanyaan_detekos_id=pei.id JOIN detekos AS i ON pei.detekos_id=i.id JOIN anak AS a ON
        di.anak_id=a.id WHERE i.id='.$id_detekos->id_detekos.' AND a.id='.$idAnak.' GROUP BY di.waktu,a.nama,i.nama Order by di.waktu desc

    ');
          //  dd($hasildetekos);
             return view('pages.hasildetekos',['hasildetekos'=>$hasildetekos]);

    }
    public function showHasilDetekosAdminExport($idAnak,$idJenisEdukasi)
    {
       // dd($request->idJenisEdukasi);
       Session()->put('idAnak', $idAnak);
       Session()->put('idJenisEdukasi', $idJenisEdukasi);
        return Excel::download(new hasilDetekosExport, 'hasilkuesionerdetekos.xlsx');
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
