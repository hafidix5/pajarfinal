<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\pasien;
use App\puskesmas;
use App\pertanyaan_insting;
use App\pertanyaan_detekos;
use App\pertanyaan_ramodif;
use App\jenisEdukasi;

class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $puskesmas=puskesmas::all();
        $id=auth()->user()->id;
        $pasien=DB::table('pasien')->where('user_id',$id)->first();

        $jpasien=pasien::all()->count();
        $jpuskesmas=puskesmas::all()->count();
        $jpertanyaaninsting=pertanyaan_insting::all()->count();
        $jpertanyaandetekos=pertanyaan_detekos::all()->count();
        $jpertanyaanramodif=pertanyaan_ramodif::all()->count();
        $jpertanyaan=$jpertanyaandetekos+$jpertanyaaninsting+$jpertanyaanramodif;

        $jdetailinsting=DB::selectone('
        SELECT COUNT(*) AS jumlah FROM (
            SELECT anak_id,waktu FROM detail_insting GROUP BY anak_id,waktu) AS a
    ');
    $jdetaildetekos=DB::selectone('
        SELECT COUNT(*) AS jumlah FROM (
            SELECT anak_id,waktu FROM detail_detekos GROUP BY anak_id,waktu) AS a
    ');
    $jdetailramodif=DB::selectone('
        SELECT COUNT(*) AS jumlah FROM (
            SELECT anak_id,waktu FROM detail_ramodif GROUP BY anak_id,waktu) AS a
    ');
    $hasil=$jdetailinsting->jumlah+$jdetaildetekos->jumlah+$jdetailramodif->jumlah;

       $role=auth()->user()->role;
       if($role==1)
       {
        if ($pasien!=null) {
            return view('pages.dataDiriupdate', ['puskesmas'=>$puskesmas,'pasien'=>$pasien]);
        }
        else
        {
            return view('pages.dataDiri', ['puskesmas'=>$puskesmas]);
        }
       }
       else
       {
        return view('dashboard',['jpasien'=>$jpasien,'jpuskesmas'=>$jpuskesmas,'jpertanyaan'=>$jpertanyaan,'hasil'=>$hasil]);
       }


      //  return view('pages.dataDiri', ['puskesmas'=>$puskesmas,'pasien'=>$pasien]);


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

       DB::table('pasien')->insert([
        'hp' => $request->hp,
        'nama' => $request->nama,
        'tgl_lahir' => $request->tgl_lahir,
        'jk' => $request->jk,
        'alamat' => $request->alamat,
        'pekerjaan' => $request->pekerjaan,
        'pendidikan' => $request->pendidikan,
        'tinggal_dengan' => $request->tinggal_dengan,
        'status_rumah' =>$request->status_rumah,
        'nama_pasangan' => $request->nama_pasangan,
        'pekerjaan_pasangan' => $request->pekerjaan_pasangan,
        'pendidikan_pasangan' => $request->pendidikan_pasangan,
        'tgl_lahir_pasangan' => $request->tgl_lahir_pasangan,
        'puskesmas_id' => $request->puskesmas_id,
        'user_id' => auth()->user()->id
       ]);

        return back()->withStatus(__('Data diri berhasil disimpan'));

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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        DB::table('pasien')->where('id',$request->id)->update([
            'hp' => $request->hp,
        'nama' => $request->nama,
        'tgl_lahir' => $request->tgl_lahir,
        'jk' => $request->jk,
        'alamat' => $request->alamat,
        'pekerjaan' => $request->pekerjaan,
        'pendidikan' => $request->pendidikan,
        'tinggal_dengan' => $request->tinggal_dengan,
        'status_rumah' =>$request->status_rumah,
        'nama_pasangan' => $request->nama_pasangan,
        'pekerjaan_pasangan' => $request->pekerjaan_pasangan,
        'pendidikan_pasangan' => $request->pendidikan_pasangan,
        'tgl_lahir_pasangan' => $request->tgl_lahir_pasangan,
        'puskesmas_id' => $request->puskesmas_id,
           ]);
           return back()->withStatus(__('Data diri berhasil diubah '));
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
