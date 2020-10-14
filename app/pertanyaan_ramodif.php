<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pertanyaan_ramodif extends Model
{
    protected $table='pertanyaan_ramodif';
    protected $primaryKey='id';
    protected $fillable = [
        'id','pertanyaan','ramodif_id','tahap'
    ];
    public function ramodif_jawaban(){
        return $this->hasMany('App\pertanyaan_ramodif');
    }
    public function detail_jawaban(){
        return $this->hasMany('App\detail_ramodif');
    }
    public function ramodif(){
        return $this->belongTo('App\ramodif');
    }
}
