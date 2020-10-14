<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\jenisEdukasi;

class jenisEdukasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jenisEdukasi=jenisEdukasi::all();
        return view('pages.jenisEdukasi',['jenisEdukasi'=>$jenisEdukasi]);
    }

    public function insert()
    {
        return view('pages.jenisEdukasiInsert');
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
        /* DB::table('jenis_edukasi')->insert([
            'nama' => $request->nama,
            'singkatan' => $request->singkatan,
           ]); */

           $this->validate($request,[
    		'nama' => 'required',
    		'singkatan' => 'required'
    	]);

        jenisEdukasi::create([
    		'nama' => $request->nama,
    		'singkatan' => $request->singkatan
    	]);

            return redirect('jenisEdukasi')->withStatus(__('Data berhasil disimpan'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $jenisEdukasi=DB::table('jenis_edukasi')->get();
       // dd($jenisEdukasi);
        return view('pages.pilihjenisEdukasi',['jenisEdukasi'=>$jenisEdukasi]);
    }
    public function showDeteks()
    {
        $jenisEdukasi=DB::table('jenis_edukasi')->get();
       // dd($jenisEdukasi);
        return view('pages.pilihjenisEdukasiDeteks',['jenisEdukasi'=>$jenisEdukasi]);
    }
    public function showRamodif()
    {
        $jenisEdukasi=DB::table('jenis_edukasi')->get();
       // dd($jenisEdukasi);
        return view('pages.pilihjenisEdukasiRamodif',['jenisEdukasi'=>$jenisEdukasi]);
    }

    public function showHasilInsting()
    {
        $jenisEdukasi=DB::table('jenis_edukasi')->get();
       // dd($jenisEdukasi);
        return view('pages.pilihjenisEdukasiHasilInsting',['jenisEdukasi'=>$jenisEdukasi]);
    }
    public function showHasilDetekos()
    {
        $jenisEdukasi=DB::table('jenis_edukasi')->get();
       // dd($jenisEdukasi);
        return view('pages.pilihjenisEdukasiHasilDetekos',['jenisEdukasi'=>$jenisEdukasi]);
    }
    public function showHasilRamodif()
    {
        $jenisEdukasi=DB::table('jenis_edukasi')->get();
       // dd($jenisEdukasi);
        return view('pages.pilihjenisEdukasiHasilRamodif',['jenisEdukasi'=>$jenisEdukasi]);
    }




    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jenisEdukasi=jenisEdukasi::find($id);
        return view('pages.jenisEdukasiEdit',['jenisEdukasi'=>$jenisEdukasi]);
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
            'singkatan' => 'required'
         ]);

         $jenisEdukasi = jenisEdukasi::find($id);
         $jenisEdukasi->nama = $request->nama;
         $jenisEdukasi->singkatan = $request->singkatan;
         $jenisEdukasi->save();
         return redirect('jenisEdukasi')->withStatus(__('Data berhasil diubah'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jenisEdukasi=jenisEdukasi::find($id);
        $jenisEdukasi->delete();
        return redirect('jenisEdukasi')->withStatus(__('Data berhasil dihapus'));
    }
}
