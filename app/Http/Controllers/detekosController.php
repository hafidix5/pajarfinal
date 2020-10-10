<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\detekos;
use App\jenisEdukasi;

class detekosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $detekos=DB::table('jenis_edukasi')
        ->rightJoin('detekos','detekos.jenis_edukasi_id','=','jenis_edukasi.id')
        ->select('jenis_edukasi.nama as jenis_edukasi','detekos.nama as nama',
        'detekos.video as video','detekos.id as id')->get();
       // dd($detekos);
      /*  $user_with_organization = User::where('id', $user_id)
    ->leftJoin('organizations', 'users.organization_id', '=', 'organizations.id')
    ->select('users.id','organizations.name')->first(); */
        return view('pages.detekosIndex',['detekos'=>$detekos]);
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
        /* $jenisEdukasi=DB::table('jenis_edukasi')
        ->rightJoin('detekos','detekos.jenis_edukasi_id','=','jenis_edukasi.id')
        ->select('jenis_edukasi.nama as nama','jenis_edukasi.id as id')->get();
        return view('pages.detekosInsert',['jenisEdukasi'=>$jenisEdukasi]); */
        $jenisEdukasi=jenisEdukasi::all();
        return view('pages.detekosInsert',['jenisEdukasi'=>$jenisEdukasi]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cek_detekos=detekos::where('detekos.jenis_edukasi_id', $request->jenisEdukasi_id)
       ->select('detekos.id as id')->first();
       if($cek_detekos)
       {
        return redirect('detekos')->withStatus(__('Pilih jenis Edukasi Berbeda'));
       }
       else
       {
        $this->validate($request,[
    		'nama' => 'required',
            'video' => 'required',
            'jenisEdukasi_id' => 'required'
    	]);

        detekos::create([
            'nama' => $request->nama,
            'video' => $request->video,
    		'jenis_edukasi_id' => $request->jenisEdukasi_id
    	]);

            return redirect('detekos')->withStatus(__('Data berhasil disimpan'));
       }


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
        $jenisEdukasi=jenisEdukasi::all();
        $detekos=detekos::where('detekos.id', $id)
        ->Join('jenis_edukasi','detekos.jenis_edukasi_id','=','jenis_edukasi.id')
        ->select('jenis_edukasi.nama as jenis_edukasi','detekos.nama as nama',
        'detekos.video as video','detekos.id as id','detekos.jenis_edukasi_id as idjenis')->first();
        return view('pages.detekosEdit',['detekos'=>$detekos,'jenisEdukasi'=>$jenisEdukasi]);
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
        /* $cek_detekos=detekos::where('detekos.jenis_edukasi_id', $request->jenisEdukasi_id)
       ->select('detekos.id as id')->first();
       if($cek_detekos)
       {
        return redirect('detekos')->withStatus(__('Pilih jenis Edukasi Berbeda'));
       }
       else
       {

       } */
       $this->validate($request,[
        'nama' => 'required',
        'video' => 'required',
        'jenisEdukasi_id' => 'required'
    ]);

     $detekos = detekos::find($id);
     $detekos->nama = $request->nama;
     $detekos->video = $request->video;
     $detekos->jenis_edukasi_id = $request->jenisEdukasi_id;
     $detekos->save();
     return redirect('detekos')->withStatus(__('Data berhasil diubah'));


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $detekos=detekos::find($id);
        $detekos->delete();
        return redirect('detekos')->withStatus(__('Data berhasil dihapus'));
    }
}
