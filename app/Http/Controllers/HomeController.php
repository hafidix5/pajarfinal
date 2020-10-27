<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\pasien;
use App\puskesmas;
use App\pertanyaan_insting;
use App\pertanyaan_detekos;
use App\pertanyaan_ramodif;
use App\jenisEdukasi;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
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
       // dd($totalpasien);
       $role=auth()->user()->role;
       if($role==1)
       {
        return redirect()->route('dataDiri');
       }
       else
       {
          // dd($jpertanyaan);
        return view('dashboard',['jpasien'=>$jpasien,'jpuskesmas'=>$jpuskesmas,'jpertanyaan'=>$jpertanyaan,'hasil'=>$hasil]);
       }

    }
}
