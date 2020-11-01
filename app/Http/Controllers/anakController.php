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
        $anak=DB::table('anak')->where('pasien_id',$pasien->id)->orderBy('id', 'DESC')->get();

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
        $id_user=auth()->user()->id;
        $anak=pasien::where('pasien.user_id', $id_user)
        ->Join('anak','anak.pasien_id','=','pasien.id')
        ->select('anak.nama as nama','anak.id as id')->get();
        $id_jenisEdukasi=$id;

        return view('pages.pilihAnak',['anak'=>$anak,'id_jenisEdukasi'=>$id_jenisEdukasi]);
       // dd($anak);
    }

    public function showDeteks($id)
    {
        $id_user=auth()->user()->id;
        $anak=pasien::where('pasien.user_id', $id_user)
        ->Join('anak','anak.pasien_id','=','pasien.id')
        ->select('anak.nama as nama','anak.id as id')->get();
        $id_jenisEdukasi=$id;

        return view('pages.pilihAnakDeteks',['anak'=>$anak,'id_jenisEdukasi'=>$id_jenisEdukasi]);
       // dd($anak);
    }

    public function showRamodif($id)
    {
        $id_user=auth()->user()->id;
        $anak=pasien::where('pasien.user_id', $id_user)
        ->Join('anak','anak.pasien_id','=','pasien.id')
        ->select('anak.nama as nama','anak.id as id')->get();
        $id_jenisEdukasi=$id;

        return view('pages.pilihAnakRamodif',['anak'=>$anak,'id_jenisEdukasi'=>$id_jenisEdukasi]);
       // dd($anak);
    }

    public function showHasilInsting($id)
    {
        $id_user=auth()->user()->id;
        $anak=pasien::where('pasien.user_id', $id_user)
        ->Join('anak','anak.pasien_id','=','pasien.id')
        ->select('anak.nama as nama','anak.id as id')->get();
        $id_jenisEdukasi=$id;

        return view('pages.pilihAnakHasilInsting',['anak'=>$anak,'id_jenisEdukasi'=>$id_jenisEdukasi]);
       // dd($anak);
    }

    public function showHasilDetekos($id)
    {
        $id_user=auth()->user()->id;
        $anak=pasien::where('pasien.user_id', $id_user)
        ->Join('anak','anak.pasien_id','=','pasien.id')
        ->select('anak.nama as nama','anak.id as id')->get();
        $id_jenisEdukasi=$id;

        return view('pages.pilihAnakHasilDetekos',['anak'=>$anak,'id_jenisEdukasi'=>$id_jenisEdukasi]);
       // dd($anak);
    }

    public function showHasilRamodif($id)
    {
        $id_user=auth()->user()->id;
        $anak=pasien::where('pasien.user_id', $id_user)
        ->Join('anak','anak.pasien_id','=','pasien.id')
        ->select('anak.nama as nama','anak.id as id')->get();
        $id_jenisEdukasi=$id;

        return view('pages.pilihAnakHasilRamodif',['anak'=>$anak,'id_jenisEdukasi'=>$id_jenisEdukasi]);
       // dd($anak);
    }

    public function showdaftarHasilInstingAdmin($id)
    {
        $id_user=auth()->user()->id;
        $daftarhasil=DB::select('
        SELECT a.nama AS namaAnak, a.id as idAnak,pa.id as idPasien,pa.nama AS namaOrtu, p.nama AS namaPuskesmas,a.id AS id
 FROM puskesmas AS p JOIN pasien AS pa ON p.id=pa.puskesmas_id JOIN anak AS a ON pa.id=a.pasien_id
JOIN detail_insting AS di ON a.id=di.anak_id JOIN pertanyaan_insting AS pei ON di.pertanyaan_insting_id=
pei.id JOIN insting AS i ON pei.insting_id=i.id WHERE i.jenis_edukasi_id='.$id.'
 group by a.id,pa.id,a.nama,pa.nama,p.nama,a.id ORDER BY
a.nama asc

    ');

        $id_jenisEdukasi=$id;

        return view('pages.daftarHasilInstingAdmin',['daftarhasil'=>$daftarhasil,'id_jenisEdukasi'=>$id_jenisEdukasi]);
       // dd($anak);
    }

    public function showdaftarHasilDetekosAdmin($id)
    {
        $id_user=auth()->user()->id;
        $daftarhasil=DB::select('
        SELECT a.nama AS namaAnak, a.id as idAnak,pa.id as idPasien,pa.nama AS namaOrtu, p.nama AS namaPuskesmas,a.id AS id
 FROM puskesmas AS p JOIN pasien AS pa ON p.id=pa.puskesmas_id JOIN anak AS a ON pa.id=a.pasien_id
JOIN detail_detekos AS di ON a.id=di.anak_id JOIN pertanyaan_detekos AS pei ON di.pertanyaan_detekos_id=
pei.id JOIN detekos AS i ON pei.detekos_id=i.id WHERE i.jenis_edukasi_id='.$id.'
 group by a.id,pa.id,a.nama,pa.nama,p.nama,a.id ORDER BY
a.nama asc

    ');

        $id_jenisEdukasi=$id;

        return view('pages.daftarHasilDetekosAdmin',['daftarhasil'=>$daftarhasil,'id_jenisEdukasi'=>$id_jenisEdukasi]);
       // dd($anak);
    }
    public function showdaftarHasilRamodifAdmin($id)
    {
        $id_user=auth()->user()->id;
        $daftarhasil=DB::select('
        SELECT a.nama AS namaAnak, a.id as idAnak,pa.id as idPasien,pa.nama AS namaOrtu, p.nama AS namaPuskesmas,a.id AS id
 FROM puskesmas AS p JOIN pasien AS pa ON p.id=pa.puskesmas_id JOIN anak AS a ON pa.id=a.pasien_id
JOIN detail_ramodif AS di ON a.id=di.anak_id JOIN pertanyaan_ramodif AS pei ON di.pertanyaan_ramodif_id=
pei.id JOIN ramodif AS i ON pei.ramodif_id=i.id WHERE i.jenis_edukasi_id='.$id.'
 group by a.id,pa.id,a.nama,pa.nama,p.nama,a.id ORDER BY
a.nama asc

    ');

        $id_jenisEdukasi=$id;

        return view('pages.daftarHasilRamodifAdmin',['daftarhasil'=>$daftarhasil,'id_jenisEdukasi'=>$id_jenisEdukasi]);
       // dd($anak);
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
    public function showanak($id)
    {
        $anak=DB::table('anak')->where('id',$id)->first();
        //dd($anak);
        return view('pages.dataAnakpasien',['anak'=>$anak]);

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
