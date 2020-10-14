<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\detekos;
use App\testimoni;

class testimoniController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimoni=DB::table('detekos')
        ->rightJoin('testimoni','testimoni.detekos_id','=','detekos.id')
        ->select('detekos.nama as detekos','testimoni.nama as nama',
        'testimoni.video as video','testimoni.id as id')->get();
       // dd($testimoni);
      /*  $user_with_organization = User::where('id', $user_id)
    ->leftJoin('organizations', 'users.organization_id', '=', 'organizations.id')
    ->select('users.id','organizations.name')->first(); */
        return view('pages.testimoniIndex',['testimoni'=>$testimoni]);
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
        $detekos=detekos::all();
        return view('pages.testimoniInsert',['detekos'=>$detekos]);
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
            'video' => 'required',
            'detekos_id' => 'required'
    	]);

        testimoni::create([
            'nama' => $request->nama,
            'video' => $request->video,
    		'detekos_id' => $request->detekos_id
    	]);

            return redirect('testimoni')->withStatus(__('Data berhasil disimpan'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $testimoniDeteks=testimoni::all();
        return view('pages.testimoniDeteks',['testimoniDeteks'=>$testimoniDeteks]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $detekos=detekos::all();
        $testimoni=testimoni::where('testimoni.id', $id)
        ->Join('detekos','testimoni.detekos_id','=','detekos.id')
        ->select('detekos.nama as detekos','testimoni.nama as nama',
        'testimoni.video as video','testimoni.id as id','testimoni.detekos_id as idjenis')->first();
        return view('pages.testimoniEdit',['testimoni'=>$testimoni,'detekos'=>$detekos]);
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
            'video' => 'required',
            'detekos_id' => 'required'
    	]);

         $testimoni = testimoni::find($id);
         $testimoni->nama = $request->nama;
         $testimoni->video = $request->video;
         $testimoni->save();
         return redirect('testimoni')->withStatus(__('Data berhasil diubah'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $testimoni=testimoni::find($id);
        $testimoni->delete();
        return redirect('testimoni')->withStatus(__('Data berhasil dihapus'));
    }
}
