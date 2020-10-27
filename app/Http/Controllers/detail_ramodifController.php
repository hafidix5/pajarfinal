<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\pasien;
use App\ramodif;
use App\detail_ramodif;
use Carbon\Carbon;
use App\pertanyaan_ramodif;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use App\Exports\hasilRamodifExport;
use Session;

class detail_ramodifController extends Controller
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
    public function store(Request $request,$idAnak,$idramodif)
    {

        $date=Carbon::now();
        $date=$date->toDateString();
       // $no=pertanyaan_ramodif::where('ramodif_id', $idramodif)->min();
        $nomor=pertanyaan_ramodif::where('ramodif_id', $idramodif)
        ->select('id')
        ->orderBy('id','asc')
        ->first();
        $no=$nomor->id;
        $data=$request->except(['_token', '_method']);
       // dd($data);
        $cek = detail_ramodif::where('waktu',$date)->first();
        if($cek)
        {
            return back()->withStatus(__('Kuesioner hanya bisa diisi Satu kali per hari'));
          // return redirect()->back()->with('error','Kuesioner hanya bisa diisi Satu kali per hari');
        }
        else
        {

            foreach($data as $input){

                DB::table('detail_ramodif')->insert([
                  'waktu'=>$date,
                  'jawaban'=>$input,
                  'pertanyaan_ramodif_id'=>$no,
                  'anak_id'=>$idAnak,

                ]);
                $no++;

            }

        $skorResponding=DB::selectOne('
            SELECT if(SUM(dr.jawaban)>0,"1","0") AS skor
            FROM detail_ramodif AS dr
            JOIN pertanyaan_ramodif AS pr ON dr.pertanyaan_ramodif_id=pr.id JOIN
            ramodif AS r ON pr.ramodif_id=r.id JOIN anak AS a ON dr.anak_id=a.id WHERE
            r.id='.$idramodif.' AND a.id='.$idAnak.' AND dr.waktu="'.$date.'" AND pr.tahap="1.responding" limit 1
        ');
        $skorPreventing=DB::selectOne('
            SELECT if(SUM(dr.jawaban)>0,"1","0") AS skor
            FROM detail_ramodif AS dr
            JOIN pertanyaan_ramodif AS pr ON dr.pertanyaan_ramodif_id=pr.id JOIN
            ramodif AS r ON pr.ramodif_id=r.id JOIN anak AS a ON dr.anak_id=a.id WHERE
            r.id='.$idramodif.' AND a.id='.$idAnak.' AND dr.waktu="'.$date.'" AND pr.tahap="2.preventing" limit 1
        ');
        $skorMonitoring=DB::selectOne('
            SELECT if(SUM(dr.jawaban)>0,"1","0") AS skor
            FROM detail_ramodif AS dr
            JOIN pertanyaan_ramodif AS pr ON dr.pertanyaan_ramodif_id=pr.id JOIN
            ramodif AS r ON pr.ramodif_id=r.id JOIN anak AS a ON dr.anak_id=a.id WHERE
            r.id='.$idramodif.' AND a.id='.$idAnak.' AND dr.waktu="'.$date.'" AND pr.tahap="3.monitoring" limit 1
        ');
        $skorMentoring=DB::selectOne('
            SELECT if(SUM(dr.jawaban)>0,"1","0") AS skor
            FROM detail_ramodif AS dr
            JOIN pertanyaan_ramodif AS pr ON dr.pertanyaan_ramodif_id=pr.id JOIN
            ramodif AS r ON pr.ramodif_id=r.id JOIN anak AS a ON dr.anak_id=a.id WHERE
            r.id='.$idramodif.' AND a.id='.$idAnak.' AND dr.waktu="'.$date.'" AND pr.tahap="4.mentoring" limit 1
        ');
        $skorModeling=DB::selectOne('
            SELECT if(SUM(dr.jawaban)>0,"1","0") AS skor
            FROM detail_ramodif AS dr
            JOIN pertanyaan_ramodif AS pr ON dr.pertanyaan_ramodif_id=pr.id JOIN
            ramodif AS r ON pr.ramodif_id=r.id JOIN anak AS a ON dr.anak_id=a.id WHERE
            r.id='.$idramodif.' AND a.id='.$idAnak.' AND dr.waktu="'.$date.'" AND pr.tahap="5.modeling" limit 1
        ');
        $totalskor=$skorResponding->skor+$skorMentoring->skor+
        $skorModeling->skor+$skorMonitoring->skor+$skorPreventing->skor;
        if($totalskor<=3)
        {
            $hasil="Kurang Mampu";
        }
        else
        {
            $hasil="Mampu";
        }
        //dd($skor);
        return back()->withStatus(__('Hasil : '.$hasil));

        }
    }

    public function showHasilRamodif($idAnak,$idJenisEdukasi)
    {
        $id_ramodif=DB::SelectOne('
        SELECT i.id AS id_ramodif FROM jenis_edukasi AS je JOIN ramodif AS i ON je.id=i.jenis_edukasi_id
WHERE je.id='.$idJenisEdukasi.'
        ');

        $hasilramodif=DB::select('
        SELECT if(sum(skor)<=3,"Kurang Mampu","Mampu") AS skor,waktu,nama,namaramodif FROM (
            SELECT if(SUM(dr.jawaban)>0,"1","0") AS skor, dr.waktu AS waktu, a.nama AS nama,r.nama AS namaramodif
                       FROM detail_ramodif AS dr
                       JOIN pertanyaan_ramodif AS pr ON dr.pertanyaan_ramodif_id=pr.id JOIN
                       ramodif AS r ON pr.ramodif_id=r.id JOIN anak AS a ON dr.anak_id=a.id WHERE
                       r.id='.$id_ramodif->id_ramodif.' AND a.id='.$idAnak.' GROUP BY dr.waktu,pr.tahap,a.nama,r.nama ORDER BY dr.waktu DESC) AS DATA GROUP BY waktu,nama,namaramodif

    ');
          //  dd($hasilramodif);
             return view('pages.hasilRamodif',['hasilramodif'=>$hasilramodif]);

    }
    public function showHasilRamodifAdminExport($idAnak,$idJenisEdukasi)
    {
       // dd($request->idJenisEdukasi);
       Session()->put('idAnak', $idAnak);
       Session()->put('idJenisEdukasi', $idJenisEdukasi);
        return Excel::download(new hasilRamodifExport, 'hasilkuesionerramodif.xlsx');
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
            $detail_ramodif=ramodif::where('ramodif.jenis_edukasi_id', $idJenisEdukasi)
            ->Join('pertanyaan_ramodif','ramodif.id','=',
            'pertanyaan_ramodif.ramodif_id')
            ->select('pertanyaan_ramodif.pertanyaan as pertanyaan',
            'pertanyaan_ramodif.id as id','pertanyaan_ramodif.tahap as tahap')
            ->OrderBy('tahap','ASC')
            ->get();


            $video=ramodif::where('ramodif.jenis_edukasi_id', $idJenisEdukasi)
            ->select('ramodif.video as video','ramodif.id as id')->first();
           // dd($idAnak);
            return view('pages.kuesioner_ramodif',['detail_ramodif'=>$detail_ramodif,
            'video'=>$video,'id_anak'=>$idAnak]);
        }
        else
        {

            return redirect()->route('dataDiri')->withStatus(__('Anda harus mengisi Data Diri terlebih dahulu'));
        }
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
