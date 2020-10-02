<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\pertanyaan_insting;

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
        //
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
        return view('pages.pertanyaan_instingIndex',['pertanyaan_insting'=>$pertanyaan_insting]);
      //  dd($pertanyaan_insting);

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
