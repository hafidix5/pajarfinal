<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\puskesmas;

class PuskesmasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $puskesmas=puskesmas::all();
        return view('pages.puskesmasIndex',['puskesmas'=>$puskesmas]);
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

    public function insert()
    {
        return view('pages.puskesmasInsert');
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
    		'nama' => 'required',
            'alamat' => 'required'
    	]);

        puskesmas::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat
    	]);

            return redirect('puskesmas')->withStatus(__('Data berhasil disimpan'));
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
        $puskesmas = puskesmas::find($id);
       // dd($puskesmas);
        return view('pages.puskesmasEdit',['puskesmas'=>$puskesmas]);
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
    		'nama' => 'required',
            'alamat' => 'required'
    	]);

         $puskesmas = puskesmas::find($id);
         $puskesmas->nama = $request->nama;
         $puskesmas->alamat = $request->alamat;
         $puskesmas->save();
         return redirect('puskesmas')->withStatus(__('Data berhasil diubah'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $puskesmas=puskesmas::find($id);
        $puskesmas->delete();
        return redirect('puskesmas')->withStatus(__('Data berhasil dihapus'));
    }
}
