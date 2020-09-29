<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\kuesioner;
use App\pasien;
use Illuminate\Support\Facades\DB;
use App\Exports\HasilKuesionerExport;
use Maatwebsite\Excel\Facades\Excel;

class KuesionerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

         if(pasien::where('user_id','=',auth()->user()->id)->first())
        {
        $kuesioner   = kuesioner::all();

        $kuesionerOren= $kuesioner->whereBetween('id',['1','22']);
        $kuesionerKuning= $kuesioner->whereBetween('id',['23','50']);
        $kuesionerHijau= $kuesioner->whereBetween('id',['51','60']);
        $kuesionerBiruMObat= $kuesioner->whereBetween('id',['61','63']);
        $kuesionerBiruMDiet= $kuesioner->whereBetween('id',['64','75']);
        $kuesionerBiruMFisik= $kuesioner->whereBetween('id',['76','77']);
        $kuesionerBiruMRokok= $kuesioner->whereBetween('id',['78','79']);
        $kuesionerNavyBB= $kuesioner->whereBetween('id',['80','89']);
        $kuesionerNavyAlkohol= $kuesioner->whereBetween('id',['90','90']);
        $kuesionerNavyAlkoholbotol= $kuesioner->whereBetween('id',['91','91']);
        $kuesionerNavyAlkoholtotal= $kuesioner->whereBetween('id',['92','92']);
        $kuesionerNavyAlkoholmerek= $kuesioner->whereBetween('id',['93','93']);
        $kuesionerBiru= $kuesioner->whereBetween('id',['94','107']);
         return view('pages.typography', compact('kuesionerOren','kuesionerKuning',
    'kuesionerHijau','kuesionerBiruMObat','kuesionerBiruMDiet','kuesionerBiruMFisik',
    'kuesionerBiruMRokok','kuesionerNavyBB','kuesionerNavyAlkohol',
    'kuesionerNavyAlkoholbotol','kuesionerNavyAlkoholtotal','kuesionerNavyAlkoholmerek','kuesionerBiru'));
        }
        else
        {

            return redirect()->route('dataDiri')->withStatus(__('Anda harus mengisi Data Diri terlebih dahulu'));
        }

        //dd(pasien::where('user_id','=',auth()->user()->id)->first());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function export_excel()
{
    return Excel::download(new HasilKuesionerExport, 'hasilKuesioner.xlsx' );
}
    public function create()
    {


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        //return back()->withStatus(__('Data diri berhasil disimpan'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
