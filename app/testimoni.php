<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class testimoni extends Model
{
    protected $table ='testimoni';

    protected $fillable = [
        'nama','video','detekos_id'
    ];
    public function testimoni_detekos(){
        return $this->belongTo('App\detekos');
    }

}
