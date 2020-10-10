<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class detail_detekos extends Model
{
    protected $table='detail_detekos';
    protected $fillable = [
        'detekos_id','waktu','jawaban','pertanyaan_detekos_id','anak_id'
    ];
    public function detail_pertanyaandetekos(){
        return $this->belongTo('App\pertanyaan_detekos');
    }
    public function detail_anak(){
        return $this->belongTo('App\anak');
    }
}
