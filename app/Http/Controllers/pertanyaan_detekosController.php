<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\pertanyaan_detekos;
use App\detekos;
use App\insting;

class pertanyaan_detekosController extends Controller
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
        $detekos_id=$id;
        return view('pages.pertanyaan_detekosInsert',['detekos_id'=>$detekos_id]);
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
    		'pertanyaan' => 'required',
            'detekos_id' => 'required'
    	]);

        pertanyaan_detekos::create([
            'pertanyaan' => $request->pertanyaan,
            'detekos_id' => $request->detekos_id
        ]);
        $detekos=detekos::where('id','=',$request->detekos_id)->select('detekos.nama as nama','detekos.id as id')->first();
       // dd($request->detekos_id);
            return redirect()->route('pertanyaan_detekos', ['id' => $request->detekos_id,'detekos'=>$detekos])
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
        $pertanyaan_detekos=pertanyaan_detekos::where('detekos.id', $id)
        ->Join('detekos','pertanyaan_detekos.detekos_id','=','detekos.id')
        ->select('pertanyaan_detekos.pertanyaan as pertanyaan','detekos.nama as nama',
        'pertanyaan_detekos.id as id')->get();
        $detekos=detekos::where('id','=',$id)->select('detekos.nama as nama','detekos.id as id')->first();
        return view('pages.pertanyaan_detekosIndex',['pertanyaan_detekos'=>$pertanyaan_detekos,
        'detekos'=>$detekos]);
        //dd($pertanyaan_detekos);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pertanyaan_detekos=pertanyaan_detekos::where('pertanyaan_detekos.id', $id)
        ->select('pertanyaan_detekos.pertanyaan as pertanyaan','pertanyaan_detekos.id as id')->first();
        return view('pages.pertanyaan_detekosEdit',['pertanyaan_detekos'=>$pertanyaan_detekos]);
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
        $this->validate($request,[
    		'pertanyaan' => 'required',
            'detekos_id' => 'required'
    	]);

         $pertanyaan_detekos = pertanyaan_detekos::find($id);
         $pertanyaan_detekos->pertanyaan = $request->pertanyaan;
         $pertanyaan_detekos->detekos_id = $request->detekos_id;
         $pertanyaan_detekos->save();
         $insting=insting::where('id','=',$request->detekos_id)->select('insting.nama as nama','insting.id as id')->first();
         return redirect()->route('pertanyaan_detekos', ['id' => $request->detekos_id,'insting'=>$insting])
            ->withStatus(__('Data berhasil diubah'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pertanyaan_detekos=pertanyaan_detekos::find($id);
        $pertanyaan_detekos->delete();
        $insting=insting::where('id','=',$pertanyaan_detekos->insting_id)->select('insting.nama as nama','insting.id as id')->first();
         return redirect()->route('pertanyaan_detekos', ['id' => $pertanyaan_detekos->insting_id,'insting'=>$insting])
            ->withStatus(__('Data berhasil dihapus'));
    }
}
