<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\pertanyaan_ramodif;
use App\ramodif;


class pertanyaan_ramodifController extends Controller
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

    public function insert($id)
    {
        $ramodif_id=$id;
        return view('pages.pertanyaan_ramodifInsert',['ramodif_id'=>$ramodif_id]);
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
    public function store(Request $request)
    {
        $this->validate($request,[
            'id' => 'required',
    		'pertanyaan' => 'required',
            'ramodif_id' => 'required',
            'tahap'=>'required'
    	]);

       /*  $no_ramodif=pertanyaan_ramodif::where('ramodif_id', $request->ramodif_id)->count();
        if($no_ramodif==null)
        {
            $no_ramodif=1;
        }
        else
        {
            $no_ramodif++;
        } */
        pertanyaan_ramodif::create([
            'id'=>$request->id,
            'pertanyaan' => $request->pertanyaan,
            'ramodif_id' => $request->ramodif_id,
            'tahap'=>$request->tahap
        ]);
        $ramodif=ramodif::where('id','=',$request->ramodif_id)->select('ramodif.nama as nama','ramodif.id as id')->first();
       // dd($request->ramodif_id);
            return redirect()->route('pertanyaan_ramodif', ['id' => $request->ramodif_id,'ramodif'=>$ramodif])
            ->withStatus(__('Data berhasil disimpan'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pertanyaan_ramodif=pertanyaan_ramodif::where('pertanyaan_ramodif.ramodif_id', $id)
        ->Join('ramodif','pertanyaan_ramodif.ramodif_id','=','ramodif.id')
        ->select('pertanyaan_ramodif.pertanyaan as pertanyaan','ramodif.nama as nama',
        'pertanyaan_ramodif.id as id','pertanyaan_ramodif.tahap as tahap')
        ->OrderBy('tahap', 'ASC')->get();
        $ramodif=ramodif::where('id','=',$id)->select('ramodif.nama as nama','ramodif.id as id')->first();
        return view('pages.pertanyaan_ramodifIndex',['pertanyaan_ramodif'=>$pertanyaan_ramodif,
        'ramodif'=>$ramodif]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pertanyaan_ramodif=pertanyaan_ramodif::where('pertanyaan_ramodif.id', $id)
        ->select('pertanyaan_ramodif.pertanyaan as pertanyaan','pertanyaan_ramodif.id as id',
        'pertanyaan_ramodif.ramodif_id')->first();
       return view('pages.pertanyaan_ramodifEdit',['pertanyaan_ramodif'=>$pertanyaan_ramodif]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $ramodif_id)
    {
        $this->validate($request,[
            'pertanyaan' => 'required',
            'tahap'=>'required'
    	]);

         $pertanyaan_ramodif = pertanyaan_ramodif::find($id);
         $pertanyaan_ramodif->pertanyaan = $request->pertanyaan;
         $pertanyaan_ramodif->tahap = $request->tahap;
         $pertanyaan_ramodif->save();

       // $ramodif=ramodif::where('id','=',$ramodif_id)->select('ramodif.nama as nama','ramodif.id as id')->first();
         //dd($ramodif->nama);
         $pertanyaan_ramodif=pertanyaan_ramodif::where('pertanyaan_ramodif.ramodif_id', $ramodif_id)
        ->Join('ramodif','pertanyaan_ramodif.ramodif_id','=','ramodif.id')
        ->select('pertanyaan_ramodif.pertanyaan as pertanyaan','ramodif.nama as nama',
        'pertanyaan_ramodif.id as id','pertanyaan_ramodif.tahap as tahap')
        ->OrderBy('tahap','ASC')->get();
        $ramodif=ramodif::where('id','=',$ramodif_id)->select('ramodif.nama as nama','ramodif.id as id')->first();
        return view('pages.pertanyaan_ramodifIndex',['pertanyaan_ramodif'=>$pertanyaan_ramodif,
        'ramodif'=>$ramodif]);



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pertanyaan_ramodif=pertanyaan_ramodif::find($id);
        $pertanyaan_ramodif->delete();
        $ramodif=ramodif::where('id','=',$pertanyaan_ramodif->ramodif_id)->select('ramodif.nama as nama','ramodif.id as id')->first();
         return redirect()->route('pertanyaan_ramodif', ['id' => $pertanyaan_ramodif->ramodif_id,'ramodif'=>$ramodif])
            ->withStatus(__('Data berhasil dihapus'));
    }
}
