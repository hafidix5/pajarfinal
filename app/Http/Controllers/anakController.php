<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\anak;
use App\pasien;

class anakController extends Controller
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
        $id=auth()->user()->id;
        $pasien=DB::table('pasien')->where('user_id',$id)->first();
        $anak=DB::table('anak')->where('pasien_id',$pasien->id)->get();

        return view('pages.dataAnak',['anak'=>$anak]);
        }
        else
        {
            return redirect()->route('dataDiri')->withStatus(__('Anda harus mengisi Data Diri terlebih dahulu'));
        }
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
        $id=auth()->user()->id;
        $pasien=DB::table('pasien')->where('user_id',$id)->first();
        $pasien_id=$pasien->id;
        return view('pages.dataAnak-insert',['pasien_id'=>$pasien_id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::table('anak')->insert([
            'nama' => $request->nama,
            'tgl_lahir' => $request->tgl_lahir,
            'anak_ke' => $request->anak_ke,
            'usia' => $request->usia,
            'jenis_kelamin' => $request->jk,
            'pasien_id' => $request->pasien_id
           ]);

            return redirect('dataAnak')->withStatus(__('Data berhasil disimpan'));

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
        $anak=DB::table('anak')->where('id',$id)->first();
        //dd($anak);
        return view('pages.dataAnak-edit',['anak'=>$anak]);

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
        DB::table('anak')->where('id',$id)->update([
        'nama' => $request->nama,
        'usia' => $request->usia,
        'anak_ke' => $request->anak_ke,
        'tgl_lahir' => $request->tgl_lahir,
        'jenis_kelamin' => $request->jk,

           ]);
           return redirect('dataAnak')->withStatus(__('Data berhasil diubah '));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $anak=anak::find($id);
        $anak->delete();

        return redirect('dataAnak')->withStatus(__('Data berhasil dihapus '));
    }
}
