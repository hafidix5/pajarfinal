<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class admin extends Model
{
    protected $table='admin';
    protected $fillable = [
        'nama','puskesmas_id','hp','user_id'
    ];
    public function admin(){
        return $this->belongsTo('App\puskesmas');
    }
}

