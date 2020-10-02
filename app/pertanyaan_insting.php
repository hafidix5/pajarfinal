<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pertanyaan_insting extends Model
{
    protected $table='pertanyaan_insting';
    protected $fillable = [
        'pertanyaan','insting_id'
    ];
    public function insting_jawaban(){
        return $this->hasMany('App\pertanyaan_insting');
    }
    public function detail_jawaban(){
        return $this->hasMany('App\detail_insting');
    }
    public function insting(){
        return $this->belongTo('App\insting');
    }

}
