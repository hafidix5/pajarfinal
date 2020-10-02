<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ramodif extends Model
{
    protected $table='ramodif';
    protected $fillable = [
        'nama','video','jenis_edukasi_id'
    ];
    public function ramodif_pertanyaan(){
        return $this->hasMany('App\pertanyaan_ramodif');
    }
    public function jenisEdukasi(){
        return $this->belongTo('App\jenisEdukasi');
    }
}
