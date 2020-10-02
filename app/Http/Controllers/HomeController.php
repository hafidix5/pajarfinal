<?php

namespace App\Http\Controllers;
use App\pasien;
use App\puskesmas;
use App\kuesioner;
use App\jawaban_kuesioner;
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

       // dd($totalpasien);
       $role=auth()->user()->role;
       if($role==1)
       {
        return redirect()->route('dataDiri');
       }
       else
       {
        return view('dashboard',compact('jpasien','jpuskesmas'));
       }

    }
}
