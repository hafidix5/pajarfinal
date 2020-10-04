<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\insting;
use App\jenisEdukasi;
class instingController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $insting=DB::table('jenis_edukasi')
        ->rightJoin('insting','insting.jenis_edukasi_id','=','jenis_edukasi.id')
        ->select('jenis_edukasi.nama as jenis_edukasi','insting.nama as nama',
        'insting.video as video','insting.id as id')->get();
       // dd($insting);
      /*  $user_with_organization = User::where('id', $user_id)
    ->leftJoin('organizations', 'users.organization_id', '=', 'organizations.id')
    ->select('users.id','organizations.name')->first(); */
        return view('pages.instingIndex',['insting'=>$insting]);
    }

    public function insert()
    {
        $jenisEdukasi=jenisEdukasi::all();

        return view('pages.instingInsert',['jenisEdukasi'=>$jenisEdukasi]);
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
       // dd($request->jenisEdukasi_id);
       $cek_insting=insting::where('insting.jenis_edukasi_id', $request->jenisEdukasi_id)
       ->select('insting.id as id')->first();
       if($cek_insting)
       {
        return redirect('insting')->withStatus(__('Pilih jenis Edukasi Berbeda'));
       }
       else
       {
        $this->validate($request,[
    		'nama' => 'required',
            'video' => 'required',
            'jenisEdukasi_id' => 'required'
    	]);

        insting::create([
            'nama' => $request->nama,
            'video' => $request->video,
    		'jenis_edukasi_id' => $request->jenisEdukasi_id
    	]);

            return redirect('insting')->withStatus(__('Data berhasil disimpan'));
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
        $insting=insting::where('insting.id', $id)
        ->Join('jenis_edukasi','insting.jenis_edukasi_id','=','jenis_edukasi.id')
        ->select('jenis_edukasi.nama as jenis_edukasi','insting.nama as nama',
        'insting.video as video','insting.id as id','insting.jenis_edukasi_id as idjenis')->first();
        return view('pages.instingEdit',['insting'=>$insting,'jenisEdukasi'=>$jenisEdukasi]);
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
        $cek_insting=insting::where('insting.jenis_edukasi_id', $request->jenisEdukasi_id)
       ->select('insting.id as id')->first();
       if($cek_insting)
       {
        return redirect('insting')->withStatus(__('Pilih jenis Edukasi Berbeda'));
       }
       else
       {
        $this->validate($request,[
    		'nama' => 'required',
            'video' => 'required',
            'jenisEdukasi_id' => 'required'
    	]);

         $insting = insting::find($id);
         $insting->nama = $request->nama;
         $insting->video = $request->video;
         $insting->jenis_edukasi_id = $request->jenisEdukasi_id;
         $insting->save();
         return redirect('insting')->withStatus(__('Data berhasil diubah'));
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
        $insting=insting::find($id);
        $insting->delete();
        return redirect('insting')->withStatus(__('Data berhasil dihapus'));
    }
}
