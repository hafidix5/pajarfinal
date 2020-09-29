<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jenisEdukasi extends Model
{
    protected $table='jenis_edukasi';
    protected $fillable = [
        'nama','singkatan'
    ];
    public function insting(){
        return $this->hasMany('App\insting');
    }
    public function jenisEdukasi_detekos(){
        return $this->hasMany('App\detekos');
    }
    public function jenisEdukasi_ramodif(){
        return $this->hasMany('App\ramodif');
    }
}
