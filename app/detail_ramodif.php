<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class detail_ramodif extends Model
{
    protected $table='detail_ramodif';
    protected $fillable = [
        'ramodif_id','waktu','jawaban','pertanyaan_ramodif_id','anak_id'
    ];
    public function detail_pertanyaanramodif(){
        return $this->belongTo('App\pertanyaan_ramodif');
    }
    public function detail_anak(){
        return $this->belongTo('App\anak');
    }
}
