<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pertanyaan_detekos extends Model
{
    protected $table='pertanyaan_detekos';
    protected $fillable = [
        'pertanyaan','detekos_id'
    ];
    public function detekos_jawaban(){
        return $this->hasMany('App\pertanyaan_detekos');
    }
    public function detail_jawaban(){
        return $this->hasMany('App\detail_detekos');
    }
    public function detekos(){
        return $this->belongTo('App\detekos');
    }
}
