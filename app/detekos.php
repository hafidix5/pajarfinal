<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class detekos extends Model
{
    protected $table='detekos';
    protected $fillable = [
        'nama','video','jenis_edukasi_id'
    ];
    public function detekos_pertanyaan(){
        return $this->hasMany('App\pertanyaan_detekos');
    }
    public function jenisEdukasi(){
        return $this->belongTo('App\jenisEdukasi');
    }
    public function detekos_testimoni(){
        return $this->hasMany('App\testimoni');
    }
}
