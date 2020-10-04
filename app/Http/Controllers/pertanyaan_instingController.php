<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\pertanyaan_insting;
use App\insting;

class pertanyaan_instingController extends Controller
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
        $insting_id=$id;
        return view('pages.pertanyaan_instingInsert',['insting_id'=>$insting_id]);
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
            'insting_id' => 'required'
    	]);

        pertanyaan_insting::create([
            'pertanyaan' => $request->pertanyaan,
            'insting_id' => $request->insting_id
        ]);
        $insting=insting::where('id','=',$request->insting_id)->select('insting.nama as nama','insting.id as id')->first();
       // dd($request->insting_id);
            return redirect()->route('pertanyaan_insting', ['id' => $request->insting_id,'insting'=>$insting])
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
        /* $pertanyaan_insting=pertanyaan_insting::all();
        //dd($pertanyaan_insting);
        return view('pages.pertanyaan_instingIndex',['pertanyaan_insting'=>$pertanyaan_insting]); */

        $pertanyaan_insting=pertanyaan_insting::where('pertanyaan_insting.insting_id', $id)
        ->Join('insting','pertanyaan_insting.insting_id','=','insting.id')
        ->select('pertanyaan_insting.pertanyaan as pertanyaan','insting.nama as nama',
        'pertanyaan_insting.id as id')->get();
        $insting=insting::where('id','=',$id)->select('insting.nama as nama','insting.id as id')->first();
        return view('pages.pertanyaan_instingIndex',['pertanyaan_insting'=>$pertanyaan_insting,
        'insting'=>$insting]);
       //dd($insting->nama);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pertanyaan_insting=pertanyaan_insting::where('pertanyaan_insting.id', $id)
        ->select('pertanyaan_insting.pertanyaan as pertanyaan','pertanyaan_insting.id as id',
        'pertanyaan_insting.insting_id')->first();
       return view('pages.pertanyaan_instingEdit',['pertanyaan_insting'=>$pertanyaan_insting]);
      // dd($pertanyaan_insting);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $insting_id)
    {
        $this->validate($request,[
    		'pertanyaan' => 'required'
    	]);

         $pertanyaan_insting = pertanyaan_insting::find($id);
         $pertanyaan_insting->pertanyaan = $request->pertanyaan;
         $pertanyaan_insting->save();

       // $insting=insting::where('id','=',$insting_id)->select('insting.nama as nama','insting.id as id')->first();
         //dd($insting->nama);
         $pertanyaan_insting=pertanyaan_insting::where('pertanyaan_insting.insting_id', $insting_id)
        ->Join('insting','pertanyaan_insting.insting_id','=','insting.id')
        ->select('pertanyaan_insting.pertanyaan as pertanyaan','insting.nama as nama',
        'pertanyaan_insting.id as id')->get();
        $insting=insting::where('id','=',$insting_id)->select('insting.nama as nama','insting.id as id')->first();
        return view('pages.pertanyaan_instingIndex',['pertanyaan_insting'=>$pertanyaan_insting,
        'insting'=>$insting]);



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pertanyaan_insting=pertanyaan_insting::find($id);
        $pertanyaan_insting->delete();
        $insting=insting::where('id','=',$pertanyaan_insting->insting_id)->select('insting.nama as nama','insting.id as id')->first();
         return redirect()->route('pertanyaan_insting', ['id' => $pertanyaan_insting->insting_id,'insting'=>$insting])
            ->withStatus(__('Data berhasil dihapus'));
    }
}
