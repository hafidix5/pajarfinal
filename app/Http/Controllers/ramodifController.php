<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\ramodif;
use App\jenisEdukasi;


class ramodifController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ramodif=DB::table('jenis_edukasi')
        ->rightJoin('ramodif','ramodif.jenis_edukasi_id','=','jenis_edukasi.id')
        ->select('jenis_edukasi.nama as jenis_edukasi','ramodif.nama as nama',
        'ramodif.video as video','ramodif.id as id')->get();
       // dd($ramodif);
      /*  $user_with_organization = User::where('id', $user_id)
    ->leftJoin('organizations', 'users.organization_id', '=', 'organizations.id')
    ->select('users.id','organizations.name')->first(); */
        return view('pages.ramodifIndex',['ramodif'=>$ramodif]);
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
        $jenisEdukasi=jenisEdukasi::all();
        return view('pages.ramodifInsert',['jenisEdukasi'=>$jenisEdukasi]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cek_ramodif=ramodif::where('ramodif.jenis_edukasi_id', $request->jenisEdukasi_id)
       ->select('ramodif.id as id')->first();
       if($cek_ramodif)
       {
        return redirect('ramodif')->withStatus(__('Pilih jenis Edukasi Berbeda'));
       }
       else
       {
        $this->validate($request,[
    		'nama' => 'required',
            'video' => 'required',
            'jenisEdukasi_id' => 'required'
    	]);

        ramodif::create([
            'nama' => $request->nama,
            'video' => $request->video,
    		'jenis_edukasi_id' => $request->jenisEdukasi_id
    	]);

            return redirect('ramodif')->withStatus(__('Data berhasil disimpan'));
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
        $ramodif=ramodif::where('ramodif.id', $id)
        ->Join('jenis_edukasi','ramodif.jenis_edukasi_id','=','jenis_edukasi.id')
        ->select('jenis_edukasi.nama as jenis_edukasi','ramodif.nama as nama',
        'ramodif.video as video','ramodif.id as id','ramodif.jenis_edukasi_id as idjenis')->first();
        return view('pages.ramodifEdit',['ramodif'=>$ramodif,'jenisEdukasi'=>$jenisEdukasi]);
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
        $cek_ramodif=ramodif::where('ramodif.jenis_edukasi_id', $request->jenisEdukasi_id)
       ->select('ramodif.id as id')->first();
       if($cek_ramodif)
       {
        return redirect('ramodif')->withStatus(__('Pilih jenis Edukasi Berbeda'));
       }
       else
       {
        $this->validate($request,[
    		'nama' => 'required',
            'video' => 'required',
            'jenisEdukasi_id' => 'required'
    	]);

         $ramodif = ramodif::find($id);
         $ramodif->nama = $request->nama;
         $ramodif->video = $request->video;
         $ramodif->jenis_edukasi_id = $request->jenisEdukasi_id;
         $ramodif->save();
         return redirect('ramodif')->withStatus(__('Data berhasil diubah'));
       }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ramodif=ramodif::find($id);
        $ramodif->delete();
        return redirect('ramodif')->withStatus(__('Data berhasil dihapus'));
    }
}
