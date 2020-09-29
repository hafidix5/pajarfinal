<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class insting extends Model
{
    protected $table='insting';
    protected $fillable = [
        'nama','video','jenis_edukasi_id'
    ];
    public function insting_pertanyaan(){
        return $this->hasOne('App\pertanyaan_insting');
    }
    public function jenisEdukasi(){
        return $this->belongTo('App\jenisEdukasi');
    }


}
