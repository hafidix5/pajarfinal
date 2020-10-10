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
       // $no=pertanyaan_insting::where('insting_id', $idinsting)->min();
        $nomor=pertanyaan_insting::where('insting_id', $idinsting)
        ->select('id')
        ->orderBy('id','asc')
        ->first();
        $no=$nomor->id;
        $data=$request->except(['_token', '_method']);
       // dd($data);
        $cek = detail_insting::where('waktu',$date)->first();
        if($cek)
        {
            return back()->withStatus(__('Kuesioner hanya bisa diisi Satu kali per hari'));
          // return redirect()->back()->with('error','Kuesioner hanya bisa diisi Satu kali per hari');
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
            return back()->withStatus(__('jawaban Kuesioner berhasil disimpan'));

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
