<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class detail_insting extends Model
{
    protected $table='detail_insting';
    protected $fillable = [
        'insting_id','waktu','jawaban','pertanyaan_insting_id','anak_id'
    ];
    public function detail_pertanyaanInsting(){
        return $this->belongTo('App\pertanyaan_insting');
    }
    public function detail_anak(){
        return $this->belongTo('App\anak');
    }
}
